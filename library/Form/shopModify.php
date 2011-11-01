<?php
class Form_ShopModify extends Zend_Form 
{ 
    public function __construct($options = null) 
    { 
        //parent::__construct($options);
        $this->setName('modify_shop');
        $this->setEnctype('UTF-8');
        $this->setMethod('post');
        echo($options['data']->name);
        if(!empty($options['data'])){
            
            //ID
//            $id = new Zend_Form_Element_Hidden('id');
//            $id->setValue($options['data']->id);
            
            //NAME
            $name = new Zend_Form_Element_Text('name');
            $name->setLabel('Nazwa sklepu')
                 ->setRequired(true)
                 ->setValue($options['data']->name)
                 ->setErrorMessages(
                    array(
                            Zend_Validate_NotEmpty::IS_EMPTY=>'Nazwa sklepu jest wymagana',
                    )
            );
            
            //CATEGORY
            $category = new Zend_Form_Element_Select('category');
            foreach($options['categories'] as $key=>$cat){
                $category->addMultiOption($cat->name, $cat->id);
            }
            $category->setValue($options['data']->category->id);
            
            $submit = new Zend_Form_Element_Submit('submit');
            $submit->setLabel('modyfikuj sklep');
            $this->addElements(array($name, $submit));
        }
        
    } 
}
