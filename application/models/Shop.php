<?php
class Application_Model_Shop{
        protected $em = null;
        protected $doctrineContainer = null;
        
        function __construct(){
            $this->doctrineContainer = Zend_Registry::get('doctrine');
            $this->em = $this->doctrineContainer->getEntityManager();
        } 

        function getAll(){
            $shops = $this->em->createQuery('SELECT s FROM ZC\Entity\Shop s')
                              ->getResult();
            return $shops;
        }
        function getById($id){
            $shop = $this->em->find("ZC\Entity\Shop", (int)$id);
            return $shop;
        }
        function addShop($shop){
            if(!empty($shop['name'])){
                $s = new ZC\Entity\Shop();
                $s->name = $shop['name'];
                $this->em->persist($s);
                $this->em->flush();
            }
            
        }
        
        function saveShop($shopData, $shopObject){
            if(!empty($shopData['name'])){
                $shopObject->name = $shopData['name'];
                $this->em->flush();
            }
        }
}
?>