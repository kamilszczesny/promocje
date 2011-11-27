<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	
    protected function _initAutoload()
    {
        $autoloader = Zend_Loader_Autoloader::getInstance();
	//$autoloader->registerNamespace('Local_');
	$autoloader->registerNamespace('Form_');
    	$autoloader->registerNamespace('Validator_');
	//$autoloader->registerNamespace('Doctrine_');
	$autoloader->registerNamespace('Ext_');
        return $autoloader;
    }
    protected function _initModel()
    {
        //$doctrine = new Bisna\Application\Container\Bisna_Application_Resource_Doctrine();
        //$doctrine->init();
        //$container = $this->getResource('doctrine');
        date_default_timezone_set('Europe/Warsaw');
        $config = $this->getOptions();
//        echo('<pre>');
//        print_r($config);
//        echo('</pre>');
        $this->registerAutoloaders($config);
        $container = new Bisna\Application\Container\DoctrineContainer($config['resources']['doctrine']);
        \Zend_Registry::set('doctrine', $container);
        return $container;
    }
    protected function _initView() {
	//ustawienie Smarty jako silnika szablonów
	 $view = new Ext_Smarty($this->getOption('smarty'));
	 //charset i doctype
	 $view->setEncoding('UTF-8');
	 $view->headMeta()->appendHttpEquiv('Content-Type', 'text/html;charset=utf-8');
	 $view->doctype('HTML5');
	 //ustawienie ścieżki żeby wykorzystywac swoje helpery
	 $view->addHelperPath('../application/views/helpers/', 'Application_View_Helper');
	 
	 $viewRender = Zend_Controller_Action_HelperBroker::getStaticHelper(
	  'ViewRenderer'
	 );
	 $viewRender->setView($view);
	 
	 // ensure we have layout bootstraped
	 $this->bootstrap('layout');
	 // set the tpl suffix to layout also
	 $layout = Zend_Layout::getMvcInstance();
	
	 $viewRender->setViewSuffix('tpl');
         $layout->setViewSuffix('tpl');
	 Zend_Controller_Action_HelperBroker::addHelper($viewRender);
         
         //ustawianie ZendX_jQuery
         $view->addHelperPath('ZendX/jQuery/View/Helper','ZendX_Jquery_View_Helper');
         $view->headTitle()->setSeparator(' - ');
         $view->headTitle('Promoland.pl');
         ZendX_jQuery::enableView($view);
	 return $view;
}

protected function _initLocale()  
{  
    $locale = new Zend_Locale('pl');  
    Zend_Registry::set('Zend_Locale', $locale);  
} 


protected function _initConfig()
{
    //$config = new Zend_Config($this->getOptions(), true);
    $config = $this->getOptions();
    Zend_Registry::set('config', $config);
    return $config;
}

private function registerAutoloaders(array $config = array())
    {
        $autoloader = \Zend_Loader_Autoloader::getInstance();
        $doctrineIncludePath = isset($config['includePath'])
            ? $config['includePath'] : APPLICATION_PATH . '/../library/Doctrine';

        require_once $doctrineIncludePath . '/Common/ClassLoader.php';
        $autoloader->registerNamespace('Upload_');
        $autoloader->registerNamespace('wi_');
        $autoloader->registerNamespace('ZendX_');

        //$test = \Wideimage\wi_WideImage::
        $symfonyAutoloader = new \Doctrine\Common\ClassLoader('Symfony');
        $autoloader->pushAutoloader(array($symfonyAutoloader, 'loadClass'), 'Symfony');
        
        $doctrineExtensionsAutoloader = new \Doctrine\Common\ClassLoader('DoctrineExtensions');
        $autoloader->pushAutoloader(array($doctrineExtensionsAutoloader, 'loadClass'), 'DoctrineExtensions');

        $doctrineAutoloader = new \Doctrine\Common\ClassLoader('Doctrine');
        $autoloader->pushAutoloader(array($doctrineAutoloader, 'loadClass'), 'Doctrine');
    }


 
}

