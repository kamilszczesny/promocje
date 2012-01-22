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
        
        function getMainCategories(){
            $query = $this->em->createQueryBuilder() 
                    ->select('c')
                    ->from('ZC\Entity\Category', 'c')
                    ->where('c.parent IS NULL')
                    ->getQuery();
            //var_dump($query->getSql());
            try {
                $categories = $query->getResult();
                return $categories;
            } catch (Exception $e) {
                return null;
            }
        }
        
        /**
         * TODO
         * @param type $category
         * @param type $productAgregats 
         */
        function addCategory($category, $categories){   
            if(!empty($category['name'])){
                $p = new ZC\Entity\Category();
                $p->name = $category['name'];                
                if(!empty($category['parent']) && $category['parent']>0 && !empty($categories)){
                    foreach($categories as $key=>$item){
                        if($item->id == $category['parent']){
                            $p->parent = $categories[$key];       
                            $p->level = $item->level + 1;
                        }
                    }
                    
                } else{
                    $p->level = 0;
                }
                
                $this->em->persist($p);
                $this->em->flush();
            }
            
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