<?php

class ProductController extends Zend_Controller_Action {

    //MODELS
    private $productModel = null;
    private $productAgregatModel = null;
    private $promotionModel = null;
    private $cityModel = null;
    private $isLogged = false;

    public function init() {
        $this->productModel = new Application_Model_Product();
        $this->productAgregatModel = new Application_Model_ProductAgregat();
        $this->promotionModel = new Application_Model_Promotion();
        $this->cityModel = new Application_Model_City();

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
        $this->view->headScript()->appendFile($this->view->baseUrl('/js/jstorage.min.js'));

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
            $product = $this->productModel->getProductById($id);
            
            //TODO wyciąganie produktu nie przez getProductById ale getProductByIdAndCity
            $cities = $this->cityModel->getAll();
            $selectedCity = $this->cityModel->getSessionCity();
            if(!empty($selectedCity)){
                $promotions = $this->promotionModel->getPromotionsByProductIdAndCityId($id,$selectedCity);
                //$product->setPromotions ($promotions);
            }
            $this->view->data = $product;
            $this->view->headTitle()->prepend('Aktualne promocje i informacje o produkcie');
            $this->view->headTitle()->prepend($product->name);
            $form1 = new Form_CityChoser($cities,'cities', $selectedCity);
            $form2 = new Form_CityChoser($cities,'citiesPopup', $selectedCity);
            $this->view->form1 = $form1;
            $this->view->form2 = $form2;
            $this->view->promotions = $promotions;
            //echo "\n" . (memory_get_usage() / 1024) . ' KB ' . PHP_EOL;
            
        }
    }

    public function addAction() {
        if ($this->isLogged) {
            $productAgregats = $this->productAgregatModel->getAll();

            $formularz = new Form_ProductAdd($productAgregats);
            
            echo('formularz');

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
    }

    public function modifyAction() {
        if ($this->isLogged) {
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

}

