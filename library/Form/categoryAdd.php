<?php
class Form_CategoryAdd extends Zend_Form 
{ 
    public function __construct($categories, $options = null) 
    { 
        parent::__construct($options);
        $this->setEnctype('UTF-8');
        $this->setName('add_category');
        
        $this->setMethod('post');
        
        $name = new Zend_Form_Element_Text('name');
        $name->setLabel('Nowa kategoria produktów')->setRequired(true)->setErrorMessages(
        	array(
        		Zend_Validate_NotEmpty::IS_EMPTY=>'Nazwa kategorii jest wymagana',
        	)
        );

        //Category
        $category = new Zend_Form_Element_Select('parent');
        $category->addMultiOption(0, '')->setLabel('Kategoria nadrzędna');
        foreach ($categories as $key => $item) {
            $category->addMultiOption($item->id, $item->name);
        }
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Dodaj nową kategorię produktu');
        
        $this->addElements(array($name, $category, $submit));
        
    } 
}
