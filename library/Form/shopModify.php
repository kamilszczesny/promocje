<?php

class Form_ShopModify extends Zend_Form {

    public function __construct($options = null, $data, $categories, $citiesArg) {
        parent::__construct($options);
        $this->setName('modify_shop');
        $this->setEnctype('UTF-8');
        $this->setMethod('post');
        if (!empty($data)) {

            //NAME
            $name = new Zend_Form_Element_Text('name');
            $name->setLabel('Nazwa sklepu')
                    ->setRequired(true)
                    ->setValue($data->name)
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
            $category->setValue($data->category->id);

            $description = new Zend_Form_Element_Textarea('description');
            $description->setLabel('opis produktu')->setValue($data->description);

            $imageUrl = new Zend_Form_Element_Text('imageUrl');
            $imageUrl->setLabel('url obrazka')
                    ->setValue($data->imageUrl);

            //cities
            $cities = new Zend_Form_Element_MultiCheckbox('cities');
            foreach ($citiesArg as $key => $item) {
                $cities->addMultiOption($item->id, $item->name);
            }
            $cityValues = array();
            foreach($data->cities as $key=>$city){
                $cityValues[] = $city->id;
            }
            $cities->setValue($cityValues);

            $submit = new Zend_Form_Element_Submit('submit');
            $submit->setLabel('modyfikuj sklep');
            $this->addElements(array($name, $category, $description, $imageUrl, $cities, $submit));
        }
    }

}
