<?php
class Application_Model_Photo{
	protected $entity = null;
        protected $em = null;
        protected $doctrineContainer = null;
        
        function __construct(){
            $this->entity = new ZC\Entity\Photo();
            $this->doctrineContainer = Zend_Registry::get('doctrine');
            $this->em = $this->doctrineContainer->getEntityManager();
        } 
        
        function getAll(){
            $photos = $this->em->createQuery('SELECT o FROM ZC\Entity\Photo o')
                         ->getResult();
            return $photos;
        }
        function addPhoto($photo){          
            if(!empty($photo['name']) && !empty($photo['imageUrl'])){
                $p = new ZC\Entity\Photo();
                $p->name = $photo['name'];
                $p->imageUrl = $photo['imageUrl'];
                
                $this->em->persist($p);
                $this->em->flush();
            }
            
        }
        
        function getPhotoById($id){
            if(!empty($id)){
                $photo = $this->em->find('ZC\Entity\Photo', $id);
            }
            return $photo;
        }
}
?>