<?php 

class Sql extends PDO {

	private $conn;


	public function __construct(){

		$this->conn = new PDO("mysql:dbname=storesp;host=int-store-rep.czkeawmccjak.sa-east-1.rds.amazonaws.com", "master", "asdjhf9a772");

	}


	public function setParams($statement, $parameters = array()){

		foreach ($parameters as $key => $value) {

			$this->setParam($key, $value);

		}

	}


	private function setParam($statement, $key, $value){

		$statement->bindParam($key,$value);

	}


	public function query($rawQuery, $params = array())
	{

		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();

		return $stmt;

	}


	public function select($rawQuery, $params = array()):array
	{

		$stmt = $this->query($rawQuery, $params);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);

	}





}