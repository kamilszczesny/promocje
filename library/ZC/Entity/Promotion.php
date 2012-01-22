<?php
namespace ZC\Entity;
/**
 * Description of Promotion
 * @Table(name="promotions")
 * @Entity
 * @author Kamil
 */
class Promotion {
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
         * @var Product
         * @ManyToOne(targetEntity="Product")
         * @JoinColumns({
         *  @JoinColumn(name="product_id", referencedColumnName="id")
         * })
         */
        private $product;
        
        
        /**
         *
         * @var Offer
         * @ManyToOne(targetEntity="Offer")
         * @JoinColumns({
         *  @JoinColumn(name="offer_id", referencedColumnName="id")
         * })
         */
        private $offer;
        
        /**
         *
         * @Column(type="float")
         */
        private $price;
        
        /**
         *
         * @Column(type="float")
         */
        private $returnPrice;
        
        
         /**
	 * 
	 * @Column(name="weight", type="integer")
	 */
	private $weight;
        
        
        /**
         *
         * @Column(type="string", length=250)
         */
        private $promotionComment;
        
        public function isCurrent(){
            return $this->offer->isCurrent();
        }
        
        public function isPast(){
            return $this->offer->isPast();
        }
        
        public function isFuture(){
            return $this->offer->isFuture();
        }
        
        public function getDateFrom(){
            return $this->offer->getDateFrom();
        }
        
        public function getDateTo(){
            return $this->offer->getDateTo();
        }
	public function getPriceString(){
            $currency = '';
            $p = (float)$this->price.$currency;
            if($this->returnPrice > 0){
                $p .= ' (zwracane później '.$this->returnPrice.$currency.')';
            }
            return $p;
            
        }
        public function getRealPrice(){
            return $this->price - $this->returnPrice;
        }
	public function __get($property){
		return $this->$property;
	}
	
	public function __set($property, $value){
		$this->$property = $value;
	}
}

