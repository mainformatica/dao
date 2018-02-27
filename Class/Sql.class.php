<?php
 /** classe do Banco de Dados*/


 class Sql extends PDO
 {
 	private $conn;

 	public function __construct(){

 		$this->conn = new PDO("mysql:host=localhost;dbname=db_php7", "root", "");
 	}
    private function setParams($statment, $parameters = array()){
        
        foreach ($parameters as $key => $Value) {
 			
 			$this->setParam($statment, $key , $Value);
 		}

    }
     
    private function setParam ($statment, $key, $Value){

    	$statment->bindParam($key, $Value);
    }

 	public function query($rawQuery, $params = array()){

 		$stmt = $this ->conn -> prepare($rawQuery);
 		
 		$this -> setParams($stmt, $params);

 		$stmt -> execute();

 		return $stmt;
 	}

 	public function select($rawQuery, $params = array()):array
 	{

 	$stmt = $this -> query($rawQuery, $params);
 	return $stmt -> fetchAll(PDO::FETCH_ASSOC);
 	}
 }

?>