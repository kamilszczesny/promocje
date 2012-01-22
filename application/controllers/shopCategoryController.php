<?php

class ShopCategoryController extends Zend_Controller_Action {

    //MODELS
    private $shopCategoryModel = null;
    private $isLogged = false;

    public function init() {
        $this->shopCategoryModel = new Application_Model_ShopCategory();

        $layout = $this->_helper->layout();
        //$layout->setLayout('backend');

        $this->view->setEncoding('UTF-8');

        $this->view->headScript()->appendFile($this->view->baseUrl('/js/jquery-1.6.2.min.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('/foundation/javascripts/foundation.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('/foundation/javascripts/app.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('/js/jquery-ui-1.8.16.custom.min.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('/js/jquery-ui-timepicker-addon.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('/js/jquery.autocomplete.pack.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('/js/jquery.select-autocomplete.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('/js/jquery.form.js'));

        $this->view->headLink()->appendStylesheet($this->view->baseUrl('/css/anytime.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('/foundation/stylesheets/foundation.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('/foundation/stylesheets/app.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('/foundation/stylesheets/ie.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('/css/jquery-ui-1.8.16.custom.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('/css/local.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('/css/backend.css'));

        if (Zend_Auth::getInstance()->hasIdentity())
            $this->isLogged = true;
        else
            $this->isLogged = false;
    }

    public function indexAction() {
        $id = $this->_getParam('id', null);
        if (!empty($id)) {
            $shopCategory = $this->shopCategoryModel->getCategoryById($id);
            $categories = $this->shopCategoryModel->getAll();
            $this->view->data = $shopCategory;
            $this->view->categories = $categories;
            $this->view->headTitle()->prepend('Kategoria sklepów');
            $this->view->headTitle()->prepend($shopCategory->name);
        }
    }
    
    public function addAction(){
        if ($this->isLogged) {
            $formularz = new Form_ShopCategoryAdd();

            if ($this->getRequest()->isPost()) {
                $request = $this->getRequest();
                $formData = $request->getPost();
                if ($formularz->isValid($formData)) {
                    $this->shopCategoryModel->addCategory($formData);
                    $this->view->message = 'Dodano nową kategorię sklepu';
                } else {
                    $this->view->form = $formularz;
                    $this->view->message = 'Wystąpił błąd dodawania nowej kategorii sklepu';
                }
            } else {
                $this->view->form = $formularz;
                $this->view->message = '';
            }

            $this->view->form = $formularz;
        }
    }

}

