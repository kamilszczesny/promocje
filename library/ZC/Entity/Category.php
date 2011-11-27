<?php
namespace ZC\Entity;
/**
 * Description of Category
 * @Table(name="categories")
 * @Entity
 * @author Kamil
 */
class Category {
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
	private $ip;
	
        /**
	 * 
	 * @Column(type="string", nullable="false", length=300)
	 * @var string
	 */
	private $name;
        
        
        /**
         *
         * @var type 
         * @OneToMany(targetEntity="Category",mappedBy="parent", cascade={"persist","remove"})
         */
        private $children;
        
        /**
         *
         * @var Category
         * @ManyToOne(targetEntity="Category")
         * @JoinColumns({
         *  @JoinColumn(name="category_id", referencedColumnName="id")
         * })
         */
        private $parent;
        
        
        /**
         *
         * @var type 
         * @OneToMany(targetEntity="ProductAgregat",mappedBy="category", cascade={"persist","remove"})
         */
        private $productagregats;
        
	
	public function __get($property){
		return $this->$property;
	}
	
	public function __set($property, $value){
		$this->$property = $value;
	}
}