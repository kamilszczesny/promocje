<?php

class ShopController extends Zend_Controller_Action
{

    //MODELS
    var $shopModel = null;
    var $categoryModel = null;
    
    public function init()
    {
        /* Initialize action controller here */
		$this->shopModel = new Application_Model_Shop();
                $this->categoryModel = new Application_Model_ShopCategory();
		$this -> view -> setEncoding('UTF-8');
    }

    public function indexAction()
    {
        $formularz = new Form_ShopAdd();
        $formularz->setEnctype('UTF-8');
        
        if ($this->getRequest()->isPost()) {
            $request = $this->getRequest();
            $formData  = $request->getPost();
            if($formularz->isValid($formData)){
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
    
    public function modifyAction(){
        $id = $this->_getParam('id', null);
        $shop = $this->shopModel->getById((int)$id);
        $categories = $this->categoryModel->getAll();

        $formularz = new Form_ShopModify(array(
                                            'data'=>$shop,
                                            'categories'=>$categories
                                        ));
        
        if ($this->getRequest()->isPost()) {
            $request = $this->getRequest();
            $formData  = $request->getPost();
            if($formularz->isValid($formData)){
                $this->shopModel->saveShop($formData, $shop);
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
        $this->view->form = $formularz;
    }
	
	

}

