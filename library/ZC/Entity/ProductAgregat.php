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
        /**
         * @ManyToMany(targetEntity="Category", inversedBy="productagregats")
         * @JoinTable(name="productAgragats_categories",
         *   joinColumns={@JoinColumn(name="productAgregat_id", referencedColumnName="id")},
         *   inverseJoinColumns={@JoinColumn(name="category_id", referencedColumnName="id")}
         * )
         */
        private $categories;
        
        /**
         *
         * @var type 
         * @OneToMany(targetEntity="Product",mappedBy="productagregat", cascade={"persist","remove"})
         */
        private $products;
	
        public function getIngredients(){
            return $this->ingredients;
        }
        
        public function getMainCategory() {
            $mainCategory = null;
            $categories = $this->getCategories();
            if (!empty($categories)) {
                    foreach ($this->categories as $key => $item) {
                        if (empty($mainCategory) || $mainCategory->level < $item->level) {
                            $mainCategory = $item;
                        }
                    }
            }
            return $mainCategory;
        }
        
        private function compareCategories($a, $b){
            if ($a->level == $b->level) return 0;
            return ($a->level < $b->level) ? -1 : 1;
        }
        
        private function sortCategories($c){
            $a = $c->toArray();
            usort($a, array($this,'compareCategories'));
            return $a;
        }
        
        public function getCategories(){
                if (!empty($this->categories)) {
                    return $this->sortCategories($this->categories);
                }
            return null;
        }
        
	public function __get($property){
		return $this->$property;
	}
	
	public function __set($property, $value){
		$this->$property = $value;
	}
}

