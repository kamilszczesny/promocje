<?php 
class Validator_Nip extends Zend_Validate_Abstract
{
    const MSG_NUMERIC = 'msgNumeric';
    const MSG_INVALID = 'msgInvalid';
    
    public $control = null;
 
    protected $_messageVariables = array(
        'control' => 'control',
    );
 
    protected $_messageTemplates = array(
        self::MSG_NUMERIC => "'%value%' powinien składac sie z cyfr",
        self::MSG_INVALID => "'%value%' jest niepoprawnym numerem NIP : %control%",
    );
 
    public function isValid($value)
    {
        $this->_setValue($value);
 
        if (!is_numeric($value)) {
            $this->_error(self::MSG_NUMERIC);
            return false;
        }
        
        $wagi = array(6,5,7,2,3,4,5,6,7);
        $suma = 0;
        for($i=0; $i<9; $i++){
          $suma += $wagi[$i] * $value[$i];
        }
        $this->control = $suma%11;
        if($this->control != (int)$value[9]){
          $this->_error(self::MSG_INVALID);
          return false;
        } else {
          return true;
        }

    }
}