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
        
        function getPromotionsByProductIdAndCityId($productId, $cityId){
            $start = microtime(true);
            $query = $this->em->createQueryBuilder() 
                    ->select('p,o')
                    ->from('ZC\Entity\Promotion', 'p')
                    //->where('o.dateTo >= CURRENT_DATE()')
                    ->join('p.product', 'r', 'WITH', 'r.id = :productId')
                    ->join('p.offer', 'o', 'WITH',  'o.dateTo >= CURRENT_DATE()') //WITH c.id = :cityId
                    ->join('o.cities', 'c', 'WITH', 'c.id = :cityId')
                    ->getQuery();
            //echo($query->getSQL());
            $promotions = $query->setParameter('productId',$productId)->setParameter('cityId',$cityId)->getResult();
//            echo('<pre>');
//            print_r($promotions);
//            echo('</pre>');
            $result = array('current'=>array(),
                            'future'=>array());
            foreach($promotions as $key=>$promotion){
                
                if($promotion->isCurrent()) $result['current'][] = $promotion;
                else if($promotion->isFuture()) $result['future'][] = $promotion;
            }
            $stop = microtime(true);
            return $result;
        }
        
        function getPopularPromotionsByCityId($cityId){
            $start = microtime(true);
            $query = $this->em->createQueryBuilder() 
                    ->select('p,o,r')
                    ->from('ZC\Entity\Promotion', 'p')
                    ->join('p.offer', 'o', 'WITH',  'o.dateTo >= CURRENT_DATE() AND o.dateFrom <= CURRENT_DATE()')
                    ->join('p.product', 'r')
                    ->orderBy('p.weight', 'DESC')
                    ->setMaxResults(6);
                    
            if($cityId>0){
                $query->join('o.cities', 'c', 'WITH', 'c.id = :cityId')
                      ->setParameter('cityId', $cityId);;
            }
            $query = $query->getQuery();
            //var_dump($query->getSQL());
            //var_dump($cityId);
            $promotions = $query->getResult();
            $stop = microtime(true);
            return $promotions;
        }
}
?>