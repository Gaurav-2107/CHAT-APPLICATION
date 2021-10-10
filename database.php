<?php
require_once("classes/autoload.php");

Class Database
{
	private $con;

	function __construct()
	{
		$this->con=$this->connect();
	}



private function connect()
{
	$string="mysql:host=localhost;dbname=mychat";
	try
	{
		$connection= new PDO($string,DBUSER,DBPASS);
		return $connection;
		echo "connection successful";
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
		die;
	}

	return false;

}

public function write($query,$data = [])
{
	$con = $this->connect();
	$stmt= $con->prepare($query);
	/*foreach ($data as $key => $value) {
		# code...
	$stmt->bindParam(':'.$key,$value);
}*/

	$check= $stmt->execute($data);


	if($check)
	{
		return true;
	}
return false;
}

//read database

public function read($query,$data = [])
{
	$con = $this->connect();
	$stmt= $con->prepare($query);
	

	$check= $stmt->execute($data);


	if($check)
	{
		$result = $stmt->FetchAll(PDO::FETCH_OBJ);
		if(is_array($result) && count($result) > 0){
			return $result;
		}
		return false;
	}
return false;
}

public function get_user($userid)
{
	$con = $this->connect();
	$arr['userid'] = $userid;
	$query= "select * from users where userid = :userid limit 1";
	$stmt= $con->prepare($query);
	$check= $stmt->execute($arr);


	if($check)
	{
		$result = $stmt->FetchAll(PDO::FETCH_OBJ);
		if(is_array($result) && count($result) > 0){
			return $result[0];
		}
		return false;
	}
return false;
}

public function generate_id($max){
	$rand="";
	$rand_count= rand(4,$max);
	for ($i=0; $i < $rand_count; $i++) { 
		# code...
		$r = rand(0,9);
		$rand .= $r;
	}
	return $rand;
}
}

