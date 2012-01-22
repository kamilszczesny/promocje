<?php

class OfferController extends Zend_Controller_Action {

    //MODELS
    private $offerModel = null;
    private $cityModel = null;
    private $shopModel = null;
    private $isLogged = false;

    public function init() {
        $this->offerModel = new Application_Model_Offer();
        $this->cityModel = new Application_Model_City();
        $this->shopModel = new Application_Model_Shop();

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

        if (Zend_Auth::getInstance()->hasIdentity())
            $this->isLogged = true;
        else
            $this->isLogged = false;
    }

    public function addAction() {
        if ($this->isLogged) {
            $cities = $this->cityModel->getAll();
            $shops = $this->shopModel->getAll();

            $formularz = new Form_OfferAdd($cities, $shops);

            if ($this->getRequest()->isPost()) {
                $request = $this->getRequest();
                $formData = $request->getPost();
                if ($formularz->isValid($formData)) {
                    $this->offerModel->addOffer($formData, $shops, $cities);
                    $this->view->message = 'Dodano nową gazetkę';
                } else {
                    $this->view->form = $formularz;
                    $this->view->message = 'Wystąpił błąd dodawania nowej gazetki';
                }
            } else {
                $this->view->form = $formularz;
                $this->view->message = '';
            }

            $offers = $this->offerModel->getAll();
            $this->view->data = $offers;
            $this->view->form = $formularz;
        }
    }

    public function modifyAction() {
        if ($this->isLogged) {
            $id = $this->_getParam('id', null);
            if (!empty($id)) {
                $cities = $this->cityModel->getAll();
                $shops = $this->shopModel->getAll();
                $offer = $this->offerModel->getOfferById($id);


                $formularz = new Form_OfferModify($offer, $cities, $shops);

                if ($this->getRequest()->isPost()) {
                    $request = $this->getRequest();
                    $formData = $request->getPost();

                    if ($formularz->isValid($formData)) {
                        $this->offerModel->saveOffer($formData, $offer, $shops, $cities);
                        $this->view->message = 'Zmodyfikowano gazetkę';
                        $this->view->form = $formularz;
                    } else {
                        $this->view->form = $formularz;
                        $this->view->message = 'Wystąpił błąd dodawania nowej gazetki';
                    }
                } else {
                    $this->view->form = $formularz;
                    $this->view->message = '';
                }

                $offers = $this->offerModel->getAll();
                $this->view->data = $offers;
            }
        }
    }
    
    public function ajaxlistAction(){
        $shopId = $this->_getParam('shop', null);
        $cityId = $this->_getParam('city', null);
        $offers = $this->offerModel->getOffersByShopIdAndCityId($shopId, $cityId);
        $layout = $this->_helper->layout();
        $layout->setLayout('ajax');
        $this->view->currentOffers = $offers['current'];
        $this->view->futureOffers = $offers['future'];
    }

}
