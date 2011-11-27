<?php

class PromotionController extends Zend_Controller_Action {

    //MODELS
    var $offerModel = null;
    var $promotionModel = null;
    var $productModel = null;

    public function init() {
        $this->offerModel = new Application_Model_Offer();
        $this->promotionModel = new Application_Model_Promotion();
        $this->productModel = new Application_Model_Product();

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
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('/css/jquery-ui-1.8.16.custom.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('/css/local.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('/css/backend.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('/foundation/stylesheets/foundation.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('/foundation/stylesheets/app.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('/foundation/stylesheets/ie.css'));
    }

    public function addAction() {
        $products = $this->productModel->getAll();
        $offers = $this->offerModel->getAll();

        $formularz = new Form_PromotionAdd($products, $offers);

        if ($this->getRequest()->isPost()) {
            $request = $this->getRequest();
            $formData = $request->getPost();
            if ($formularz->isValid($formData)) {
                $this->promotionModel->addPromotion($formData, $products, $offers);
                $this->view->message = 'Dodano nowy produkt';
            } else {
                $this->view->form = $formularz;
                $this->view->message = 'Wystąpił błąd dodawania nowego produktu';
            }
        } else {
            $this->view->form = $formularz;
            $this->view->message = '';
        }

        $promotions = $this->promotionModel->getAll();
        $this->view->data = $promotions;
        $this->view->form = $formularz;
    }

    public function modifyAction() {
        $id = $this->_getParam('id', null);
        if (!empty($id)) {
            $products = $this->productModel->getAll();
            $offers = $this->offerModel->getAll();
            $promotion = $this->promotionModel->getPromotionById($id);
            $formularz = new Form_PromotionModify($promotion, $products, $offers);

            if ($this->getRequest()->isPost()) {
                $request = $this->getRequest();
                $formData = $request->getPost();

                if ($formularz->isValid($formData)) {
                    $this->promotionModel->savePromotion($formData,$promotion, $products, $offers);
                    $this->view->message = 'Zmodyfikowano promocję';
                } else {
                    $this->view->form = $formularz;
                    $this->view->message = 'Wystąpił błąd w modyfikacji promocji';
                }
            } else {
                $this->view->form = $formularz;
                $this->view->message = '';
            }

            $promotions = $this->promotionModel->getAll();
        }
    }

}

