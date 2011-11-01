<?php
class Form_ProductAgregatAdd extends Zend_Form 
{ 
    public function __construct($options = null) 
    { 
        parent::__construct($options);
        $this->setName('add_productAgregat');
        
        $this->setMethod('post');
        
        $name = new Zend_Form_Element_Text('name');
        $name->setLabel('Nowy agregat produktu')->setRequired(true)->setErrorMessages(
        	array(
        		Zend_Validate_NotEmpty::IS_EMPTY=>'Nazwa sklepu jest wymagana',
        	)
        );
        $description = new Zend_Form_Element_Textarea('description');
        $description->setLabel('opis produktu')->setRequired(true)->setErrorMessages(
        	array(
        		Zend_Validate_NotEmpty::IS_EMPTY=>'opis jest wymagany',
        	)
        );
        $ingredients = new Zend_Form_Element_Textarea('ingredients');
        $ingredients->setLabel('skład');
        $imageUrl = new Zend_Form_Element_Text('imageUrl');
        $imageUrl->setLabel('ściezka do obrazka');
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('zapisz nowy agregat produktu');
        
        $this->addElements(array($name,$description, $ingredients, $imageUrl, $submit));
        
    } 
}
