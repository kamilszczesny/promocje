<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author Kamil
 */
class Ext_Login implements Zend_Auth_Adapter_Interface {

    protected $_username;
    protected $_password;
    protected $_userModel = null;

    public function __construct($username, $password) {
        $this->_username = $username;
        $this->_password = $password;
        $this->_userModel = new Application_Model_User();
    }

    public function authenticate() {
        $user = $this->_userModel->getUserByUsername($this->_username);
        
        if (empty($user)) {
            return new Zend_Auth_Result(Zend_Auth_Result::FAILURE_IDENTITY_NOT_FOUND, $this->_username);
        }
        if ($user->password != md5($user->salt.$this->_password)) {
            return new Zend_Auth_Result(Zend_Auth_Result::FAILURE_CREDENTIAL_INVALID, $this->_username);
        }
        return new Zend_Auth_Result(Zend_Auth_Result::SUCCESS);
    }

}
