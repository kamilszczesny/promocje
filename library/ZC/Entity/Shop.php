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
        
        public function getOffers(){
            return $this->offers;
        }
	
	public function __get($property){
		return $this->$property;
	}
	
	public function __set($property, $value){
		$this->$property = $value;
	}
}

