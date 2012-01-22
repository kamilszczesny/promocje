<?php
class Application_Model_Product{
	protected $entity = null;
        protected $em = null;
        protected $doctrineContainer = null;
        
        function __construct(){
            $this->entity = new ZC\Entity\Product();
            $this->doctrineContainer = Zend_Registry::get('doctrine');
            $this->em = $this->doctrineContainer->getEntityManager();
        } 
        
        function getAll(){
            $products = $this->em->createQuery('SELECT o FROM ZC\Entity\Product o ORDER BY o.name ASC')
                         ->getResult();
            return $products;
        }
        function addProduct($product, $productAgregats){          
            if(!empty($product['name']) && !empty($product['sizeNetto'])){
                $p = new ZC\Entity\Product();
                $p->name = $product['name'];
                $p->description = $product['description'];
                $p->sizeNetto = $product['sizeNetto'];
                $p->sizeBrutto = $product['sizeBrutto'];
                $p->sizeUnit = $product['sizeUnit'];
                $p->imageUrl = $product['imageUrl'];
                
                if(!empty($product['productAgregat']) && !empty($productAgregats)){
                    foreach($productAgregats as $key=>$item){
                        if($item->id == $product['productAgregat']){
                            $p->productagregat = $productAgregats[$key];                         
                        }
                    }
                }
                
                $this->em->persist($p);
                $this->em->flush();
            }
            
        }
        
        function saveProduct($productData, $productObject, $productAgregats){
            if(!empty($productData['name']) && is_object($productObject)){
                $mapper = new Ext_DataMapper();
                $mapper->mapArrayToObject($productData, $productObject, array(
                    'productagregat' => $productAgregats,
                ));
                $this->em->flush();
            }
        }
        
        function getProductById($id){
            if(!empty($id)){
                $product = $this->em->find('ZC\Entity\Product', $id);
                return $product;
            } else {
                return null;
            }
        }
        
        //TODO getProductByIdAndCity
        function getProductByIdAndCity($id, $cityId){

        }
}
?>