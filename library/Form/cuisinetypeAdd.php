<?php
class Form_CuisinetypeAdd extends Zend_Form 
{ 
    public function __construct($options = null) 
    {
       
        parent::__construct($options);
        $this->setName('add_cuisinetype');
        
        $this->setMethod('post');
        
        $cuisinetype = new Zend_Form_Element_Text('cuisinetype');
        $cuisinetype->setLabel('Typ kuchni')->setRequired(true)->setErrorMessages(
        	array(
        		Zend_Validate_NotEmpty::IS_EMPTY=>'Typ nie może być pusty',
        	)
        );              
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('zapisz');
        
        $this->addElements(array($cuisinetype, $submit));
        
    } 
}
