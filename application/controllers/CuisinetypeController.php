<?php

class CuisinetypeController extends Zend_Controller_Action
{

	var $restaurantModel = null;
    public function init()
    {
        /* Initialize action controller here */
    $this->cuisinetypeModel = new Application_Model_Cuisinetype();
    }

    public function indexAction()
    {

		
		}
	
	public function addAction(){

    $formularz = new Form_CuisinetypeAdd();
    $formularz->setEnctype('UTF-8');
    
    $cuisinetype = $this->cuisinetypeModel;
    
    //Jesli zostały przesłane dane z formularza
    //nastpuje walidacja wpisanych danych
    if ($this->getRequest()->isPost()) {
      $request = $this->getRequest();

      $formData  = $this->_request->getPost();
            if ($formularz->isValid($formData)) {
                $id = $cuisinetype->addCuisinetype($formData);
                $this->view->success = 'Dodano typ kuchni o ID: '.$id;
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

	}


}

