<?php
class Application_Model_Shop{
        protected $em = null;
        protected $doctrineContainer = null;
        
        function __construct(){
            $this->doctrineContainer = Zend_Registry::get('doctrine');
            $this->em = $this->doctrineContainer->getEntityManager();
        } 

        function getAll(){
            $shops = $this->em->createQuery('SELECT s FROM ZC\Entity\Shop s ORDER BY s.name ASC')
                              ->getResult();
       
            return $shops;
        }
        function getShopById($id){
            $query = $this->em->createQueryBuilder() 
                    ->select('s,o')
                    ->from('ZC\Entity\Shop', 's')
                    ->where('s.id = :id')
                    ->leftJoin('s.offers', 'o', 'WITH', 'o.dateTo >= CURRENT_DATE()')
                    ->getQuery();
            //echo $query->getSQL();
            $shop = $query->setParameter('id',$id)->getResult();
            return $shop[0];
            
        }
        function addShop($shopData, $categories, $cities){
            if(!empty($shopData['name'])){
                $s = new ZC\Entity\Shop();
                
                if(!empty($shopData['category']) && !empty($categories)){
                    foreach($categories as $key=>$item){
                        if($item->id == $shopData['category']){
                            $shopData['category'] = $categories[$key];    
                            break;
                        }
                    }
                }
                
                if(!empty($shopData['cities']) && !empty($cities)){
                    $c=array();
                    foreach($cities as $key=>$item1){
                        foreach($shopData['cities'] as $key2=>$item2){
                            if($item1->id == $item2){
                                $c[] = $item1;                         
                            }
                        }
                    }
                } else {
                    $c = null;
                }
                $shopData['cities'] = $c;

                foreach($shopData as $key=>$value){
                    $s->$key = $value;
                }
                
                $this->em->persist($s);
                $this->em->flush();
            }
            
        }
        
        function saveShop($shopData, $shopObject, $categories, $cities){
            if(!empty($shopData['name']) && is_object($shopObject)){
                if(!empty($shopData['category']) && !empty($categories)){
                    foreach($categories as $key=>$item){
                        if($item->id == $shopData['category']){
                            $shopData['category'] = $categories[$key];    
                            break;
                        }
                    }
                }
                
                if(!empty($shopData['cities']) && !empty($cities)){
                    $c=array();
                    foreach($cities as $key=>$item1){
                        foreach($shopData['cities'] as $key2=>$item2){
                            echo($item2.' ');
                            if($item1->id == $item2){
                                $c[] = $item1;                         
                            }
                        }
                    }
                } else {
                    $c = null;
                }
                $shopData['cities'] = $c;
                
                foreach($shopData as $key=>$value){
                    $shopObject->$key = $value;
                }
                
                $this->em->flush();
            }
        }
}
?>