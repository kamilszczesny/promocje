<?php
class Form_CityAdd extends Zend_Form 
{ 
    public function __construct($options = null) 
    { 
        parent::__construct($options);
        $this->setName('add_city');
        
        $this->setMethod('post');
        
        $name = new Zend_Form_Element_Text('name');
        $name->setLabel('Nowe miasto')->setRequired(true)->setErrorMessages(
        	array(
        		Zend_Validate_NotEmpty::IS_EMPTY=>'Nazwa miasta jest wymagana',
        	)
        );
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('zapisz nowe miasto');
        
        $this->addElements(array($name, $submit));
        
    } 
}
