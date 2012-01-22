<?php

class Application_Model_User {

    protected $em = null;
    protected $doctrineContainer = null;

    function __construct() {
        $this->doctrineContainer = Zend_Registry::get('doctrine');
        $this->em = $this->doctrineContainer->getEntityManager();
    }

    function getUserByUsername($username) {
        $queryBuilder = $this->em->createQueryBuilder();
        $queryBuilder->add('select', 'u')
                ->add('from', 'ZC\Entity\User u')
                ->add('where', 'u.username = :name')
                ->add('orderBy', 'u.username ASC')
                ->setParameter('name', $username);

        $query = $queryBuilder->getQuery();
        try {
            $user = $query->getSingleResult();
            $un = $user->username;
            return $user;
        } catch (Exception $e) {
            return null;
        }
    }

}

?>