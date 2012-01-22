<?php
class Form_ShopCategoryAdd extends Zend_Form 
{ 
    public function __construct($options = null) 
    { 
        parent::__construct($options);
        $this->setEnctype('UTF-8');
        $this->setName('add_shopCategory');
        
        $this->setMethod('post');
        
        $name = new Zend_Form_Element_Text('name');
        $name->setLabel('Nowa kategoria sklepów')->setRequired(true)->setErrorMessages(
        	array(
        		Zend_Validate_NotEmpty::IS_EMPTY=>'Nazwa kategorii jest wymagana',
        	)
        );
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Dodaj nową kategorię sklepów');
        
        $this->addElements(array($name, $submit));
        
    } 
}
