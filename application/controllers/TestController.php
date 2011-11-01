<?php
/**
 * TestController
 * 
 * @author
 * @version 
 */
class TestController extends Zend_Controller_Action
{
    /**
     * The default action - show the home page
     */
    public function indexAction ()
    {
        // TODO Auto-generated TestController::indexAction() default action
		$this->view->entries = array('moo', 'dave', 'fred', 'andy', 'jo');  
		$this->view->moo = 'Moo';
		$this->view->content = '</br>Testowy content</br>';
		echo('controller test akcja index</br>');
    }
}
