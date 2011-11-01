<?php
class Application_Model_Customer extends Zend_Db_Table_Abstract{
	protected $_name = 'customers';
	
	public function createCustomer(){
		$row = $this->createRow();
		$row->imie = "aaa";
		$row->nazwisko = "bbb";
		$row->email = "mail@gmail.com";
		$row->created = date("Y-m-d"); 
		$row->data_urodzenia = date("Y-m-d"); 
		$row->telefon = "606913471";
		
		$row->save();
		
		$id = $this->_db->lastInsertId();
		return $id;
	}
	
	public function addCustomer($customer){
		$row = $this->createRow();
		$row->imie = $customer['imie'];
		$row->nazwisko = $customer['nazwisko'];
		$row->miasto = $customer['miasto'];
		$row->ulica = $customer['ulica'];
		$row->powiat = $customer['powiat'];
		$row->wojewodztwo = $customer['wojewodztwo'];
		$row->kod_pocztowy = $customer['kod_pocztowy'];
		$row->nr_domu = $customer['nr_domu'];
		$row->nr_mieszkania = $customer['nr_mieszkania'];
		$row->email = $customer['email'];
		$row->haslo = $customer['haslo'];
		$row->telefon = $customer['telefon'];
		$row->created = date('Y-m-d H:i:s');
		$row->save();
		
		$id = $row->idCustomers;
		echo('id: '.$id.'</br>');
		return $id;
	}
	
	public function getCustomers($count=10, $offset=0){
		$rows = $this->fetchAll(null,null,$count,$offset);
		return $rows;
	}
}
?>