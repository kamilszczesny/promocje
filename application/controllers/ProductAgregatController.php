<?php

class ProductAgregatController extends Zend_Controller_Action
{

    //MODELS
    var $productAgregatModel = null;
    var $categoryModel = null;
    
    public function init()
    {
        /* Initialize action controller here */
		$this->productAgregatModel = new Application_Model_ProductAgregat();
                $this->categoryModel = new Application_Model_Category();
		$this -> view -> setEncoding('UTF-8');
                
                $layout = $this->_helper->layout();
        $layout->setLayout('layout');

        $this->view->headScript()->appendFile($this->view->baseUrl('/js/jquery-1.6.2.min.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('/foundation/javascripts/foundation.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('/foundation/javascripts/app.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('/js/jquery-ui-1.8.16.custom.min.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('/js/jquery-ui-timepicker-addon.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('/js/jquery.autocomplete.pack.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('/js/jquery.select-autocomplete.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('/js/jquery.form.js'));

        $this->view->headLink()->appendStylesheet($this->view->baseUrl('/css/anytime.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('/css/jquery-ui-1.8.16.custom.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('/css/local.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('/css/backend.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('/foundation/stylesheets/foundation.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('/foundation/stylesheets/app.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('/foundation/stylesheets/ie.css'));
    }

    public function addAction()
    {
        $categories = $this->categoryModel->getAll();
        $formularz = new Form_ProductAgregatAdd($categories);
        $formularz->setEnctype('UTF-8');
        
        if ($this->getRequest()->isPost()) {
            $request = $this->getRequest();
            $formData  = $request->getPost();
            if($formularz->isValid($formData)){
                $this->productAgregatModel->addProductAgregat($formData);
                $this->view->message = 'Dodano nowy agregat produktu';
            } else {
                $this->view->form = $formularz;
                $this->view->message = 'Wystąpił błąd dodawania nowego agregatyu produktu';
            }
        } else {
            $this->view->form = $formularz;
            $this->view->message = '';
        }
        
        $productAgregat = $this->productAgregatModel->getAll();
        $this->view->data = $productAgregat;
        $this->view->form = $formularz;
    }
    
    public function modifyAction() {
        $id = $this->_getParam('id', null);
        if (!empty($id)) {
            $categories = $this->categoryModel->getAll();
            $productAgregat = $this->productAgregatModel->getproductAgregatById($id);
            $formularz = new Form_ProductAgregatModify($productAgregat, $categories);

            if ($this->getRequest()->isPost()) {
                $request = $this->getRequest();
                $formData = $request->getPost();

                if ($formularz->isValid($formData)) {
                    $this->productAgregatModel->saveProductAgregat($formData,$productAgregat, $categories);
                    $this->view->message = 'Zmodyfikowano agregat produktu';
                } else {
                    $this->view->form = $formularz;
                    $this->view->message = 'Wystąpił błąd w modyfikacji agregatu produktu';
                }
            } else {
                $this->view->form = $formularz;
                $this->view->message = '';
            }
        }
    }
	
	

}

