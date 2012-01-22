<?php
class Form_ShopSearch extends Zend_Form 
{ 
    public function __construct($shopsArg, $options = null) 
    { 
        parent::__construct($options);
        $this->setName('shopSearch');
        $this->setEnctype('UTF-8');
        $this->setMethod('post');
        
        $this->setAttrib('class', 'nice');
        $shops = new Zend_Form_Element_Select('shops');
        $shops->addMultiOption('0', ' ');
        foreach($shopsArg as $key=>$item){
            $shops->addMultiOption($item->id, $item->name);
        }
        $this->addElements(array($shops));
        
    } 
}
