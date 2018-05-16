<?php
/**
 * Created by PhpStorm.
 * User: subscriber
 * Date: 14/05/18
 * Time: 04:04 م
 */

namespace PHPMVC\LIB;

use PHPMVC\Models\Ads;


class AdsRepository extends Ads implements IAdsRepository {


	public function insert() {
		$this->save();
	}
	public function deleteInstance($id){
		if($this->getByID($id)){
			self::deleteEmp($id);
			$_SESSION['msg'] = "Employee $id has been deleted successfully";
			return true;
		}
		return false;
	}
	public function getByID($id) {
		if(self::getEmpPK($id)!=false){
			return self::getEmpPK($id);
		}
		return false;
	}
}