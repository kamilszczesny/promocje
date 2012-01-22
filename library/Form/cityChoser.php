<?php
class Form_CityChoser extends Zend_Form 
{ 
    public function __construct($citiesArg, $id, $selected, $options = null) 
    { 
        parent::__construct($options);
        $this->setName('cityChooser');
        $this->setEnctype('UTF-8');
        $this->setMethod('post');
        
        $this->setAttrib('class', 'nice');
        $cities = new Zend_Form_Element_Select('cities');
        $cities->addMultiOption('0', 'Cała Polska')->setAttrib('class', 'selectToAutocomplete');
        foreach($citiesArg as $key=>$item){
            $cities->addMultiOption($item->id, $item->name)->setAttrib('id',$id);
        }
        if(!empty($selected)) $cities->setValue($selected);
        $this->addElements(array($cities));
        
    } 
}
