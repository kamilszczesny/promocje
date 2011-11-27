<?php
namespace ZC\Entity;
/**
 * 
 * Enter description here ...
 * @Table(name="Photos")
 * @Entity
 * @author Kamil
 *
 */
class Photo
{
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
	 * @Column(type="string", nullable="false", length=100)
	 * @var string
	 */
	private $name;
        
        /**
         *
         * @Column(type="string", length=200)
         */
        private $imageUrl;
        
        /**
         *
         * @var type 
         * @OneToMany(targetEntity="Promotion",mappedBy="image", cascade={"persist","remove"})
         */
        private $shops;
        
        /**
         *
         * @var type 
         * @OneToMany(targetEntity="ProductAgregat",mappedBy="image", cascade={"persist","remove"})
         */
        private $productAgregats;
        
        /**
         *
         * @var type 
         * @OneToMany(targetEntity="Product",mappedBy="image", cascade={"persist","remove"})
         */
        private $products;

        
	public function __get($property){
		return $this->$property;
	}
	
	public function __set($property, $value){
		$this->$property = $value;
	}
}