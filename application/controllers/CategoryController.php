<?php

class CategoryController extends Zend_Controller_Action {

    //MODELS
    private $categoryModel = null;
    private $isLogged = false;

    public function init() {
        $this->categoryModel = new Application_Model_Category();

        $layout = $this->_helper->layout();
        //$layout->setLayout('backend');

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

        if (Zend_Auth::getInstance()->hasIdentity())
            $this->isLogged = true;
        else
            $this->isLogged = false;
    }

    public function indexAction() {
        $id = $this->_getParam('id', null);
        if (!empty($id)) {
            $category = $this->categoryModel->getCategoryById($id);
            $parent = $category->getParent();
            if(empty($parent)){
                $categories = $this->categoryModel->getMainCategories();
                $this->view->categories = $categories;
            }
            $this->view->data = $category;
            $this->view->headTitle()->prepend('Kategoria produktów');
            $this->view->headTitle()->prepend($category->name);
        }
    }
    
    public function addAction(){
        if ($this->isLogged) {
            $categories = $this->categoryModel->getAll();
            $formularz = new Form_CategoryAdd($categories);

            if ($this->getRequest()->isPost()) {
                $request = $this->getRequest();
                $formData = $request->getPost();
                if ($formularz->isValid($formData)) {
                    $this->categoryModel->addCategory($formData, $categories);
                    $this->view->message = 'Dodano nową kategorię produktu';
                } else {
                    $this->view->form = $formularz;
                    $this->view->message = 'Wystąpił błąd dodawania nowej kategorii produktu';
                }
            } else {
                $this->view->form = $formularz;
                $this->view->message = '';
            }

            $this->view->form = $formularz;
        }
    }

}

