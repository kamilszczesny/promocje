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
         * @Column(type="decimal")
         */
        private $price;
        
        /**
         *
         * @Column(type="decimal")
         */
        private $returnPrice;
        
        
        /**
         *
         * @Column(type="string", length=250)
         */
        private $promotionComment;
	
	public function __get($property){
		return $this->$property;
	}
	
	public function __set($property, $value){
		$this->$property = $value;
	}
}

