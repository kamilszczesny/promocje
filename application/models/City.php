<?php
class Application_Model_City{
	protected $entity = null;
        protected $em = null;
        protected $doctrineContainer = null;
        
        function __construct(){
            $this->entity = new ZC\Entity\City();
            $this->doctrineContainer = Zend_Registry::get('doctrine');
            $this->em = $this->doctrineContainer->getEntityManager();
        } 

        function getAll(){
            $city = $this->em->createQuery('SELECT c FROM ZC\Entity\City c ORDER BY c.name ASC')
                         ->getResult();
            return $city;
        }
        function getCitiesByShopId($id){            
            $query = $this->em->createQueryBuilder() 
                    ->select('c')
                    ->from('ZC\Entity\City', 'c')
                    ->join('c.shops', 's', 'WITH', 's.id = :shopId')
                    ->addOrderBy('c.name','ASC')
                    ->setParameter('shopId', $id)
                    ->getQuery();
            //echo($query->getSQL());
            
            try {
                $cities = $query->getResult();
                return $cities;
            } catch (Exception $e) {
                return null;
            }
        }
        function addCity($name){
            if(!empty($name)){
                $c = new ZC\Entity\City();
                $c->name = $name;
                $this->em->persist($c);
                $this->em->flush();
            }
            
        }
        
        public function getSessionCity(){
            $sess = new Zend_Session_Namespace('Custom');
            if(isset($sess->cityId)){
                return $sess->cityId;
            } else {
                return 1;
            }
        }
        
        public function setSessionCity($cityId){
            $sess = new Zend_Session_Namespace('Custom');
            $sess->cityId = $cityId;
        }
}
?>