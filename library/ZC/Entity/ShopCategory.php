<?php
namespace ZC\Entity;
/**
 * Description of ShopCategory
 * @Entity
 */
class ShopCategory {
    /**
	 * 
	 * @var integer $id
	 * @Column(name="id", type="integer", nullable="false")
	 * @Id
	 * @GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

        /**
         * @Column(type="string", length=100, unique=false, nullable=false)
         */
        private $name;
        
        /**
         *
         * @var type 
         * @OneToMany(targetEntity="Shop",mappedBy="category")
         */
        private $shops;
        
	
	public function __get($property){
		return $this->$property;
	}
	
	public function __set($property, $value){
		$this->$property = $value;
	}
}

