<?php

class OwnerController extends Zend_Controller_Action
{

	var $ownerModel = null;
    public function init()
    {
        /* Initialize action controller here */
		$this->ownerModel = new Application_Model_Owner();
		$this -> view -> setEncoding('UTF-8');
    }

    public function indexAction()
    {
        // action body
    }
	
	/**
	 *
	 */
	public function addAction(){
		$formularz = new Form_OwnerAdd();
		$formularz->setEnctype('UTF-8');
		
		$owner = $this->ownerModel;
		
		//Jesli zostały przesłane dane z formularza
		//nastpuje walidacja wpisanych danych
		if ($this->getRequest()->isPost()) {
		  $request = $this->getRequest();

			$formData  = $this->_request->getPost();
            if ($formularz->isValid($formData)) {
		            $id = $owner->addOwner($formData);
		            $this->view->success = 'Dodano właściciela o ID: '.$id;
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
	
	public function getAction()
    {
		$owners = $this->ownerModel->getOwners(10,0);
		//Local_VD::dump($customers->current());
		//var_dump($customers);
		
		$this->view->owners = $owners->toArray();
		$this->view->title = 'tytuł';

	}


}

