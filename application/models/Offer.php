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
                $o->dateFrom = $offer['dateFrom'];
                $o->dateTo = $offer['dateTo'];
                $o->cities = $c;
                
                if(!empty($offer['shop']) && !empty($shops)){
                    foreach($shops as $key=>$item){
                        if($item->id == $offer['shop']){
                            $p->shop = $shops[$key];                         
                        }
                    }
                }
                
                $this->em->persist($p);
                $this->em->flush();
            }
            
        }
}
?>