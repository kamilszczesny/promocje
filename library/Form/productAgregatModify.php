<?php

class Form_ProductAgregatModify extends Zend_Form {

    public function __construct($productAgregat, $categories, $options = null) {
        parent::__construct($options);
        $this->setName('modify_productAgregat');

        $this->setMethod('post');
        $this->setEnctype('UTF-8');
        $name = new Zend_Form_Element_Text('name');
        $name->setLabel('Agregat produktu')->setRequired(true)->setErrorMessages(
                array(
                    Zend_Validate_NotEmpty::IS_EMPTY => 'Nazwa sklepu jest wymagana',
                )
        )->setValue($productAgregat->name);
        $description = new Zend_Form_Element_Textarea('description');
        $description->setLabel('opis produktu')->setRequired(true)->setErrorMessages(
                array(
                    Zend_Validate_NotEmpty::IS_EMPTY => 'opis jest wymagany',
                )
        )->setValue($productAgregat->description);
        $ingredients = new Zend_Form_Element_Textarea('ingredients');
        $ingredients->setLabel('skład')->setValue($productAgregat->ingredients);
        $imageUrl = new Zend_Form_Element_Text('imageUrl');
        $imageUrl->setLabel('ściezka do obrazka')->setValue($productAgregat->imageUrl);

        //Category
        $category = new Zend_Form_Element_Select('category');
        $category->addMultiOption(0, 'Brak')->setLabel('Kategoria produktu');
        foreach ($categories as $key => $item) {
            $category->addMultiOption($item->id, $item->name);
        }

        $category->setValue($productAgregat->category->id);


        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('zmodyfikuj agregat produktu');

        $this->addElements(array($name, $description, $ingredients, $imageUrl, $category, $submit));
    }

}
