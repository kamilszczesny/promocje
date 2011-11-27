<?php

class Form_ProductModify extends Zend_Form {

    public function __construct($productAgregats, $options = null) {
        parent::__construct($options);
        $this->setName('modify_product');
        $this->setEnctype('UTF-8');
        $this->setMethod('post');

        if (!empty($options['data'])) {

            $name = new Zend_Form_Element_Text('name');
            $name->setLabel('Nowy produkt')->setRequired(true)->setErrorMessages(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => 'Nazwa produktu jest wymagana',
                    )
            )
            ->setValue($options['data']->name);

            $description = new Zend_Form_Element_Textarea('description');
            $description->setLabel('opis produktu')->setValue($options['data']->description);

            $sizeNetto = new Zend_Form_Element_Text('sizeNetto');
            $sizeNetto->setLabel('pojemność netto (samego produktu)')->setRequired(true)
                    ->addValidator('float')
                    ->setValue($options['data']->sizeNetto)
                    ->setErrorMessages(
                            array(
                                Zend_Validate_Digits::STRING_EMPTY => 'Pojemność polem wymaganym',
                            )
            );

            $sizeBrutto = new Zend_Form_Element_Text('sizeBrutto');
            $sizeBrutto->setLabel('pojemność brutto ')
                    ->addValidator('float')
                    ->setValue($options['data']->sizeBrutto);

            $sizeUnit = new Zend_Form_Element_Text('sizeUnit');
            $sizeUnit->setLabel('jednostka')->setRequired(true)
                    ->setErrorMessages(
                            array(
                                Zend_Validate_Digits::STRING_EMPTY => 'jednostka jest wymagana',
                            )
            )->setValue($options['data']->sizeUnit);

            $imageUrl = new Zend_Form_Element_Text('imageUrl');
            $imageUrl->setLabel('url obrazka')
                     ->setValue($options['data']->imageUrl);

            //Product agregat
            $productAgregat = new Zend_Form_Element_Select('productAgregat');
            $productAgregat->addMultiOption(0, 'Brak')->setLabel('Agregat produktu');
            foreach ($productAgregats as $key => $item) {
                $productAgregat->addMultiOption($item->id, $item->name);
            }
            if(!empty($options['data']->productagregat->id)){
            $productAgregat->setValue($options['data']->productagregat->id);
            }

            $submit = new Zend_Form_Element_Submit('submit');
            $submit->setLabel('zapisz produkt');

            $this->addElements(array($name, $description, $sizeNetto, $sizeBrutto, $sizeUnit, $imageUrl, $productAgregat, $submit));
        }
    }

}
