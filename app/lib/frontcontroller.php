<?php 
namespace PHPMVC\LIB;
class FrontController{
	use Helper;
    const NOT_FOUND_ACTION='notFoundAction';
    const NOT_FOUND_CONTROLLER='PHPMVC\\Controllers\\NotFoundController';
    private $_controller='index';
    private $_action='default';
    private $_para=array();
    public function __construct(){
        $this->_parseUrl();
    }

    private function _parseUrl()
    {
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $url = explode(DS, trim($url, DS), 5);
        if (isset($url[2]) && $url[2] != '') {
            $this->_controller = $url[2];
        }
        if (isset($url[3]) && $url[3] != '') {
            $this->_action = $url[3];
        }
        if (isset($url[4]) && $url[4] != '') {
            $this->_para = explode(DS, $url[4]);
        }
    }
    public function Dispatch(){
        $controllerClassName= 'PHPMVC\\Controllers\\' . ucfirst($this->_controller) . 'Controller';
        $actionName=$this->_action.'Action';
        //check for controller
        if(!class_exists($controllerClassName))
            $controllerClassName=self::NOT_FOUND_CONTROLLER;

        $controller=new $controllerClassName;
        //check for action
        if(!method_exists($controller,$actionName))
            $this->_action=$actionName=self::NOT_FOUND_ACTION;
        //set methods
        $controller->setController($this->_controller);
        $controller->setAction($this->_action);
        $controller->setParams($this->_para);

        $action = $this->_action;
	    if($_SERVER['REQUEST_METHOD'] == 'GET'){
		    $action='read';
	    }
	    if($_SERVER['REQUEST_METHOD'] == 'POST'&&$this->_action=="edit"){
		    $action='edit';
	    }
	    if($_SERVER['REQUEST_METHOD'] == 'GET'&&$this->_action=="delete"){
		    $action='delete';
	    }

	    if(Session::isLogged()){
		    $user_roles = Role::getRolePerms(Session::getId());
		    if(!in_array($action,$user_roles)&& $action!='read'){
			    $_SESSION['msg']= "You are not authorized to this action $action";

			    header('location:'.PUBLIC_PATH.'ads');
		    }else{
			    $controller->$actionName();

		    }
	    }else{
		    $controller->setController('login');
		    $controller->setAction('default');
		    $controller->$actionName();
	    }

    }
}