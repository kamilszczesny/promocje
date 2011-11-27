<?php
class Application_Model_Category{
	protected $entity = null;
        protected $em = null;
        protected $doctrineContainer = null;
        
        function __construct(){
            $this->entity = new ZC\Entity\Product();
            $this->doctrineContainer = Zend_Registry::get('doctrine');
            $this->em = $this->doctrineContainer->getEntityManager();
        } 
        
        function getAll(){
            $categories = $this->em->createQuery('SELECT o FROM ZC\Entity\Category o')
                         ->getResult();
            return $categories;
        }
        
        /**
         * TODO
         * @param type $category
         * @param type $productAgregats 
         */
        function addCategory($category, $productAgregats){          
//            if(!empty($product['name']) && !empty($product['sizeNetto'])){
//                $p = new ZC\Entity\Product();
//                $p->name = $product['name'];
//                $p->description = $product['description'];
//                $p->sizeNetto = $product['sizeNetto'];
//                $p->sizeBrutto = $product['sizeBrutto'];
//                $p->sizeUnit = $product['sizeUnit'];
//                $p->imageUrl = $product['imageUrl'];
//                
//                if(!empty($product['productAgregat']) && !empty($productAgregats)){
//                    foreach($productAgregats as $key=>$item){
//                        if($item->id == $product['productAgregat']){
//                            $p->productagregat = $productAgregats[$key];                         
//                        }
//                    }
//                }
//                
//                $this->em->persist($p);
//                $this->em->flush();
//            }
            
        }
        
        function getCategoryById($id){
            if(!empty($id)){
                $category = $this->em->find('ZC\Entity\Category', $id);
                return $category;
            }
            return null;
        }
}
?>