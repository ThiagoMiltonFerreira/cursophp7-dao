<?php

class sql extends PDO //PDO nativa do php (interna) tudo do PDO tem acesso na classe sql(bindParam por exemplo)
{

	private $conn;

	public function __construct() //quando der um new sql controi essa classe direto --NO MOMENTO DA INSTACIA JA CHAMA DIRETO ESTA CLASSE COMO SE FOSSE UM INDEX.
	{

		$this->conn = new PDO("mysql:localhost; dbname=dbphp7" , "root", "");


	}

	private function setParams($statment,$parameters =array())
	{

		foreach ($parameters as $key => $value) 
		{
		
			$statment -> bindParam($key,$value);


		}


	}


	private function setParam($statment,$key, $value)
	{
		foreach ($params as $key => $value) 
		{
			$this->setParam($key,$value);

		
		}	


	}


	public function query($rawQuery,$params = array()) //rawquery = query bruta vem a query do sql SELECT#FROM
	{

		$stmt = $this->conn->prepare($rawQuery);
		
		$this->setParams($stmt,$params);  //***************
		//var_dump($rawquery);
		$stmt->execute();
		
		return $stmt;



	}

	public function select($rawQuery, $params=array()):array
	{


		$stmt = $this->query($rawQuery);

		return $stmt->fetchAll(PDO::FETCH_ASSOC);



	}


}



?>