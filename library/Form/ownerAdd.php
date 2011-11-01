<?php
class Form_OwnerAdd extends Zend_Form 
{ 
    public function __construct($options = null) 
    { 
        parent::__construct($options);
        $this->setName('add_owner');
        
        $this->setMethod('post');
        
        $username = new Zend_Form_Element_Text('username');
        $pass = new Zend_Form_Element_Password('pass');
        $pass->setRequired(true)->setLabel('Hasło');
        $pass2 = new Zend_Form_Element_Password('pass2');
        $pass2->setRequired(true)->setLabel('Powtórz hasło');
        $username->setLabel('Nazwa użytkownika')->setRequired(true)->setErrorMessages(
        	array(
        		Zend_Validate_NotEmpty::IS_EMPTY=>'Nazwa użytkownika jest wymagana',
        	)
        );
             // ->setMultiOptions(array('mr'=>'Mr', 'mrs'=>'Mrs'))
             // ->setRequired(true)->addValidator('NotEmpty', true);
        
        $imie = new Zend_Form_Element_Text('imie');
        $imie->setLabel('Imię')->setRequired(true)->setErrorMessages(
        	array(
        		Zend_Validate_NotEmpty::IS_EMPTY=>'Imię nie może być puste',
        	)
        );

        // $lastName = new Zend_Form_Element_Text('lastName');
        // $lastName->setLabel('Last name')
                 // ->setRequired(true)
                 // ->addValidator('NotEmpty');
        $nazwisko = new Zend_Form_Element_Text('nazwisko');
        $nazwisko->setLabel('Nazwisko')->setRequired(true)->setErrorMessages(
        	array(
        		Zend_Validate_NotEmpty::IS_EMPTY=>'Nazwisko nie może być puste',
        	)
        );
        $miasto = new Zend_Form_Element_Text('miasto');
        $miasto->setLabel('Miasto')->setRequired(true)->setErrorMessages(
        	array(
        		Zend_Validate_NotEmpty::IS_EMPTY=>'Miasto nie może być puste',
        	)
        );;
        $ulica = new Zend_Form_Element_Text('ulica');
        $ulica->setLabel('Ulica')->setRequired(true)->setErrorMessages(
        	array(
        		Zend_Validate_NotEmpty::IS_EMPTY=>'Ulica nie może być puste',
        	)
        );
        $powiat = new Zend_Form_Element_Text('powiat');
        $powiat->setLabel('Powiat');
        $wojewodztwo = new Zend_Form_Element_Text('wojewodztwo');
        $wojewodztwo->setLabel('Województwo');
        $kod_pocztowy = new Zend_Form_Element_Text('kod_pocztowy');
        $kod_pocztowy->setLabel('Kod pocztowy')->setRequired(true);
        $kodValidator = new Zend_Validate_Regex('/^[0-9]{2}[-][0-9]{3}$/');
        $kod_pocztowy->addValidator($kodValidator)->setErrorMessages(
        	array(
        		Zend_Validate_Regex::NOT_MATCH=>'Kod pocztowy musi miec format 00-000',
        	)
        );
        $nr_domu = new Zend_Form_Element_Text('nr_domu');
        $nr_domu->setLabel('Numer domu')->setRequired(true)->setErrorMessages(
        	array(
        		Zend_Validate_NotEmpty::IS_EMPTY=>'Numer domu jest wymagany',
        	)
        );
        $number_validator = new Zend_Validate_Alnum();
        $number_validator->setMessages(
        	array(
        		Zend_Validate_Alnum::STRING_EMPTY => 'Pole nie może być puste',
        		Zend_Validate_Alnum::NOT_ALNUM => 'Niewłaściwy numer',
        		Zend_Validate_Alnum::INVALID => 'Popraw błędny numer',
        	)
        ); 
        $nr_domu->addValidator($number_validator);
        $nr_mieszkania = new Zend_Form_Element_Text('nr_mieszkania');
        $nr_mieszkania->setLabel('Numer mieszkania');

             
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
     
        $telefon = new Zend_Form_Element_Text('telefon');
        $telefon->setLabel('Telefon stacjonarny')->addValidator($number_validator);
              
        $komorka = new Zend_Form_Element_Text('komorka');
        $komorka->setLabel('Telefon komórkowy')->addValidator($number_validator);
        
        $firma = new Zend_Form_Element_Text('firma');
        $firma->setLabel('Nazwa firmy')
              ->setRequired(true)
              ->addValidator('NotEmpty', true);
        $nip = new Zend_Form_Element_Text('nip');
        $nipValidator = new Validator_Nip();
        $nip->setLabel('Numer NIP')
              ->setRequired(true)
              ->addValidator('NotEmpty', true)
              ->addValidator($nipValidator);

        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('zapisz');
        
        $this->addElements(array($username, $pass, $pass2, $imie, $nazwisko, $miasto, $ulica, $powiat, $wojewodztwo, $kod_pocztowy, $nr_domu, $nr_mieszkania, $email, $telefon, $komorka, $nip, /*$captcha,*/ $submit));
        
    } 
}
