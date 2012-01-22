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
	 * @Column(type="string", nullable="false", length=200)
	 * @var string
	 */
	private $ip;
        
        /**
         *
         * @var type 
         * @OneToMany(targetEntity="Shop",mappedBy="category")
         */
        private $shops;
        
        /**
         *
         * @var type 
         * @OneToMany(targetEntity="ShopCategory",mappedBy="parent", cascade={"persist","remove"})
         */
        private $children;
        
        /**
         *
         * @var Category
         * @ManyToOne(targetEntity="ShopCategory")
         * @JoinColumns({
         *  @JoinColumn(name="category_id", referencedColumnName="id")
         * })
         */
        private $parent;
        
	
	public function __get($property){
		return $this->$property;
	}
	
	public function __set($property, $value){
		$this->$property = $value;
	}
}

