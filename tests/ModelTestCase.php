<?php
class ModelTestCase extends PHPUnit_Framework_TestCase
{
	/**
	 * 
	 * Enter description here ...
	 * @var \Bisma\Application\Container\DoctrineContainer
	 */
	protected $doctrineContainer;
	
	public function setUp()
	{
		global $application;
		$application->bootstrap();
		
		$tool = new \Doctrine\ORM\Tools\SchemaTool($this->doctrineContainer->getEntityManager());
		
		$tool->createSchema($this->getClassMetas(APPLICATION_PATH . '/../library/ZC/Entity',
			'ZC\Entity\\'
		));
		
		$this->doctrineContainer = Zend_Registry::get('doctrine');
		parent::setUp();
	}
	
	public function getClassMetas($p, $namespace)
	{
		$metas = array();
		if($handle = opendir($path)){
			while(false !== ($file = readdir($handle))){
				if(strstr($file, '.php')){
					list($class) = explode('.', $file);
					$metas[] = $this->doctrineContainer->getEntityManager()->getClassMetadata($namespace . $class);
					
				}
			}
		}
		return $metas;	
	}
	
	public function tearDown(){
		parent::tearDown();
	}
}
