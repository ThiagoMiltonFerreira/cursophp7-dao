<?php 

class Sql extends PDO {

	private $conn;

	public function __construct(){

		$this->conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root", "");

	}



	private function setParams($statement, $parameters = array()){

		foreach ($parameters as $key => $value) {
			
			$this->setParam($key, $value);

		}

	}

	private function setParam($statement, $key, $value){

		$statement->bindParam($key, $value);

	}

	public function query($rawQuery, $params = array()){ // $rawQuery = comando sql   -   $params = array() = array com os dados

		$stmt = $this->conn->prepare($rawQuery); // prepara a query sql

		$this->setParams($stmt, $params);

		$stmt->execute();

		return $stmt;

	}

	//public function select($rawQuery, $params = array()):array
	public function select($rawQuery, $params = array()):array
	{

		$stmt = $this->query($rawQuery, $params);

		return $stmt->fetchAll(PDO::FETCH_ASSOC); // retorna array com chave/valor

	}

}

 ?>