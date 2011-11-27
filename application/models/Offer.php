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
                         ->getResult();
            return $offers;
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