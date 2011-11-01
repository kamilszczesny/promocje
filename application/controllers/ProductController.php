<?php

class ProductController extends Zend_Controller_Action
{

    //MODELS
    var $productModel = null;
    var $productAgregatModel = null;
    var $promotionModel = null;
    
    public function init()
    {
		$this->productModel = new Application_Model_Product();
                $this->productAgregatModel = new Application_Model_ProductAgregat();
                $this->promotionModel = new Application_Model_Promotion();
		$this -> view -> setEncoding('UTF-8');
    }

    public function indexAction()
    {
        $productAgregats = $this->productAgregatModel->getAll();
        
        $formularz = new Form_ProductAdd($productAgregats);
        
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
        
        $product = $this->productModel->getAll();
        $this->view->data = $product;
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

