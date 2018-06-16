<?php 

/**
* 
*/
class Conex
{
	public $host;
	public $user;
	public $pass;
	public $db;
	
	public function __construct()
	{
		$this->host = 'localhost';
		$this->user = 'root';
		$this->pass = '';
		$this->db = 'dai';
	}

	public function newConex(){
		$con = new mysqli($this->host, $this->user, $this->pass, $this->db);
		$con->query("SET NAMES 'utf8'");

		if ($con->errno) {
			return "Error al conectar con la base de datos";
		}else{
			return $con;
		}
	}
}


?>