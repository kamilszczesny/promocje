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
	 * @Column(type="integer", nullable="false")
	 * @var integer
	 */
	private $level;
	
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
         * @ManyToMany(targetEntity="ProductAgregat", mappedBy="categories")
         */
        private $productagregats;
        
	public function getParent(){
            if(!empty($this->parent)) return $this->parent;
            else return null;
        }
        
        public function getChildren(){
            if(!empty($this->children)) return $this->children->toArray();
            else return null;
        }
        
        public function getSiblings(){
            $siblings = null;
            if(!empty($this->parent)){
                $siblings = $this->parent->getChildren();
            }
            return $siblings;
        }
        
        public function getCategoryTree(){
            $ret = array();
            $ret[] = $this;
            $parent = $this->getParent();
            while(!empty($parent)){
                $ret[] = $parent;
                $parent = $parent->getParent();
            }
            $ret = array_reverse($ret);
            return $ret;
        }
        
	public function __get($property){
		return $this->$property;
	}
	
	public function __set($property, $value){
		$this->$property = $value;
	}
}