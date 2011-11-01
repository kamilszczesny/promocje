<?php
namespace ZC\Entity;
/**
 * Description of City
 * @Table(name="cities")
 * @Entity
 * @author Kamil
 */
class City {
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
	private $name;
        
        /**
         *
         * @ManyToMany(targetEntity="Shop", mappedBy="cities")
         */
        private $shops;
        
        /**
         *
         * @ManyToMany(targetEntity="Offer", mappedBy="cities")
         */
        private $offers;
        
	
	public function __get($property){
		return $this->$property;
	}
	
	public function __set($property, $value){
		$this->$property = $value;
	}
}