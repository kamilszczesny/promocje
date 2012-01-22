<?php

class IndexController extends Zend_Controller_Action
{
    private $offerModel = null;
    private $cityModel = null;
    private $shopModel = null;
    private $categoryModel = null;
    private $productAgragatModel = null;
    private $promotionModel = null;

    public function init()
    {
        $this->offerModel = new Application_Model_Offer();
        $this->cityModel = new Application_Model_City();
        $this->shopModel = new Application_Model_Shop();
        $this->categoryModel = new Application_Model_Category();
        $this->promotionModel = new Application_Model_Promotion();
        $this->productAgragatModel = new Application_Model_ProductAgregat();
        
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

        $this->view->headLink()->appendStylesheet($this->view->baseUrl('/foundation/stylesheets/foundation.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('/css/anytime.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('/css/jquery-ui-1.8.16.custom.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('/css/local.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('/css/backend.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('/foundation/stylesheets/app.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('/foundation/stylesheets/ie.css'));
        if (Zend_Auth::getInstance()->hasIdentity())
            $this->isLogged = true;
        else
            $this->isLogged = false;
    }

    public function indexAction()
    {
        $cityId = $this->cityModel->getSessionCity();
        $newestOffers = $this->offerModel->getNewestOffers($cityId);
        $products = $this->productAgragatModel->getAll();
        $popularPromotions = $this->promotionModel->getPopularPromotionsByCityId($cityId);
        $shops = $this->shopModel->getAll();
        $categories = $this->categoryModel->getMainCategories();
        $productSearchForm = new Form_ProductSearch($products);
        $shopSearchForm = new Form_ShopSearch($shops);
        $this->view->newestOffers = $newestOffers;
        $this->view->popularPromotions = $popularPromotions;
        $this->view->productSearchForm = $productSearchForm;
        $this->view->shopSearchForm = $shopSearchForm;
        $this->view->categories = $categories;
    }


}

