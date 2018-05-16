<?php
/**
 * Created by PhpStorm.
 * User: subscriber
 * Date: 14/05/18
 * Time: 04:23 م
 */

namespace PHPMVC\Controllers;


use PHPMVC\LIB\AdsRepository;
use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\LIB\Role;
use PHPMVC\LIB\Session;
use PHPMVC\Models\Ads;

class AdsController extends AbstractController {
	use InputFilter, Helper;
	protected $ads= null;
	public function __construct() {
		$this->ads = new AdsRepository('0',1);
	}
	public function defaultAction(){
		$this->data['ads']=$this->ads::getAll();
		$this->_view();
	}
	public function editAction(){
		$id=$this->FilterInt($this->_para[0]);
		$ad=$this->ads->getByID($id);
		if($_SERVER['REQUEST_METHOD']=='POST') {
			$ad->ad_desc=$this->FilterString($_POST['ad_desc']);
			if(isset($_FILES['ad_image']['name'])){
				$uploadfile = APP_PATH.'/views/assets/uploads/'. basename($_FILES['ad_image']['name']);
				if (move_uploaded_file($_FILES['ad_image']['tmp_name'], $uploadfile)) {
					$ad->image = $_FILES['ad_image']['name'];
				}
			}
			if($ad->save()) {
				$_SESSION['smsg'] = "Employee " . $ad->ad_id . " has been edited successfully";
			}
		}

		$this->data['editAd']=($ad!=false)?$ad:null;
		$this->_view();
	}
	public function viewAction(){
		$ad=$this->ads->getByID($this->_para[0]);
		$this->data['ad']=$ad;
		$this->_view();
	}
	public function manageAction() {

		$this->data['ads']=$this->ads::getAll();
		$this->_view();
	}
	public function deleteAction(){
		$id=$this->FilterInt($this->_para[0]);
		if($this->ads->getByID($id)){
			$this->ads->deleteInstance($id);
			$_SESSION['msg'] = "Employee $id has been deleted successfully";
			$this->redirect('../');
		}
	}
	public function addAction(){
		if($_SERVER['REQUEST_METHOD']=='POST') {
			$this->ads->ad_desc=$this->FilterString($_POST['ad_desc']);
			if(isset($_FILES['ad_image']['name'])){
				$uploadfile = APP_PATH.'/views/assets/uploads/'. basename($_FILES['ad_image']['name']);
				if (move_uploaded_file($_FILES['ad_image']['tmp_name'], $uploadfile)) {
					$this->ads->image = $_FILES['ad_image']['name'];
				}
			}
			if($this->ads->insert()) {
				$_SESSION['msg'] = "Employee " . $ad->ad_id . " has been edited successfully";
			}
		}
		$this->_view();
	}
}