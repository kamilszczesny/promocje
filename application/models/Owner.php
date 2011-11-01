<?php
class Application_Model_Owner extends Zend_Db_Table_Abstract{
	protected $_name = 'owners';
	
	public function createOwner(){
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
	
	public function addOwner($owner){
		$row = $this->createRow();
		$row->imie = $owner['imie'];
		$row->nazwisko = $owner['nazwisko'];
		$row->miasto = $owner['miasto'];
		$row->ulica = $owner['ulica'];
		$row->powiat = $owner['powiat'];
		$row->wojewodztwo = $owner['wojewodztwo'];
		$row->kod_pocztowy = $owner['kod_pocztowy'];
		$row->nr_domu = $owner['nr_domu'];
		$row->nr_mieszkania = $owner['nr_mieszkania'];
		$row->email = $owner['email'];
		//$row->haslo = $owner['haslo'];
		$row->telefon = $owner['telefon'];
    $row->nip = $owner['nip'];
    $row->komorka = $owner['komorka'];
		//$row->created = date('Y-m-d H:i:s');
		$row->save();
		
		$id = $row->idOwners;
		echo('id: '.$id.'</br>');
		return $id;
	}
	
	public function getOwners($count=10, $offset=0){
		$rows = $this->fetchAll(null,null,$count,$offset);
		return $rows;
	}
}
?>