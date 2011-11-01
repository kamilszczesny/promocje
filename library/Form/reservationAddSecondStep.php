<?php
class Form_ReservationAddSecondStep extends Zend_Form 
{ 
    public function __construct($options = null) 
    { 
        parent::__construct($options);
        //print_r($options);
        $this->setName('reservation');
        $this->setMethod('post');
        $this->setAction('/test2/public/rezerwacje/make');
       
        $restaurantId = new Zend_Form_Element_Hidden('restaurantId');
        $restaurantId->setValue($options['firstStepData']['restaurantId']);
        
        $date = new Zend_Form_Element_Hidden('date');
        $date->setValue($options['firstStepData']['data']);
        
        $liczba_osob = new Zend_Form_Element_Hidden('liczba_osob');
        $liczba_osob->setValue($options['firstStepData']['liczba_osob']);
        
        $palacy = new Zend_Form_Element_Hidden('palacy');
        $palacy->setValue($options['firstStepData']['palacy']);

		
        $imie = new Zend_Form_Element_Text('imie');
        $imie->setLabel('Imię')->setRequired(true)->setErrorMessages(
        	array(
        		Zend_Validate_NotEmpty::IS_EMPTY=>'Imię nie może być puste',
        	)
        );

        $nazwisko = new Zend_Form_Element_Text('nazwisko');
        $nazwisko->setLabel('Nazwisko')->setRequired(true)->setErrorMessages(
        	array(
        		Zend_Validate_NotEmpty::IS_EMPTY=>'Nazwisko nie może być puste',
        	)
        );

             
        $email = new Zend_Form_Element_Text('email');
        $email->setLabel('Email')
              ->addFilter('StringToLower')
              ->setRequired(true)
              ->addValidator('NotEmpty', true)
              ->addValidator('EmailAddress')
              ->setErrorMessages(
	        	array(
	        		Zend_Validate_NotEmpty::IS_EMPTY=>'Eamil jest polem wymaganym',
	        		Zend_Validate_EmailAddress::INVALID_FORMAT=>'Podany adres email jest niepoprawny',
	        	)
        );
        // tworzymy obiekt Zend_Captcha_Image  
//		$captchaImage = new Zend_Captcha_Image('captchaImg');  
//		$captchaImage->setFont('Arial') // pełna ścieżka do czcionki, jaka ma zostać użyta  
//		             ->setImgDir(APPLICATION_PATH.'/../images/captcha') // pełna ścieżka do katalogu gdzie ma zostać wygenerowany obrazek  
//		             ->setImgUrl('http://localhost/test2/images/captcha')//TODO - zmienić potem
//		             ->setWordlen(5) // ilość znaków w kodzie captcha  
//		             ->setWidth(100) // szerokość obrazka  
//		             ->setHeight(60) // wysokość obrazka  
//		             ->generate();  
		  
		// tworzymy właściwy element formularza  
//		$captcha = new Zend_Form_Element_Captcha('captcha', array(  
//		    'captcha' => $captchaImage));  
//		$captcha->setLabel('Przepisz kod z obrazka widoczny poniżej:')->addValidator('captcha');
        //$captcha = new Zend_Form_Element_Captcha('captcha');
              
        $telefon = new Zend_Form_Element_Text('telefon');
        $telefon->setLabel('Telefon')
        		->addValidator('digits')
        		->setErrorMessages(
        			array(
        				Zend_Validate_Digits::STRING_EMPTY => 'Telefon jest polem wymaganym',
        				Zend_Validate_Digits::NOT_DIGITS => 'Numer telefon jest niepoprawny (powinien zawierać jedynie cyfry)',
        			)
        		);
              
        		
//        $data = new Zend_Form_Element_Text('data');
//        $data->setLabel('Data i godzina:');
        	//->addPrefixPath('Ext_Decorator', 'Ext/Decorator/', 'decorator');
        		
//       	$liczbaOsob = new Zend_Form_Element_Select('liczba_osob');
//       	$liczbaOsob->setLabel('Liczba osób')
//       				->addMultiOption('1','1')
//       				->addMultiOption('2','2')
//       				->addMultiOption('3','3')
//       				->addMultiOption('4','4')
//       				->addMultiOption('5','5')
//       				->addMultiOption('6','6');
//       	$niepalacy = new Zend_Form_Element_Checkbox('niepalacy');
//       	$niepalacy->setLabel('Miejsce dla niepalących');
//       	
//       	$palacy = new Zend_Form_Element_Checkbox('palacy');
//       	$palacy->setLabel('Miejsce dla palących');
        		
       	
       	//$this->addElements(array($data,$liczbaOsob, $niepalacy, $palacy));
       // $firstStep->addElements(array($data,$liczbaOsob, $niepalacy, $palacy));
        //$secondStep->addElements(array($imie, $nazwisko, $telefon, $email, $captcha));
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('zapisz');
        
        $pola = array($imie, $nazwisko, $email, $telefon);
    	if(!empty($options['firstStepData']['restaurantId'])){
        	$restaurantId = new Zend_Form_Element_Hidden('restaurantId');
        	$restaurantId->setValue($options['firstStepData']['restaurantId']);
        	array_push($pola, $restaurantId);
        }
    	if(!empty($options['firstStepData']['id'])){
        	$restaurantId = new Zend_Form_Element_Hidden('id');
        	$restaurantId->setValue($options['firstStepData']['id']);
        	array_push($pola, $restaurantId);
        }
    	if(!empty($options['firstStepData']['date'])){
        	$date = new Zend_Form_Element_Hidden('date');
        	$date->setValue($options['firstStepData']['date']);
        	array_push($pola, $date);
        }
    	if(!empty($options['firstStepData']['peopleNumber'])){
        	$liczba = new Zend_Form_Element_Hidden('liczba');
        	$liczba->setValue($options['firstStepData']['peopleNumber']);
        	array_push($pola, $liczba);
        }
    	if(!empty($options['firstStepData']['palacy'])){
        	$palacy = new Zend_Form_Element_Hidden('palacy');
        	$palacy->setValue($options['firstStepData']['palacy']);
        	array_push($pola, $palacy);
        }
    	if(!empty($options['firstStepData']['niepalacy'])){
        	$niepalacy = new Zend_Form_Element_Hidden('niepalacy');
        	$niepalacy->setValue($options['firstStepData']['niepalacy']);
        	array_push($pola, $niepalacy);
        }
        array_push($pola, $restaurantId);
        array_push($pola, $palacy);
        array_push($pola, $niepalacy);
        array_push($pola, $liczba_osob);
        array_push($pola, $date);
        array_push($pola, $submit);
        $this->addElements($pola);
        
    } 
}
