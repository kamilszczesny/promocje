<?php
namespace ZC\Entity;
/**
 * Description of User
 * @Table(name="users")
 * @Entity
 * @author Kamil
 */
class User {
    /**
	 * 
	 * @var integer $id
	 * @Column(name="id", type="integer", nullable="false")
	 * @Id
	 * @GeneratedValue(strategy="IDENTITY")
	 */
	private $id;
	
	/**
	 * 
	 * @Column(type="string", nullable="false", length=200)
	 * @var string
	 */
	private $username;
        
        /**
         *
         * @Column(type="string", nullable="false", length=400)
         */
        private $password;
        
        /**
         *
         * @Column(type="string", nullable="false", length=200)
         */
        private $salt;
        
        /**
         *
         * @Column(type="string", nullable="false", length=200)
         */
        private $role;
        
	
	public function __get($property){
		return $this->$property;
	}
	
	public function __set($property, $value){
		$this->$property = $value;
	}
}