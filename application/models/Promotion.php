<?php
class Application_Model_Promotion{
	protected $entity = null;
        protected $em = null;
        protected $doctrineContainer = null;
        
        function __construct(){
            $this->entity = new ZC\Entity\Promotion();
            $this->doctrineContainer = Zend_Registry::get('doctrine');
            $this->em = $this->doctrineContainer->getEntityManager();
        } 
        
        function getAll(){
            $promotions = $this->em->createQuery('SELECT p FROM ZC\Entity\Promotion p')
                         ->getResult();
            return $promotions;
        }
        function addPromotion($promotion){
            if(!empty($agregat['name'])){
                $a = new ZC\Entity\ProductAgregat();
                $a->name = $agregat['name'];
                $a->description = $agregat['description'];
                $a->ingredients = $agregat['ingredients'];
                $a->imageUrl = $agregat['imageUrl'];
                $this->em->persist($a);
                $this->em->flush();
            }
            
        }
}
?>