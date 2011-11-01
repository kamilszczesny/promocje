<?php
class Application_Model_City{
	protected $entity = null;
        protected $em = null;
        protected $doctrineContainer = null;
        
        function __construct(){
            $this->entity = new ZC\Entity\City();
            $this->doctrineContainer = Zend_Registry::get('doctrine');
            $this->em = $this->doctrineContainer->getEntityManager();
        } 

        function getAll(){
            
            $c = new ZC\Entity\City();
            //print_r($c);
            //echo('test');
//            $this->em->persist($c);
//            $this->em->flush();
//            $city = $this->em->find('ZC\Entity\City');
            $city = $this->em->createQuery('SELECT c FROM ZC\Entity\City c')
                         ->getResult();
            return $city;
        }
        function addCity($name){
            if(!empty($name)){
                $c = new ZC\Entity\City();
                $c->name = $name;
                $this->em->persist($c);
                $this->em->flush();
            }
            
        }
}
?>