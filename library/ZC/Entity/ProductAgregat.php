<?php
namespace ZC\Entity;
/**
 * Description of ProductAgregats
 * @Table(name="productagregats")
 * @Entity
 * @author Kamil
 */
class ProductAgregat {
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
	 * @Column(type="text", nullable="true")
	 * @var string
	 */
	private $description;
        
        /**
	 * 
	 * @Column(type="text", nullable="true")
	 * @var string
	 */
	private $ingredients;
        
        /**
         *
         * @Column(type="string", length=200)
         */
        private $imageUrl;
        
        
        /**
         *
         * @var Category
         * @ManyToOne(targetEntity="Photo")
         * @JoinColumns({
         *  @JoinColumn(name="photo_id", referencedColumnName="id")
         * })
         */
        private $image;
        
        /**
         *
         * @var Category
         * @ManyToOne(targetEntity="Category")
         * @JoinColumns({
         *  @JoinColumn(name="category_id", referencedColumnName="id")
         * })
         */
        private $category;
        
        /**
         *
         * @var type 
         * @OneToMany(targetEntity="Product",mappedBy="productagregat", cascade={"persist","remove"})
         */
        private $products;
	
	public function __get($property){
		return $this->$property;
	}
	
	public function __set($property, $value){
		$this->$property = $value;
	}
}

