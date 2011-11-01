<?php
class Application_Model_ProductRow extends Zend_Db_Table_Row{
	
	public function init(){
		$this->_data['agregat'] = null;
	}
}
?>