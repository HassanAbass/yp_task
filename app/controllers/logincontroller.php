<?php
namespace PHPMVC\Controllers;


use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\LIB\Session;
use PHPMVC\Models\Employee;
use PHPMVC\Models\User;

class LoginController extends AbstractController{
	use InputFilter;
	use Helper;

	public function defaultAction(){
		if($_SERVER['REQUEST_METHOD']=='POST') {
			$user = new User('');
			$user->user_name = $this->FilterString($_POST['name']);
			$user->password = sha1($_POST['password']);
			$session = new Session();
			$session->createSession();

			if($user::checkUser($user->user_name,$user->password)!=false){
				$user = $user::checkUser($user->user_name,$user->password);
				$_SESSION['msg'] = "User " . $user->user_id . " has log in successfully";
			}
			else {
				$_SESSION['msg'] = "Invalid credentials";
			}
			$session::logUser($user->user_id);
			header('location:'.PUBLIC_PATH.'ads');
		}
		$this->_view();
	}
	public function logoutAction(){
		Session::logOut();
		header('location:'.PUBLIC_PATH.'login');
	}
}