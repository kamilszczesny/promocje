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
        function addPromotion($promotion, $products, $offers){
            if(!empty($promotion['price'])){
                $a = new ZC\Entity\Promotion();
                $a->promotionComment = $promotion['promotionComment'];
                $a->price = $promotion['price'];
                $a->returnPrice = $promotion['returnPrice'];
                //offer
                if(!empty($offer['offer']) && !empty($offers)){
                    foreach($offers as $key=>$item){
                        if($item->id == $offer['offer']){
                            $a->offer = $offers[$key];                         
                        }
                    }
                }
                //product
                if(!empty($offer['product']) && !empty($products)){
                    foreach($products as $key=>$item){
                        if($item->id == $offer['product']){
                            $a->product = $products[$key];                         
                        }
                    }
                }
                $this->em->persist($a);
                $this->em->flush();
            }
            
        }
        function savePromotion($promotionData, $promotionObject, $products, $offers){
            if(!empty($promotionData['price'])){
                $mapper = new Ext_DataMapper();
                $mapper->mapArrayToObject($promotionData, $promotionObject, array(
                    'product' => $products,
                    'offer' => $offers,
                ));
                $this->em->flush();
            }
            
        }
        function getPromotionById($id){
            if(!empty($id)){
                $promotion = $this->em->find('ZC\Entity\Promotion', $id);
                return $promotion;
            } else {
                return null;
            }
        }
}
?>