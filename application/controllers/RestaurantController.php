<?php

class RestaurantController extends Zend_Controller_Action
{

	var $restaurantModel = null;
    public function init()
    {
        /* Initialize action controller here */
		$this->restaurantModel = new Application_Model_Restaurant();
		$this->reservationModel = new Application_Model_Reservation();
    	$this->cuisinetypeModel = new Application_Model_Cuisinetype();
    }

    public function indexAction()
    {
		$formularz = new Form_Restaurant();
		$formularz->setEncType('UTF-8');
		
    	$restaurant = $this->restaurantModel;
		$id = $this->_getParam('id');
		$ret = $restaurant->getRestaurant($id);
		if(!empty($ret)){
			$this->view->data = $ret->toArray();
			$this->view->form = $formularz;
		} else {
			echo('brak takiej restauracji');
		}
		
    	if ($this->getRequest()->isPost()) {
			$formData  = $this->_request->getPost();
            if ($formularz->isValid($formData)) {
                   $this->_forward('rezerwuj','rezerwacje',null,$formData);
                  // echo('Formularz poprawny');
            } else {
            	$this->view->form = $formularz;
            	echo('Formularz NIEpoprawny');
            }
        } else {
			$this->view->form = $formularz;
            $this->render('index');
        }
		
		
		
		
		}
	
	public function addAction(){
	  $cuisinetypes = $this->cuisinetypeModel->getCuisinetypes();

    $formularz = new Form_RestaurantAdd(null, $cuisinetypes->toArray());
    $formularz->setEnctype('UTF-8');
    
    $restaurant = $this->restaurantModel;
    
    //Jesli zostały przesłane dane z formularza
    //nastpuje walidacja wpisanych danych
    if ($this->getRequest()->isPost()) {
      $request = $this->getRequest();

      $formData  = $this->_request->getPost();
            if ($formularz->isValid($formData)) {
                $id = $restaurant->addRestaurant($formData);
                $this->view->success = 'Dodano restauracje o ID: '.$id;
                $this->view->form = '';
                $this->render('add');
            } else {
              //print_r($this->_request);
              $this->view->form = $formularz;
              $this->render('add');
            }
      //formularz nie został przesłany
      //nastpuje jego pierwsze wyświetlenie
      } else {
       $this->view->form = $formularz;
      }
	}
	public function signAction()
    {
    }
	
	public function getAction()
    {
		$restaurants = $this->restaurantModel->getRestaurants(10,0);
		
		foreach($restaurants as $restaurant){
			foreach ($restaurant as $key => $value) {
			   echo "$key;      :      $value<br>\n";
			}
			echo('<hr/>');
		}

	}
	
	public function viewAction()
	{
		$data = new Zend_Date('2011-01-24 22:03', 'YMdHm', 'pl_PL');
		$id = $this->_getParam('id', null);
		if(!empty($id)){
			$restaurant = $this->restaurantModel->getRestaurant($id);
			//w pierwszym kroku wybrano dostępną datę rezerwacji
			if($this->hasPostedVaidForm($restaurant)){
				//pobieranie danych z posta
				$peopleCount = $this->_request->getPost('liczba_osob');
				$palacy = $this->_request->getPost('palacy');
				$date = $this->_request->getPost('data');
				//dane do wstępnej rezerwacji
				$data = array(
					'date' => $date,
					'liczba' =>$peopleCount,
					'palacy' =>$palacy,
					'restaurantId' =>$id,
					'state' =>0,
				);
				$reservationId = $this->reservationModel->makeTemporaryReservation($data);
				//formularz drugiego kroku
				$firstStepData = $this->_request->getPost();
				$firstStepData['id'] = $reservationId;
				$form = new Form_ReservationAddSecondStep(array('firstStepData'=>$firstStepData));
    			$this->view->form = $form;
				$this->renderScript('rezerwacje/make.phtml');
			}
			
			if(!empty($restaurant)){
				$this->view->data = $restaurant;
				$form = new Form_ReservationAddFirstStep(array('id'=>$id));
				$this->view->form = $form;
				$timeMin = new Zend_Date($restaurant['restaurant']['open_from'],Zend_date::TIMES);
				$timeMax = new Zend_Date($restaurant['restaurant']['open_to'],Zend_date::TIMES);
				$this->view->hourMin = $timeMin->get(Zend_Date::HOUR_SHORT);
				$this->view->hourMax = $timeMax->get(Zend_Date::HOUR_SHORT);
			} else{
				throw new Zend_Controller_Action_Exception('Nie istnieje taka restauracja', 404);
			}
		} else {
			throw new Zend_Controller_Action_Exception('Nie podano id restauracji', 404);
		}
	}
	public function hasPostedVaidForm($restaurant=null)
	{
		if($this->getRequest()->isPost() && !empty($restaurant)){
			
			$peopleCount = $this->_request->getPost('liczba_osob');
			$palacy = $this->_request->getPost('palacy');
			$date = $this->_request->getPost('data');
			
			if(empty($peopleCount)) return false;
			//get tables count
			$tablesCount = 0;
			echo('</br><pre>');
				var_dump($restaurant['tables']);
			echo('</br></pre>');
			echo('Liczba ludzi: '.$peopleCount);
			foreach($restaurant['tables'] as $key=>$table){
				if($peopleCount>=$table['min_places'] && $peopleCount<=$table['max_places'] && $table['is_smokingallowed']==$palacy) $tablesCount += $table['count'];
			}
			//get reserved count
			$reservationsModel = new Application_Model_Reservation();
			$reservations = $reservationsModel->getReservations($restaurant['restaurant']['idRestaurants'], $date, $peopleCount, $palacy, $restaurant['restaurant']['table_occupation_minutes']);
			//count reservations
			$reservationsCount = 0;
			echo('</br><pre>');
				var_dump($reservations->toArray());
			echo('</br></pre>');
			foreach($reservations as $key=>$r){
				$date = new Zend_Date($r['timestamp']);
				$fiveMinLater = new Zend_Date($date);
				$fiveMinLater->add(5,Zend_Date::MINUTE);
				$hourLater = new Zend_Date($date);
				$hourLater->addHour(1);//->add(1,Zend_Date::HOUR);
				$now = new Zend_Date();
				echo('</br> '.$date.' '.$fiveMinLater.' '.$hourLater.' '.$now.'</br>');
				switch($r['state']){
					case 0:
						if($now->compare($fiveMinLater)===-1)$reservationsCount++;
						break;
					case 1:
						if($now->compare($hourLater)===-1)$reservationsCount++;
						break;
					case 2:
						$reservationsCount++;
						break;
				}
			}
			echo('</br> rezerwacji: '.$reservationsCount.' stolików: '.$tablesCount.'</br>');
			//check availability
			if($reservationsCount<$tablesCount){
				echo('Stoliki dostępne');
				return true;	
			} else {
				return false;
			}	
		} else {
			return false;
		}
	}


}

