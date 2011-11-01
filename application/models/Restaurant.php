<?php
class Application_Model_Restaurant extends Zend_Db_Table_Abstract{
	protected $_name = 'restaurants';
	protected $_dependentTables = array('Application_Model_TablesKind');
	protected $_primary = 'idRestaurants';
	public $tables = null;
	
	public function getRestaurants($count=10, $offset=0){
		$rows = $this->fetchAll(null,null,$count,$offset);
		return $rows;
	}
	
	public function getRestaurant($id=null){
		if(empty($id)) return null;
		
		$zwrotka = $this->find($id);
		if(!empty($zwrotka)){
			$restaurant = $zwrotka->current();
			$tablesModel = new Application_Model_TablesKind();
			$tables = $restaurant->findDependentRowset('Application_Model_TablesKind');
			//$tables = $tablesModel->getRestaurantRelatedTables($id);
			//$restaurant->tables = $tables;
			return array('restaurant'=>$restaurant->toArray(), 'tables'=>$tables->toArray());
		} else{
			return null;
		}
	}
  
  public function addRestaurant($restaurant){
    $row = $this->createRow();
    $row->imie = $restaurant['nazwa'];
    $row->nazwisko = $restaurant['cuisinetype_id'];
    $row->miasto = $restaurant['tel_kontaktowy'];
    $row->ulica = $restaurant['ulica'];
    $row->powiat = $restaurant['miasto'];
    $row->kod_pocztowy = $restaurant['kod_pocztowy'];
    $row->nr_domu = $restaurant['nr_budynku'];
    $row->nr_mieszkania = $restaurant['nr_mieszkania'];
    $row->email = $restaurant['email'];
    $row->haslo = $restaurant['open_from'];
    $row->telefon = $restaurant['open_to'];
    $row->created = date('Y-m-d H:i:s');
    $row->save();
    
    $id = $row->idRestaurants;
    return $id;
  }
	
}