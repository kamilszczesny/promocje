<?php
class Application_Model_ShopCategory{
        protected $em = null;
        protected $doctrineContainer = null;
        
        function __construct(){
            $this->doctrineContainer = Zend_Registry::get('doctrine');
            $this->em = $this->doctrineContainer->getEntityManager();
        } 

        function getAll(){
            $categories = $this->em->createQuery('SELECT s FROM ZC\Entity\ShopCategory s')
                              ->getResult();
            return $categories;
        }
        function getById($id){
            $category = $this->em->find("ZC\Entity\ShopCategory", (int)$id);
            return $category;
        }
        function addCategory($category){
            if(!empty($category['name'])){
                $s = new ZC\Entity\ShopCategory();
                $s->name = $category['name'];
                $this->em->persist($s);
                $this->em->flush();
            }
            
        }
        
        function saveShopCategory($categoryData, $categoryObject){
            if(!empty($categoryData['name'])){
                $categoryObject->name = $categoryData['name'];
                $this->em->flush();
            }
        }
}
?>