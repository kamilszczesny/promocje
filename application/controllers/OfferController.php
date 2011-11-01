<?php

class OfferController extends Zend_Controller_Action
{

    //MODELS
    var $offerModel = null;
    var $cityModel = null;
    var $shopModel = null;
    
    public function init()
    {
		$this->offerModel = new Application_Model_Offer();
                $this->cityModel = new Application_Model_City();
                $this->shopModel = new Application_Model_Shop();
		$this -> view -> setEncoding('UTF-8');
    }

    public function indexAction()
    {
        $cities = $this->cityModel->getAll();
        $shops = $this->shopModel->getAll();
        
        $formularz = new Form_OfferAdd($cities);
        
        if ($this->getRequest()->isPost()) {
            $request = $this->getRequest();
            $formData  = $request->getPost();
            if($formularz->isValid($formData)){
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
        
        $offers = $this->offerModel->getAll();
        $this->view->data = $offers;
        $this->view->form = $formularz;
    }
    
//    public function modifyAction(){
//        $id = $this->_getParam('id', null);
//        $shop = $this->shopModel->getById((int)$id);
//        $categories = $this->categoryModel->getAll();
//
//        $formularz = new Form_ShopModify(array(
//                                            'data'=>$shop,
//                                            'categories'=>$categories
//                                        ));
//        
//        if ($this->getRequest()->isPost()) {
//            $request = $this->getRequest();
//            $formData  = $request->getPost();
//            if($formularz->isValid($formData)){
//                $this->shopModel->saveShop($formData, $shop);
//                $this->view->message = 'Zmodyfikowano sklep';
//            } else {
//                $this->view->form = $formularz;
//                $this->view->message = 'Wystąpił błąd w zapisywaniu zmian w sklepie';
//            }
//        } else {
//            $this->view->form = $formularz;
//            $this->view->message = '';
//        }
//        
//        $shops = $this->shopModel->getAll();
//        $this->view->data = $shops;
//        $this->view->form = $formularz;
//    }
	
	

}

