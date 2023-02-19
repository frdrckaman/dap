<?php
class DB{
	private static $_instance = null;
	private $_pdo,$_query,$_error = false,$_result,$_count =0;

	private function __construct() {
		try {
              $this->_pdo = new PDO('mysql:host='.config::get('mysql/host').';dbname='.config::get('mysql/db'),config::get('mysql/username'),config::get('mysql/password'));

		}catch(PDOExeption $e) {
          die($e->getMessage());
		}
	}
	public static function getInstance(){
		if(!isset(self::$_instance)){
          self::$_instance = new DB(); 
      }
      return self::$_instance;
	}
	public function query($sql,$params = array()){
      $this->_error =false;
      if($this->_query = $this->_pdo->prepare($sql)){
      	$x=1;
      	if(count($params)){
      		foreach($params as $param){
      			$this->_query->bindValue($x,$param);
      			$x++;
      		}
      	}
      	if($this->_query->execute()){

      		$this->_result = $this->_query->fetchAll(PDO::FETCH_OBJ);
      		$this->_count = $this->_query->rowCount();
      	}
      	else {
      	 $this->_error = true;
      	}
      
      return $this;
	}
}
public function action($action,$table,$where = array()){
  if(count($where) === 3){
      $operators = array('=','>','<','>=','<=');
      $field    =$where[0];
      $operator =$where[1];
      $value    =$where[2];
      if(in_array($operator, $operators)) {
        $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
        if(!$this->query($sql,array($value))->error()){
        	return $this;
        }
      }
  }
}
public function insert($table,$fields = array()){
  
     $keys = array_keys($fields);
     $values = null;
     $x = 1;
     foreach($fields as $field){
     	$values .= '?';
     	if($x < count($fields)){
         $values .= ',';
     	}
     	$x++;
     }
    
     $sql ="INSERT INTO {$table} (`".implode('`,`',$keys)."`) VALUES ({$values}) " ;
    if(!$this->query($sql,$fields)->error()){
    	return true;
    }

   return false;
}

public function get($table,$where){
return $this->action('SELECT *',$table,$where);
}
public function delete($table,$where){
return $this->action('DELETE ',$table,$where);
}
public function update($table,$id,$fields){
   $set = '';
   $x = 1;

    foreach($fields as $name => $value){
     $set .="{$name} = ?";
     if($x < count($fields)){
     	$set .=',';
     }
     $x++;
    }

   $sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";
   if(!$this->query($sql,$fields)->error()){
  return true;
   }
   return false;
}

    public function updateSubject($table,$id,$fields){
        $set = '';
        $x = 1;

        foreach($fields as $name => $value){
            $set .="{$name} = ?";
            if($x < count($fields)){
                $set .=',';
            }
            $x++;
        }

        $sql = "UPDATE {$table} SET {$set} WHERE teacher_id = {$id}";
        if(!$this->query($sql,$fields)->error()){
            return true;
        }
        return false;
    }

public function results(){
	return $this->_result;
}
public function first(){
  return $this->_result[0];
}
	public function error(){
		return $this->_error;
	}
	public function count(){
		return $this->_count;
	}
    public function getAll($table){
        return $this->query("SELECT * FROM '$table'");
    }
    public function countData($table){
        return $this->query("SELECT * FROM '$table'");
    }
    public  function getValue($table){
        $query = $this->_pdo->query("SELECT * FROM $table");
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}



