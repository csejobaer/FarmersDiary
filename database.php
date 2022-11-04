<?php 
class DatabaseConnection{
	private $host = "localhost";
	private $user = "root";
	private $dbname = "farmersdiary";
	private $password = "";
	public $conn;


	function __construct(){

		$conn = new mysqli($this -> host,$this -> user,$this -> password,$this -> dbname);

        if($conn->connect_error)
        {
            die ("<h1>Database Connection Failed</h1>");
        }
        return $this->conn = $conn;


	}
	// Execute the query
	public 
	function query_execute($sql){
		$result = $this -> conn -> query($sql);
		return $result;
	}
}



 ?>