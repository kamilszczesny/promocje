<?php
class Application_Model_Product{
	protected $entity = null;
        protected $em = null;
        protected $doctrineContainer = null;
        
        function __construct(){
            $this->entity = new ZC\Entity\Offer();
            $this->doctrineContainer = Zend_Registry::get('doctrine');
            $this->em = $this->doctrineContainer->getEntityManager();
        } 
        
        function getAll(){
            $offers = $this->em->createQuery('SELECT o FROM ZC\Entity\Offer o')
                         ->getResult();
            return $offers;
        }
        function addOffer($offer, $productAgregats){          
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
}
?>