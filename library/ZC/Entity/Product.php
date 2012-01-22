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
         * @var Category
         * @ManyToOne(targetEntity="Photo")
         * @JoinColumns({
         *  @JoinColumn(name="photo_id", referencedColumnName="id")
         * })
         */
        private $image;
        
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
         * @OneToMany(targetEntity="Promotion",mappedBy="product", cascade={"persist","remove"})
         */
        private $promotions;
        
        
	/**
	 * 
	 * @Column(type="string", nullable="false", length=12)
	 * @var string
	 */
	private $sizeUnit;
        
        private $pastPromotions = array();
        private $currentPromotions = array();
        private $futurePromotions = array();
        private $sortedPromotions = false;
        private $smallestCurrentPrice = null;
        
        
        public function getSizeString(){
            if( !empty($this->sizeBrutto) && !empty($this->sizeNetto)){
                return $this->sizeBrutto.' '.$this->sizeUnit.' ('.$this->sizeNetto.' '.$this->sizeUnit.'netto )';
            } else if(!empty($this->sizeNetto)){
                return $this->sizeNetto.' '.$this->sizeUnit;
            }
            return '';
        }
        
        public function getPastPromotions(){
            if(!$this->sortedPromotions){
                $this->sortPromotions();
            }
            return $this->pastPromotions;
        }
        
        public function getCurrentPromotions(){
            if(!$this->sortedPromotions){
                $this->sortPromotions();
            }
            return $this->currentPromotions;
        }
        
        public function getFuturePromotions(){
            if(!$this->sortedPromotions){
                $this->sortPromotions();
            }
            return $this->futurePromotions;
        }
        
        public function setPromotions($p){
            $this->promotions = $p;
        }
        
        private function sortPromotions(){
            $promotions = $this->getPromotions();
            if(!empty($promotions)){
                foreach($promotions as $key=>$p){
//                    echo '<pre>';
//                    print_r($p);
//                    echo '</pre>';
//                    echo(gettype($p).' ');
//                    echo(get_class($p).' ');
                    if($p->isCurrent()){
                        $this->currentPromotions[] = $this->promotions[$key];
                        if(empty($this->smallestCurrentPrice) || $p->getRealPrice()<$this->smallestCurrentPrice) $this->smallestCurrentPrice = $p->getRealPrice();
                    } else if($p->isPast()){
                        $this->pastPromotions[] = $this->promotions[$key];
                    } else if($p->isFuture()){
                        $this->futurePromotions[] = $this->promotions[$key];
                    }
                }
                $this->sortedPromotions = true;
            }
        }       
        
        public function getSmallestCurrentPrice(){
            if(!$this->sortedPromotions){
                $this->sortPromotions();
            }
            return $this->smallestCurrentPrice;
        }
	
        public function getPromotions(){
            return $this->promotions;
        }
        
        public function getMainCategory() {
            $mainCategory = null;
            if (!empty($this->productagregat)) {
                $categories = $this->productagregat->getCategories();
                if (!empty($categories)) {
                    foreach ($this->productagregat->categories as $key => $item) {
                        if (empty($mainCategory) || $mainCategory->level < $item->level) {
                            $mainCategory = $item;
                        }
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
            if(!is_array($c))$a = $c->toArray();
            else $a = $c;
            usort($a, array($this,'compareCategories'));
            return $a;
        }
        
        public function getCategories(){
            if (!empty($this->productagregat)) {
                $categories = $this->productagregat->getCategories();
                if (!empty($categories)) {
                    return $this->sortCategories($categories);
                }
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