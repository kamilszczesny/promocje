<?php
class Form_PromotionModify extends Zend_Form 
{ 
    public function __construct($promotion, $productsArg, $offersArg, $options = null) 
    { 
        parent::__construct($options);
        $this->setName('modify_promotion');
        $this->setEnctype('UTF-8');
        $this->setMethod('post');
        
        $promotionComment = new Zend_Form_Element_Text('promotionComment');
        $promotionComment->setLabel('komentarz do promocji produktu')->setValue($promotion->promotionComment);
        
        $price = new Zend_Form_Element_Text('price');
        $price->setLabel('cena')->setRequired(true)
                        ->addValidator('float')
        		->setErrorMessages(
        			array(
        				Zend_Validate_Digits::STRING_EMPTY => 'cena jest polem wymaganym',
        			)
        		)->setValue($promotion->price);
        
        $returnPrice = new Zend_Form_Element_Text('returnPrice');
        $returnPrice->setLabel('cena zwracana później')
                        ->addValidator('float')
                        ->setValue($promotion->returnPrice);        

        //offer
        $offer = new Zend_Form_Element_Select('offer');
        $offer->addMultiOption(0, 'Brak')->setLabel('Gazetka');
        foreach($offersArg as $key=>$item){
            $offer->addMultiOption($item->id, $item->name);
        }
        $offer->setValue($promotion->offer->id);
            
        //product
        $product = new Zend_Form_Element_Select('product');
        $product->addMultiOption(0, 'Brak')->setLabel('Produkt');
        foreach($productsArg as $key=>$item){
            $product->addMultiOption($item->id, $item->name);
        }
        $product->setValue($promotion->product->id);
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('modyfikuj promocję');
        
        $this->addElements(array($promotionComment, $price, $returnPrice, $offer, $product, $submit));
        
    } 
}
