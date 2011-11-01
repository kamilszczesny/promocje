<?php
class Application_Model_TablesKind extends Zend_Db_Table_Abstract{
	protected $_name = 'TablesKinds';
	protected $_primary = 'Tableskind_id';
	protected $_referenceMap    = array(
        'Restaurant' => array(
            'columns'           => array('Restaurants_idRestaurants'),
            'refTableClass'     => 'Application_Model_Restaurant',
            'refColumns'        => array('idRestaurants')
        )
    );
	
	public function getTablesKinds($count=10, $offset=0){
		$rows = $this->fetchAll(null,null,$count,$offset);
		return $rows;
	}
	
	public function getRestaurantRelatedTables($id=null){
		if(!empty($id)){
			$ret = $this->fetchAll(
				$this->select()
        		->where('Tableskind_id = '.$id)
        		->order('Tableskind_id ASC')
        		->limit(50, 0)
			);
			return $ret;
		} else {
			return null;
		}
	}
}
?>