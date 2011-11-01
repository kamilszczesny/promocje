<?php

class CityController extends Zend_Controller_Action
{

    var $cityModel = null;
    
    public function init()
    {
        /* Initialize action controller here */
		$this->cityModel = new Application_Model_City();
		$this -> view -> setEncoding('UTF-8');
    }

    public function indexAction()
    {
        $formularz = new Form_CityAdd();
        $formularz->setEnctype('UTF-8');
        if ($this->getRequest()->isPost()) {
            $request = $this->getRequest();
            $formData  = $request->getPost();
            if($formularz->isValid($formData)){
                $this->cityModel->addCity($formData['name']);
                $this->view->message = 'Dodano nowe miasto';
            } else {
                $this->view->form = $formularz;
                $this->view->message = 'Wystąpił błąd dodawania nowego miasta';
            }
        } else {
            $this->view->form = $formularz;
            $this->view->message = '';
        }
        
        $city = $this->cityModel->getAll();
        $this->view->data = $city;
        $this->view->form = $formularz;
    }
	
	/**
	 *
	 */
	public function addAction(){
		// try {
			// $customerModel->createCustomer();
		// }
		// catch (Zend_Exception $e) {
			//my_error_handler($e);
			// echo($e->getMessage());
		// 
		$formularz = new Form_CustomerAdd();
		//$formularz2 = new Form_Reservation();
		$formularz->setEnctype('UTF-8');
		//$formularz2->setEncType('UTF-8');
		
		$customer = $this->customerModel;
		
		//Jesli zostały przesłane dane z formularza
		//nastpuje walidacja wpisanych danych
		if ($this->getRequest()->isPost()) {
		  $request = $this->getRequest();
      //walidacja captchy
      $captcha = $request->getPost('captcha');
      $captchaId = $captcha['id'];
      $captchaInput = $captcha['input'];
      $captchaSession = new Zend_Session_Namespace('Zend_Form_Captcha_'.$captchaId);
      $captchaIterator = $captchaSession->getIterator();
      $captchaWord = $captchaIterator['word'];
      //testowanie poprawności wpisanej captchy
      if($captchaInput==$captchaWord){
        $validCaptha = true;
      } else {
        $validCaptcha = false;
      }
			$formData  = $this->_request->getPost();
            if ($formularz->isValid($formData) && $validCaptcha) {
		            $id = $customer->addCustomer($formData);
		            $this->view->success = 'Dodano klienta o ID: '.$id;
                    $this->render('add');
            } else {
            	//print_r($this->_request);
            	$this->view->form = $formularz;
              $this->view->errorMessage = 'captcha: '.$captchaInput.' a powinno byc '.$captchaWord;
            	$this->render('add');
            }
      //formularz nie został przesłany
      //nastpuje jego pierwsze wyświetlenie
      } else {
			$this->view->form = $formularz;
			//$this->view->form2 = $formularz2;
        }
		
	}
	
	public function signAction()
    {
        $request = $this->getRequest();
        $form    = new Form_Rejestracja();
 
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {

                return $this->_helper->redirector('index');
            }
        }
		
        $this->view->form = $form;
    }
	
	public function getAction()
    {
		$customers = $this->customerModel->getCustomers(10,0);
		//Local_VD::dump($customers->current());
		//var_dump($customers);
		
		$this->view->customers = $customers->toArray();
		$this->view->title = 'tytuł';

	}


}

