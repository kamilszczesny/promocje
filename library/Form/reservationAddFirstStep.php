<?php
class Form_ReservationAddFirstStep extends Zend_Form 
{ 
   public function __construct($options = null) 
    { 
        parent::__construct($options);
        
        $this//->setAction('/test2/public/rezerwacje/make')
        ->setMethod('post');
        
       	$restaurantId = new Zend_Form_Element_Hidden('restaurantId');
       	$restaurantId->setValue($options['id']);
        $data = new Zend_Form_Element_Text(array('type'=>'date','name'=>'data'));
        $validatorDate = new Zend_Validate_Date();
        $validatorDate->setMessages(
            array(
                Zend_Validate_Date::FALSEFORMAT => 'B��dny format daty',
                Zend_Validate_Date::INVALID        => 'Nie jest to poprawna data',
                Zend_Validate_Date::INVALID_DATE    => 'Podana data nie pasuje do formatu'
            )
        )->setFormat('yyyy-MM-dd HH:mm');
        $data->setLabel('Data i godzina')
        	->setRequired(true)
        	->addValidator($validatorDate)
        	//->setAttrib('type','date')
        	->setAttrib('id','wyborDatyGodziny');
		//$data->helper = 'textField';
        	//->addPrefixPath('Ext_Decorator', 'Ext/Decorator/', 'decorator');
        		
       	$liczbaOsob = new Zend_Form_Element_Select('liczba_osob');
       	$liczbaOsob->setLabel('Liczba osób')
       				->addMultiOption('1','1')
       				->addMultiOption('2','2')
       				->addMultiOption('3','3')
       				->addMultiOption('4','4')
       				->addMultiOption('5','5')
       				->addMultiOption('6','6');
					
		$palacy = new Zend_Form_Element_Select('palacy');
       	$palacy->setLabel('Rodzaj miejsca')
       				->addMultiOption('1','Dla Palących')
       				->addMultiOption('0','Dla Niepalących');

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('rezerwuj');
       	
       	$this->addElements(array($data,$liczbaOsob, $palacy, $restaurantId, $submit));
                
    } 
}
