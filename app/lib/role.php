<?php
namespace PHPMVC\LIB;
use PHPMVC\LIB\Database\DatabaseHandler;

class Role
{
	protected $permissions;

	protected function __construct() {
		$this->permissions = array();
	}

	// return a role object with associated permissions
	public static function getRolePerms($user_id) {
		$sql="SELECT role_name FROM roles WHERE role_id in (SELECT role_id FROM user_roles WHERE user_id = $user_id)";
		$stmnt=DatabaseHandler::init()->prepare($sql);
		$roles=$stmnt->execute()===true?$stmnt->fetchAll():false;
		for($i=0;$i<count($roles);$i++){
			$roles[$i] = $roles[$i][0];
		}
		return (!empty($roles))?$roles:false;
	}

	// check if a permission is set
	public function hasPerm($permission) {
		return isset($this->permissions[$permission]);
	}
}