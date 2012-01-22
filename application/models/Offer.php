<?php
class Application_Model_Offer{
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
                         ->getResult('SELECT o FROM ZC\Entity\Offer o');
            return $offers;
        }
        
        function getCurrentAndFuture(){
            $queryBuilder = $this->em->createQueryBuilder();
            $queryBuilder->add('select', 'o')
                    ->add('from', 'ZC\Entity\Offer o')
                    ->add('where', 'o.dateTo >= :date')
                    ->add('orderBy', 'u.dateFrom ASC')
                    ->setParameter('date', date("Y-m-d"));

            $query = $queryBuilder->getQuery();
            try {
                $user = $query->getSingleResult();
                $un = $user->username;
                return $user;
            } catch (Exception $e) {
                return null;
            }
        }
        
        function getNewestOffers($cityId){
            $query = $this->em->createQueryBuilder() 
                    ->select('o,c')
                    ->from('ZC\Entity\Offer', 'o')
                    ->where('o.dateTo >= CURRENT_DATE()')
                    ->andWhere('o.dateFrom <= CURRENT_DATE()')
                    ->join('o.cities', 'c', 'WITH', 'c.id = :cityId')
                    ->addOrderBy('o.dateFrom','DESC')
                    ->setMaxResults(4)
                    ->setParameter('cityId', $cityId)
                    ->getQuery();
            //echo($query->getSQL());
            
            try {
                $offers = $query->getResult();

                return $offers;
            } catch (Exception $e) {
                return null;
            }
        }
        
        function getOffersByShopIdAndCityId($shopId, $cityId){
            $query = $this->em->createQueryBuilder() 
                    ->select('o,c,s')
                    ->from('ZC\Entity\Offer', 'o')
                    ->where('o.dateTo >= CURRENT_DATE()')
                    ->join('o.shop', 's', 'WITH', 's.id = :shopId')
                    ->join('o.cities', 'c', 'WITH', 'c.id = :cityId')
                    ->getQuery();
            
            $offers = $query->setParameter('shopId',$shopId)->setParameter('cityId',$cityId)->getResult();
            $result = array('current'=>array(),
                            'future'=>array());
            foreach($offers as $key=>$offer){
                if($offer->isCurrent()) $result['current'][] = $offer;
                else if($offer->isFuture()) $result['future'][] = $offer;
            }
            return $result;
        }
        
        function addOffer($offer, $shops, $cities){         
            if(!empty($offer['name']) && !empty($offer['dateFrom']) && !empty($offer['dateTo'])){
                $o = new ZC\Entity\offer();
                $o->name = $offer['name'];
                $o->dateFrom = date_create($offer['dateFrom']);
                $o->dateTo = date_create($offer['dateTo']);
                
                if(!empty($offer['cities']) && !empty($cities)){
                    $c=array();
                    foreach($cities as $key=>$item1){
                        foreach($offer['cities'] as $key2=>$item2){
                            if($item1->id == $item2){
                                $c[] = $item1;                         
                            }
                        }
                    }
                } else {
                    $c = null;
                }
                $o->cities = $c;
                
                if(!empty($offer['shop']) && !empty($shops)){
                    foreach($shops as $key=>$item){
                        if($item->id == $offer['shop']){
                            $o->shop = $shops[$key];                         
                        }
                    }
                }
                
                $this->em->persist($o);
                $this->em->flush();
            }
            
        }
        
        function saveOffer($offerData, $offerObject, $shops, $cities){         
            if(!empty($offerData['name']) && !empty($offerData['dateFrom']) && !empty($offerData['dateTo'])){
                $mapper = new Ext_DataMapper();
                $mapper->mapArrayToObject($offerData, $offerObject, array(
                    'shop' => $shops,
                    'cities' => $cities,
                ));
                $this->em->flush();
            }
            
        }
        function getOfferById($id){
            $offer = $this->em->find("ZC\Entity\Offer", (int)$id);
            return $offer;
        }
}
?>