<?php
class Connection{
	public $host="localhost";
	protected $db= "furniture";
	private   $user="root";
	private   $pass="";
	public    $con;
	
	public function connect(){

		try{
		$dsn= "mysql:host=$this->host; dbname=$this->db";
		$this->con = new PDO($dsn, $this->user, $this->pass );
		return $this->con;

	}catch(PDOException $err ){
		echo "ERROR OCCURED".$err->getMessage();
	}
  }
}
