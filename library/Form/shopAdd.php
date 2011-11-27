<?php

class Form_ShopAdd extends Zend_Form {

    public function __construct($options = null, $categories, $citiesArg) {
        parent::__construct($options);
        $this->setName('add_shop');
        $this->setEnctype('UTF-8');
        $this->setMethod('post');

        //NAME
        $name = new Zend_Form_Element_Text('name');
        $name->setLabel('Nazwa sklepu')
                ->setRequired(true)
                ->setErrorMessages(
                        array(
                            Zend_Validate_NotEmpty::IS_EMPTY => 'Nazwa sklepu jest wymagana',
                        )
        );

        //CATEGORY
        $category = new Zend_Form_Element_Select('category');
        foreach ($categories as $key => $cat) {
            $category->addMultiOption($cat->id, $cat->name);
        }
        $category->setValue();

        $description = new Zend_Form_Element_Textarea('description');
        $description->setLabel('opis produktu');

        $imageUrl = new Zend_Form_Element_Text('imageUrl');
        $imageUrl->setLabel('url obrazka');
        
        //cities
        $cities = new Zend_Form_Element_MultiCheckbox ('cities');
        foreach($citiesArg as $key=>$item){
            $cities->addMultiOption($item->id, $item->name);
        }

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('dodaj nowy sklep');
        $this->addElements(array($name, $category, $description, $imageUrl,$cities, $submit));
    }

}
