<?php

/**
 * TestController
 * 
 * @author
 * @version 
 */
class LoginController extends Zend_Controller_Action {

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        if ($this->getRequest()->isPost()) {
            $auth = Zend_Auth::getInstance();
            $result = $auth->authenticate(new Ext_Login($_POST['username'], $_POST['password']));
            switch ($result->getCode()) {
                case Zend_Auth_Result::FAILURE_IDENTITY_NOT_FOUND:
                    break;
                case Zend_Auth_Result::FAILURE_CREDENTIAL_INVALID:
                    break;
                default:
                    $identity = 'test';
                    $auth->getStorage()->write($identity);
                    break;
            }
        } else {
            echo('Sprawdzam czy zalogowano... <br/>');
            if (Zend_Auth::getInstance()->hasIdentity()) {
                echo "Jestes już zalogowany";
            }
        }
        if(!empty($_POST['backUrl'])) header( 'Location: '. $_POST['backUrl']) ;
    }

}
