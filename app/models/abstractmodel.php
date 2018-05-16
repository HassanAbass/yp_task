<?php
namespace PHPMVC\Models;

use PHPMVC\LIB\Database\DatabaseHandler;

class AbstractModel{
    const DATA_TYPE_BOOL=\PDO::PARAM_BOOL;
    const DATA_TYPE_STR=\PDO::PARAM_STR;
    const DATA_TYPE_INT=\PDO::PARAM_INT;
    const DATA_TYPE_FLOAT=4;//no float param

    public static function viewTableSchema(){
        return static::$tableSchema;
    }
    private function prepareStatment(\PDOStatement &$stmnt){
        foreach (static::$tableSchema as $columnName=>$type){
            if($type==4){
                $salary=  filter_input($this->$columnName, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $stmnt->bindValue(":{$columnName}",$salary);
            }
            $stmnt->bindValue(":{$columnName}",$this->$columnName,$type);
        }
    }
    public static function buildTableParamsSQL(){
        $paramName='';
        foreach (static::$tableSchema as $columnName=>$type){
            $paramName.=$columnName.'= :'.$columnName.', ';
        }
        return trim($paramName,', ');
    }
    public function save(){
        return ($this->{static::$primaryKey}==null)?$this->insert():$this->update();
    }
    private function insert(){
        $sql="INSERT INTO ".static::$tableName." SET ". self::buildTableParamsSQL();
        $conn=DatabaseHandler::init();
        $stmnt=$conn->prepare($sql);
        $this->prepareStatment($stmnt);
        if($stmnt->execute()) {
            $this->{static::$primaryKey}=$conn->lastInsertId();
            return true;
        }
        return false;
    }
    private function update(){
        $sql="update ".static::$tableName." set ".self::buildTableParamsSQL().' where '.static::$primaryKey.'='.$this->{static::$primaryKey};
        $stmnt=DatabaseHandler::init()->prepare($sql);
        $this->prepareStatment($stmnt);
        echo 'here';
        return $stmnt->execute();
    }
    public static function deleteEmp($id){
        $sql="delete from ".static::$tableName." where ".static::$primaryKey.'='.$id;
        $stmnt=DatabaseHandler::init()->prepare($sql);
        return $stmnt->execute();
    }
    public static function getAll(){
        $sql="select * from ".static::$tableName;
        $stmnt=DatabaseHandler::init()->prepare($sql);
        return  $stmnt->execute()===true?$stmnt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE,get_called_class(),array_keys(static::$tableSchema)):false;
    }
    public static function getEmpPK($id){
        $sql="select * from ".static::$tableName.' where '.static::$primaryKey.' = '.$id;
        $stmnt=DatabaseHandler::init()->prepare($sql);
        $emp=$stmnt->execute()===true?$stmnt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE,get_called_class(),array_keys(static::$tableSchema)):false;
        return (!empty($emp))?array_shift($emp):false;
    }
	public static function checkUser($name,$pass){
		$sql="select * from ".static::$tableName.' where user_name = '.'"'.$name.'"'.' and password = '.'"'.$pass.'"';
		$stmnt=DatabaseHandler::init()->prepare($sql);
		$emp=$stmnt->execute()===true?$stmnt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE,get_called_class(),array_keys(static::$tableSchema)):false;
		return (!empty($emp))?array_shift($emp):false;
	}

}