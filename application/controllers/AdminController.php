<?php

class AdminController extends Zend_Controller_Action
{

    public function init()
    {
        $this->productModel = new Application_Model_Product();
		$this -> view -> setEncoding('UTF-8');
    }

    public function indexAction()
    {
//  		$config = Zend_Registry::get('config');
//  		
//    	$adapter = 'Zend_Db_Adapter_'.$config['resources']['db']['adapter'];
//    	$dbAdapter = new $adapter($config['resources']['db']['params']);
//    	$authAdapter = new Zend_Auth_Adapter_DbTable($dbAdapter, 'users', 'username', 'password');
//		$authAdapter->setIdentity('admin')
//            ->setCredential('admin');
//
//		$result = $authAdapter->authenticate();
//		echo $result->getIdentity() . "\n\n";
//
//		print_r($authAdapter->getResultRowObject());
//    	
//		if (!$result->isValid()) {
//			echo('zle haslo');
//		} else {
//			echo('dobre haslo');
//		}
//
//	 
//	 	$temp = $this->productModel->getProducts();
//		echo('<pre>');
//		 print_r($temp->toArray());
//		echo('</pre>');
	$u = new ZC\Entity\Offer();
	var_dump($u);

    }
    
	  

}

