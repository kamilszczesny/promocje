<?php

class RezerwacjeController extends Zend_Controller_Action
{
    public function init()
    {
        $this->restaurantModel = new Application_Model_Restaurant();
        $this->reservationModel = new Application_Model_Reservation();
    }

    
    public function indexAction()
    {

    }

	public function publicAction()
    {
        // action body
    }
    
    public function makeAction(){
//    	if ($this->getRequest()->isPost()) {
//    		$form = new Form_ReservationAddSecondStep(array('firstStepData'=>$this->_request->getPost()));
//    		$this->view->form = $form;
//    	} else {
//    		throw new Zend_Controller_Action_Exception('Nie wybrano restauracji terminu', 404);
//    	}
		
    	$formData  = $this->_request->getPost();
    	$formularz = new Form_ReservationAddSecondStep(array('firstStepData'=>$formData));
            if ($formularz->isValid($formData)) {
		           // $id = $customer->addCustomer($formData);
		            //$this->view->success = 'Dodano klienta o ID: '.$id;
                    //$this->render('add');
                    echo('poprawny formularz - zapisanie do bazy </br>');
                    $data = array(
                    	'imie' => $this->_request->getPost('imie'),
                    	'nazwisko' => $this->_request->getPost('nazwisko'),
                    	'tel' => $this->_request->getPost('telefon'),
                    	'email' => $this->_request->getPost('email'),
                    	'state' => 1,
                    	'id' => $this->_request->getPost('id'),
                    );
                    $effect = $this->reservationModel->updateTemporaryReservation($data);
                    if($effect) $this->view->message = 'Zaktualizowano stan rezerwacji';
                    else $this->view->message = 'Wystąpił błąd - nie ma takiej rezerwacji albo przekroczono czas na potwierdzenie.';
            } else {
            	$this->view->form = $formularz;
            	$this->render('make');
            }
    	echo('tutaj następuje zapisanie rezerwacji');
    }
	public function saveAction(){
		
	}
    
    public function rezerwujAction(){
    	
    	
    	echo('rezerwacje</br>');
		$params = $this->_getAllParams();
		
		echo('<pre>');print_r($params);echo('</pre></br>');
		
    	$ret = $this->restaurantModel->getRestaurant($params['id']);
		if(!empty($ret)){
			$this->view->data = $ret->toArray();
			echo('restauracja:');
			echo('<pre>');print_r($ret->toArray());echo('</pre></br>');
		} else {
			echo('brak takiej restauracji');
		}
		
		$options = array();
		$options['date'] = !empty($params['data'])?$params['data']:'';
		$options['restaurantId']= !empty($params['id'])?$params['id']:'';
		$options['palacy']= !empty($params['palacy'])?$params['palacy']:'';
		$options['niepalacy']= !empty($params['niepalacy'])?$params['niepalacy']:'';
		$options['peopleNumber']= !empty($params['liczba_osob'])?$params['liczba_osob']:'';
		$formularz = new Form_Reservation();
		$formularz->setEncType('UTF-8');
		$this->view->form = $formularz;
		
    }
    
    public function confirmAction(){
    	$code = $this->_getParam('code', null);
    	if($code){
    		$efect = $this->reservationModel->confirmReservation($code);
    		if($effect){
    			$this->view->message = "Gratulacje! Udało się potwierdzić rezerwację";
    			$this->view->reservation = $this->reservationModel->getReservationsByMd5($code);
    			echo('1');
    		} else {
    			$this->view->message="Wprowadzono błędny kod potwierdzający, lub minął czas na potwierdzenie rezerwacji.";
    		}
    	} else {
    		$this->view->message="Uszkodzony url potwierdzający rezerwację. Nie można potwierdzić rezerwacji.";
    	}
    }


}

