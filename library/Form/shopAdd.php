<?php
class Form_ShopAdd extends Zend_Form 
{ 
    public function __construct($options = null) 
    { 
        parent::__construct($options);
        $this->setName('add_shop');
        
        $this->setMethod('post');
        
        $name = new Zend_Form_Element_Text('name');
        $name->setLabel('Nowy sklep')->setRequired(true)->setErrorMessages(
        	array(
        		Zend_Validate_NotEmpty::IS_EMPTY=>'Nazwa sklepu jest wymagana',
        	)
        );
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('zapisz nowy sklep');
        
        $this->addElements(array($name, $submit));
        
    } 
}
