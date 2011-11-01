<?php

class ProductAgregatController extends Zend_Controller_Action
{

    //MODELS
    var $shopModel = null;
    var $categoryModel = null;
    
    public function init()
    {
        /* Initialize action controller here */
		$this->productAgregatModel = new Application_Model_ProductAgregat();
                //$this->categoryModel = new Application_Model_ShopCategory();
		$this -> view -> setEncoding('UTF-8');
    }

    public function indexAction()
    {
        $formularz = new Form_ProductAgregatAdd();
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

