<?php
namespace ZC\Entity;
/**
 * Description of Shop
 * @Entity
 */
class Shop {
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
         * @Column(type="text")
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
         * @var type 
         * @OneToMany(targetEntity="Offer",mappedBy="shop", cascade={"persist","remove"})
         */
        private $offers;
        
        /**
         * @ManyToMany(targetEntity="City", inversedBy="shops")
         * @JoinTable(name="shops_cities",
         *   joinColumns={@JoinColumn(name="shop_id", referencedColumnName="id")},
         *   inverseJoinColumns={@JoinColumn(name="city_id", referencedColumnName="id")}
         * )
         */
        private $cities;
        
        /**
         *
         * @ManyToOne(targetEntity="ShopCategory", inversedBy="shops")
         */
        private $category;
        
        private $sortedOffers;
        private $pastOffers;
        private $currentOffers;
        private $futureOffers;
        
        public function getOffers(){
            return $this->offers;
        }
        
        public function getPastOffers(){
            if(!$this->sortedOffers){
                $this->sortOffers();
            }
            return $this->pastOffers;
        }
        
        public function getCurrentOffers(){
            if(!$this->sortedOffers){
                $this->sortOffers();
            }
            return $this->currentOffers;
        }
        
        public function getFutureOffers(){
            if(!$this->sortedOffers){
                $this->sortOffers();
            }
            return $this->futureOffers;
        }
        
        private function sortOffers(){
            $offers = $this->offers;
            if(!empty($offers)){
                foreach($offers as $key=>$p){
                    if($p->isCurrent()){
                        $this->currentOffers[] = $this->offers[$key];
                    } else if($p->isPast()){
                        $this->pastOffers[] = $this->offers[$key];
                    } else if($p->isFuture()){
                        $this->futureOffers[] = $this->offers[$key];
                    }
                }
                $this->sortedOffers = true;
            }
        }       
	
	public function __get($property){
		return $this->$property;
	}
	
	public function __set($property, $value){
		$this->$property = $value;
	}
}

