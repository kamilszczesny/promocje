<?php
class Form_OfferAdd extends Zend_Form 
{ 
    public function __construct($citiesArg, $options = null) 
    { 
        parent::__construct($options);
        $this->setName('add_offer');
        $this->setEnctype('UTF-8');
        $this->setMethod('post');
        
        $name = new Zend_Form_Element_Text('name');
        $name->setLabel('Nowa gazetka')->setRequired(true)->setErrorMessages(
        	array(
        		Zend_Validate_NotEmpty::IS_EMPTY=>'Nazwa sklepu jest wymagana',
        	)
        );
        
        $dateFrom = new Zend_Form_Element_Text(array('type'=>'date','name'=>'dateFrom'));
        $validatorDate = new Zend_Validate_Date();
        $validatorDate->setMessages(
            array(
                Zend_Validate_Date::FALSEFORMAT => 'Bledny format daty',
                Zend_Validate_Date::INVALID        => 'Nie jest to poprawna data',
                Zend_Validate_Date::INVALID_DATE    => 'Podana data nie pasuje do formatu'
            )
        )->setFormat('yyyy-MM-dd HH:mm');
        $dateFrom->setLabel('Początek promocji')
        	->setRequired(true)
        	->addValidator($validatorDate)
        	->setAttrib('id','wyborDatyStart');
        
        $dateTo = new Zend_Form_Element_Text(array('type'=>'date','name'=>'dateTo'));
        $dateTo->setLabel('Koniec promocji')
        	->setRequired(true)
        	->addValidator($validatorDate)
        	->setAttrib('id','wyborDatyStop');
        

        //shop
        //
        //cities
        $cities = new Zend_Form_Element_MultiCheckbox ('cities');
        foreach($citiesArg as $key=>$item){
            $cities->addMultiOption($item->id, $item->name);
        }
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('zapisz nowy produkt');
        
        $this->addElements(array($name, $dateFrom, $dateTo, $cities, $submit));
        
    } 
}
