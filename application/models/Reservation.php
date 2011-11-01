<?php
class Application_Model_Reservation extends Zend_Db_Table_Abstract{
	protected $_name = 'reservations';
	
//	public function getReservations($count=10, $offset=0){
//		$rows = $this->fetchAll(null,null,$count,$offset);
//		return $rows;
//	}
	
	public function getReservations($restaurantId, $date, $peopleCount, $isSmoking,$minutesPeriod){
		$ret = $this->fetchAll(
				$this->select()
        		->where('restaurantId = ?', $restaurantId)
        		->where('liczba = ?', $peopleCount)
        		->where('palacy = ?', $isSmoking)
        		->where('state < 3')
//        		->where('DATE_ADD(date,INTERVAL 5 MINUTE)>NOW()')
        		->where("date > DATE_SUB('".$date."',INTERVAL ".$minutesPeriod." MINUTE)")
        		->where("date < DATE_ADD('".$date."',INTERVAL ".$minutesPeriod." MINUTE)")
        		->order('idReservations ASC')
        		->limit(50, 0)
			);
//		$temp = $this->select()
//        		->where('restaurantId = ?', $restaurantId)
//        		->where('liczba = ?', $peopleCount)
//        		->where('palacy = ?', $isSmoking)
//        		->where('state < 3')
////        		->where('DATE_ADD(date,INTERVAL 5 MINUTE)>NOW()')
//        		->where("date > DATE_SUB('".$date."',INTERVAL ".$minutesPeriod." MINUTE)")
//        		->where("date < DATE_ADD('".$date."',INTERVAL ".$minutesPeriod." MINUTE)")
//        		->order('idReservations ASC')
//        		->limit(50, 0);
//        echo('</br>');
//        	echo($temp);
//        echo('</br>');
		return $ret;
	}
	
	public function getReservationsByMd5($md5){
		$ret = $this->fetchAll(
				$this->select()
        		->where('md5 = ?', $md5)
        		->order('idReservations ASC')
        		->limit(50, 0)
			);
		return $ret->current();
	}
	
	public function getReservation($id=null){
		if(empty($id)) return null;
		
		$zwrotka = $this->find($id);
		if(!empty($zwrotka)){
			$reservation = $zwrotka->current();
			return $reservation;
		} else{
			return null;
		}
	}
	
	public function makeTemporaryReservation($reservationLightParams){
		echo('<br>Robienie wstepnej rezerwacji: '.var_dump($reservationLightParams).'</br>');
 		
        $row = $this->createRow($reservationLightParams);
		var_dump($row->toArray());
		$row->save();
		
		$id = $row->idReservations;
		return $id;
	}
	public function updateTemporaryReservation($reservationParams){
		$id = $reservationParams['id'];
		unset($reservationParams['id']);
		echo('</br>UPDATE reserwacji '.var_dump($reservationParams));
		//sprawdzenie czy istnieje nieprzeterminowana tymczasowa rezerwacja
 		if(!empty($id)){
 			echo('</br> niepuste id');
 			$reservation = $this->getReservation($id);
 			//w przypadku zmiany statusu 0->1 musi być zaachowane 5min
 			//w przypadku zmiany statusu 1->2 musi być zachowane 1h
 			$created = new Zend_Date($reservation->timestamp);
 			$fiveMinLater = new Zend_Date($created);
	     	$fiveMinLater->add(5,Zend_Date::MINUTE);
	     	$hourLater = new Zend_Date($created);
	     	$hourLater->add(1,Zend_Date::HOUR);
 			$now = new Zend_Date();
 			switch($reservation->state){
 				case 0:
 					if($now->compare($fiveMinLater)===-1) $allow = true;//młodsze niż 5min
 					else {$allow = false;echo('stara rezerwacja</br>');}
 					break;
 				case 1:
 					if($now->compare($hourLater)===-1) $allow = true;//młodsze niż 1h
 					else $allow = false;
 					break;
 				case 2:
 					if($reservationParams['state']==3) $allow = true; //anulowanie rezerwacji
 					else $allow = false;
 					break;
 					
 			}
 			if($allow){
 				$where = $this->getAdapter()->quoteInto('idReservations = ?', $id);
				
				if($reservationParams['state']==1){
					$this->sendConfirmationEmail('','');
					$reservationParams['md5'] = md5($reservationParams['id'].date().$reservationParams['email']);
				} 
				$this->update($reservationParams, $where);
				return true;
 			}else return false;
 			
 		} else return null;
 		
	}	
	public function confirmReservation($code){
		$data = array();
		$data['state'] = 2;
		
		
		$reservation = $this->getReservationsByMd5($code);
		if(!empty($reservation)){
	     	$hourLater = new Zend_Date($reservation->timestamp);
	     	$hourLater->add(1,Zend_Date::HOUR);
 			$now = new Zend_Date();
 			if($now->compare($hourLater)===-1 && $reservation->state<2){//młodsze niż 1h
 				$reservation->state = 2;
 				$reservation->save();
 				return true;
 			}
 			else return false;
		} else {
			return false;
		}
	}
	
	public function sendConfirmationEmail($email, $hash){
//		$mail = new Zend_Mail();
//		$mail->setBodyText('Potwierdzenie rezerwacji.');
//		$mail->setFrom('noreply@rezerwacje.com.pl', 'Automatyczny sysyem');
//		$mail->addTo('cinnahmon@gmail.com', 'Kamil');
//		$mail->setSubject('Potwierdzenie');
//		$mail->send();
	}
	
	
}