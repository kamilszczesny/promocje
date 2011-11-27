<?php

class ShopController extends Zend_Controller_Action {

    //MODELS
    var $shopModel = null;
    var $categoryModel = null;
    var $cityModel = null;

    public function init() {
        /* Initialize action controller here */
        $this->shopModel = new Application_Model_Shop();
        $this->categoryModel = new Application_Model_ShopCategory();
        $this->cityModel = new Application_Model_City();
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
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('/css/jquery-ui-1.8.16.custom.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('/foundation/stylesheets/foundation.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('/foundation/stylesheets/app.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('/foundation/stylesheets/ie.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('/css/local.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('/css/backend.css'));

    }

    public function indexAction() {
        $id = $this->_getParam('id', null);
        if (!empty($id)) {
            $shop = $this->shopModel->getShopById($id);
            $categories = $this->categoryModel->getAll();
            $this->view->data = $shop;
            $this->view->categories = $categories;
        }
    }

    public function viewAction() {
        $formularz = new Form_ShopAdd();
        $formularz->setEnctype('UTF-8');

        if ($this->getRequest()->isPost()) {
            $request = $this->getRequest();
            $formData = $request->getPost();
            if ($formularz->isValid($formData)) {
                $this->shopModel->addShop($formData);
                $this->view->message = 'Dodano nowy sklep';
            } else {
                $this->view->form = $formularz;
                $this->view->message = 'Wystąpił błąd dodawania nowego sklepu';
            }
        } else {
            $this->view->form = $formularz;
            $this->view->message = '';
        }

        $city = $this->shopModel->getAll();
        $this->view->data = $city;
        $this->view->form = $formularz;
    }

    public function modifyAction() {
        $id = $this->_getParam('id', null);
        $shop = $this->shopModel->getShopById((int) $id);
        $categories = $this->categoryModel->getAll();
        $cities = $this->cityModel->getAll();

        $formularz = new Form_ShopModify(array(), $shop, $categories, $cities);

        if ($this->getRequest()->isPost()) {
            $request = $this->getRequest();
            $formData = $request->getPost();
            if ($formularz->isValid($formData)) {
                $this->shopModel->saveShop($formData, $shop, $categories, $cities);
                $this->view->message = 'Zmodyfikowano sklep';
            } else {
                $this->view->form = $formularz;
                $this->view->message = 'Wystąpił błąd w zapisywaniu zmian w sklepie';
            }
        } else {
            $this->view->form = $formularz;
            $this->view->message = '';
        }

        $shops = $this->shopModel->getAll();
        $this->view->data = $shops;
    }

    public function addAction() {
        $categories = $this->categoryModel->getAll();
        $cities = $this->cityModel->getAll();
        $formularz = new Form_ShopAdd(array(), $categories, $cities);

        if ($this->getRequest()->isPost()) {
            $request = $this->getRequest();
            $formData = $request->getPost();
            if ($formularz->isValid($formData)) {
                $this->shopModel->addShop($formData, $categories, $cities);
                $this->view->message = 'Dodano nowy sklep';
            } else {
                $this->view->form = $formularz;
                $this->view->message = 'Wystąpił błąd dodawania nowego sklepu';
            }
        } else {
            $this->view->form = $formularz;
            $this->view->message = '';
        }

        $shops = $this->shopModel->getAll();
        $this->view->form = $formularz;
    }

}

