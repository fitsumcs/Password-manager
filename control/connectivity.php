<?php
define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DB", "dbtest");
define("SECURE", false); //change to true for production.


//$conn = connectDB();

function connectDB(){
	$conn = new mysqli(HOST, USER, PASSWORD, DB);
	if($conn->connect_error){
		die("unable to connect to database");
	}
	return $conn;
}

function store($query){}
/*
function search($query){
	$conn = $GLOBAL['conn'];

	if($results = $conn->query($query)){
		$num_rows = $results->num_rows();
		$x = 0;
		$search_result = array();
		while($x<$num_rows){
			$search_result[$x] = $results->fetch_assoc();
		}
		return $search_result;
	}
	else {
		return false;
	}
	

}
*/
function delete($query){
	$conn = $GLOBAL['conn'];
	if($conn->query($query)){
		return true;
	}
	else{
		return false;
	}
}
function update($query){
	$conn = $GLOBAL['conn'];
	if($conn->query($query)){
		return true;
	}
	else{
		false;
	}
}

?>