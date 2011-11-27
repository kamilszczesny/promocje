<?php
class Application_Model_ProductAgregat{
	protected $entity = null;
        protected $em = null;
        protected $doctrineContainer = null;
        
        function __construct(){
            $this->entity = new ZC\Entity\ProductAgregat();
            $this->doctrineContainer = Zend_Registry::get('doctrine');
            $this->em = $this->doctrineContainer->getEntityManager();
        } 
        
        function getAll(){
            $agregats = $this->em->createQuery('SELECT a FROM ZC\Entity\ProductAgregat a')
                         ->getResult();
            return $agregats;
        }
        function addProductAgregat($agregat){
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
                function saveProductAgregat($productAgregatData, $productAgregatObject, $categories){
            if(!empty($productAgregatData['name'])){
                $mapper = new Ext_DataMapper();
                $mapper->mapArrayToObject($productAgregatData, $productAgregatObject, array(
                    'category' => $categories,
                ));
                $this->em->flush();
            }
            
        }
        function getProductAgregatById($id){
            if(!empty($id)){
                $productAgregat = $this->em->find('ZC\Entity\ProductAgregat', $id);
                return $productAgregat;
            } else {
                return null;
            }
        }
}
?>