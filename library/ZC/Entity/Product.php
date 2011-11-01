<?php
namespace ZC\Entity;
/**
 * 
 * Enter description here ...
 * @Table(name="products")
 * @Entity
 * @author Kamil
 *
 */
class Product
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
	 * @Column(type="float", nullable="false")
	 * @var string
	 */
	private $sizeNetto;
         
         /**
	 * 
	 * @Column(type="float", nullable="true")
	 * @var string
	 */
	private $sizeBrutto;
        
        /**
	 * 
	 * @Column(type="text", nullable="true")
	 * @var string
	 */
	private $description;
        
        /**
         *
         * @Column(type="string", length=200)
         */
        private $imageUrl;
        
        /**
         *
         * @var ProductAgregat
         * @ManyToOne(targetEntity="ProductAgregat")
         * @JoinColumns({
         *  @JoinColumn(name="productagregat_id", referencedColumnName="id")
         * })
         */
        private $productagregat;
        
        /**
         *
         * @var type 
         * @OneToMany(targetEntity="Promotion",mappedBy="promotion", cascade={"persist","remove"})
         */
        private $promotions;
        
        
	/**
	 * 
	 * @Column(type="string", nullable="false", length=12)
	 * @var string
	 */
	private $sizeUnit;
        
        
        
	
	public function __get($property){
		return $this->$property;
	}
	
	public function __set($property, $value){
		$this->$property = $value;
	}
}