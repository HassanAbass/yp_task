<?php

namespace PHPMVC\Controllers;


use PHPMVC\LIB\FrontController;

class AbstractController{
    protected $_controller;
    protected $_action;
    protected $_para;
    protected $data=[];
    public function notFoundAction(){
        $this->_view();
    }
    public function setController($ctrl){
        $this->_controller=$ctrl;
    }
    public function setAction($action){
        $this->_action=$action;
    }
    public function setParams($para){
        $this->_para=$para;
    }
    protected function _view(){
       if($this->_action==FrontController::NOT_FOUND_ACTION){
           require_once VIEW_PATH.'notfound'.DS.'notfound.view.php';
       }
       else{
           $view=VIEW_PATH.$this->_controller.DS.$this->_action.'.view.php';
           if(file_exists($view)){
               extract($this->data);
               //require_once APP_PATH.DS.'layout.php';
	           require VIEW_PATH.DS.'layout'.DS.'header.php';
               require_once $view;
	           require VIEW_PATH.DS.'layout'.DS.'footer.php';

           }else{
               require_once VIEW_PATH.'notfound'.DS.'noview.view.php';
           }
       }
    }

}