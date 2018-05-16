<?php
namespace PHPMVC\LIB;
class Session{
	use Helper;
	public function createSession(){
		session_start();
	}

	public static function logUser($userId){
		$_SESSION['userId'] = $userId;
	}

	public static function relogUser($userId){
		$_SESSION['userId'] = $userId;
	}

	public static function isLogged(){
		if(isset($_SESSION['userId'])){
			return true;
		}
		return false;
	}

	public static function logOut(){
		unset($_SESSION['userId']);
		header('location: '.'/mvc/public/ads');
	}

	public static function getId(){
		return $_SESSION['userId'];
	}
}

