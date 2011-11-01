<?php
class Application_Model_Cuisinetype extends Zend_Db_Table_Abstract{
	protected $_name = 'cuisinetypes';
	
	public function createCuisinetype(){

	}
	
	public function addCuisinetype($cuisinetype){
		$row = $this->createRow();
	    $row->typ_kuchni = $cuisinetype['cuisinetype'];
	    $row->save();
	    
	    $id = $row->id;
	    //echo('<pre>');
		//print_r($row);
		//echo('</pre>');
	    return $id;
	}
	
	public function getCuisinetypes($count=100, $offset=0){
		$rows = $this->fetchAll(null,null,$count,$offset);
		return $rows;
	}
}
?>