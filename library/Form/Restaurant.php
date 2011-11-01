<?php
class Form_Restaurant extends Zend_Form 
{ 
    public function __construct($options = null) 
    { 
        parent::__construct($options);
        		
        $data = new Zend_Form_Element_Text('data');
        $validatorDate = new Zend_Validate_Date();
        $validatorDate->setMessages(
            array(
                Zend_Validate_Date::FALSEFORMAT => 'B³êdny format daty',
                Zend_Validate_Date::INVALID        => 'Nie jest to poprawna data',
                Zend_Validate_Date::INVALID_DATE    => 'Podana data nie pasuje do formatu'
            )
        )->setFormat('yyyy-MM-dd HH:mm');
        $data->setLabel('Data i godzina (RRRR-MM-DD HH:MM:')
        	->setRequired(true)
        	->addValidator($validatorDate);
        	//->addPrefixPath('Ext_Decorator', 'Ext/Decorator/', 'decorator');
        		
       	$liczbaOsob = new Zend_Form_Element_Select('liczba_osob');
       	$liczbaOsob->setLabel('Liczba osÃ³b')
       				->addMultiOption('1','1')
       				->addMultiOption('2','2')
       				->addMultiOption('3','3')
       				->addMultiOption('4','4')
       				->addMultiOption('5','5')
       				->addMultiOption('6','6');
       	$niepalacy = new Zend_Form_Element_Checkbox('niepalacy');
       	$niepalacy->setLabel('Miejsce dla niepalÄ…cych');
       	
       	$palacy = new Zend_Form_Element_Checkbox('palacy');
       	$palacy->setLabel('Miejsce dla palÄ…cych');
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('rezerwuj');
       	
       	$this->addElements(array($data,$liczbaOsob, $niepalacy, $palacy, $submit));
                
    } 
}
