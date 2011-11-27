<?php

class ProductController extends Zend_Controller_Action {

    //MODELS
    var $productModel = null;
    var $productAgregatModel = null;
    var $promotionModel = null;

    public function init() {
        $this->productModel = new Application_Model_Product();
        $this->productAgregatModel = new Application_Model_ProductAgregat();
        $this->promotionModel = new Application_Model_Promotion();

        $layout = $this->_helper->layout();
        $layout->setLayout('layout');

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
    }

    public function indexAction() {
        $id = $this->_getParam('id', null);
        if (!empty($id)) {
            $product = $this->productModel->getProductById($id);
            $this->view->data = $product;
        }
    }

    public function addAction() {
        $productAgregats = $this->productAgregatModel->getAll();

        $formularz = new Form_ProductAdd($productAgregats);

        if ($this->getRequest()->isPost()) {
            $request = $this->getRequest();
            $formData = $request->getPost();
            if ($formularz->isValid($formData)) {
                $this->productModel->addProduct($formData, $productAgregats);
                $this->view->message = 'Dodano nowy produkt';
            } else {
                $this->view->form = $formularz;
                $this->view->message = 'Wystąpił błąd dodawania nowego produktu';
            }
        } else {
            $this->view->form = $formularz;
            $this->view->message = '';
        }

        $product = $this->productModel->getAll();
        $this->view->data = $product;
        $this->view->form = $formularz;
    }

    public function modifyAction() {
        $id = $this->_getParam('id', null);
        if (!empty($id)) {
            $productAgregats = $this->productAgregatModel->getAll();
            $product = $this->productModel->getProductById($id);

            $formularz = new Form_ProductModify($productAgregats, array(
                        'data' => $product,
                    ));

            if ($this->getRequest()->isPost()) {
                $request = $this->getRequest();
                $formData = $request->getPost();
                if ($formularz->isValid($formData)) {
                    $this->productModel->saveProduct($formData, $product, $productAgregats);
                    $this->view->message = 'Zapisano produkt';
                } else {
                    $this->view->form = $formularz;
                    $this->view->message = 'Wystąpił błąd dodawania nowego produktu';
                }
            } else {
                $this->view->form = $formularz;
                $this->view->message = '';
            }

            $product = $this->productModel->getAll();
            $this->view->data = $product;
            $this->view->form = $formularz;
        }
    }

}

