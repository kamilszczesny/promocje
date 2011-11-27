<?php
class Form_ProductAdd extends Zend_Form 
{ 
    public function __construct($productAgregats, $options = null) 
    { 
        parent::__construct($options);
        $this->setName('add_shop');
        $this->setEnctype('UTF-8');
        $this->setMethod('post');
        
        $name = new Zend_Form_Element_Text('name');
        $name->setLabel('Nowy produkt')->setRequired(true)->setErrorMessages(
        	array(
        		Zend_Validate_NotEmpty::IS_EMPTY=>'Nazwa produktu jest wymagana',
        	)
        );
        
        $description = new Zend_Form_Element_Textarea('description');
        $description->setLabel('opis produktu');
        
        $sizeNetto = new Zend_Form_Element_Text('sizeNetto');
        $sizeNetto->setLabel('pojemność netto (samego produktu)')->setRequired(true)
                        ->addValidator('float')
        		->setErrorMessages(
        			array(
        				Zend_Validate_Digits::STRING_EMPTY => 'Pojemność polem wymaganym',
        			)
        		);
        
        $sizeBrutto = new Zend_Form_Element_Text('sizeBrutto');
        $sizeBrutto->setLabel('pojemność brutto ')
                        ->addValidator('float');
        
        $sizeUnit = new Zend_Form_Element_Text('sizeUnit');
        $sizeUnit->setLabel('jednostka')->setRequired(true)
        		->setErrorMessages(
        			array(
        				Zend_Validate_Digits::STRING_EMPTY => 'jednostka jest wymagana',
        			)
        		);
        
        $imageUrl = new Zend_Form_Element_Text('imageUrl');
        $imageUrl->setLabel('url obrazka');
        
        //Product agregat
        $productAgregat = new Zend_Form_Element_Select('productAgregat');
            $productAgregat->addMultiOption(0, 'Brak')->setLabel('Agregat produktu');
            foreach($productAgregats as $key=>$item){
                $productAgregat->addMultiOption($item->id, $item->name);
            }
            $productAgregat->setValue(0);
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('zapisz nowy produkt');
        
        $this->addElements(array($name, $description, $sizeNetto, $sizeBrutto, $sizeUnit, $imageUrl, $productAgregat, $submit));
        
    } 
}
