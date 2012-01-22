<?php
class Form_ProductSearch extends Zend_Form 
{ 
    public function __construct($productsArg,$options = null) 
    { 
        parent::__construct($options);
        $this->setName('productSearch');
        $this->setEnctype('UTF-8');
        $this->setMethod('post');
        
        $this->setAttrib('class', 'nice');
        $products = new Zend_Form_Element_Select('products');
        $products->addMultiOption('0', ' ');
        foreach($productsArg as $key=>$item){
            $products->addMultiOption($item->id, $item->name);
        }

        $this->addElements(array($products));
        
    } 
}
