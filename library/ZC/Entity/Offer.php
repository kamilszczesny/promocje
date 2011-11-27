<?php
namespace ZC\Entity;
/**
 * Description of Offer
 * @Table(name="offers")
 * @Entity
 * @author Kamil
 */
class Offer {
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
         * @var type 
         * @OneToMany(targetEntity="Promotion",mappedBy="offer", cascade={"persist","remove"})
         */
        private $promotions;
        
         /**
         * @ManyToMany(targetEntity="City", inversedBy="offers")
         * @JoinTable(name="offers_cities",
         *   joinColumns={@JoinColumn(name="offer_id", referencedColumnName="id")},
         *   inverseJoinColumns={@JoinColumn(name="city_id", referencedColumnName="id")}
         * )
         */
        private $cities;
        
        /**
         *
         * @var Product
         * @ManyToOne(targetEntity="Shop")
         * @JoinColumns({
         *  @JoinColumn(name="shop_id", referencedColumnName="id")
         * })
         */
        private $shop;
        
        /**
         *
         * @Column(type="string", length=400)
         */
        private $name;
        
        /**
         *
         * @Column(type="date")
         */
        private $dateFrom;
        
        /**
         *
         * @Column(type="date")
         */
        private $dateTo;
        
        public function isCurrent(){
               date_default_timezone_set('Europe/Warsaw');
               $today = new \DateTime('today');
               //echo('sprawdzam czy aktualna - dziś: '.$today->format('d-m-Y').' daty promocji: '.$this->dateFrom->format('d-m-Y').' - '.$this->dateTo->format('d-m-Y'));
               if($today >= $this->dateFrom && $today <= $this->dateTo){
                   return true;
               } else {
                   return false;
               }
        }
        
        public function isPast(){
            date_default_timezone_set('Europe/Warsaw');
            $today = new \DateTime('today');
            if($today > $this->dateTo){
                return true;
            } else {
                return false;
            }
        }
        
        public function isFuture(){
            date_default_timezone_set('Europe/Warsaw');
            $today = new \DateTime('today');
            if( $today < $this->dateFrom){
                return true;
            } else {
                return false;
            }
        }
        
        public function getDateFrom(){
            $dateString = $this->dateFrom->format('d-m-Y');
            return $dateString;
        }
        
        public function getDateTo(){
            $dateString = $this->dateTo->format('d-m-Y');
            return $dateString;
        }
	
	public function __get($property){
		return $this->$property;
	}
	
	public function __set($property, $value){
		$this->$property = $value;
	}
}

