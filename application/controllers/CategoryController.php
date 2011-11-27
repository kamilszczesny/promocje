<?php

class CategoryController extends Zend_Controller_Action
{

    //MODELS
    var $categoryModel = null;
    
    public function init()
    {
		$this->categoryModel = new Application_Model_Category();
                
                $layout = $this->_helper->layout();
                //$layout->setLayout('backend');
                
		$this -> view -> setEncoding('UTF-8');
    }

    public function indexAction(){
        $id = $this->_getParam('id', null);
        if(!empty($id)){
            $category = $this->categoryModel->getCategoryById($id);
            $this->view->data = $category;
        }
        
    }
    
    
}

