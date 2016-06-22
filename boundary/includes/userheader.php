<?php
//session_start();


include "../control/accounthandler.php";
include "../control/datahandler.php";
//include "../control/datapuller.php";
include "../entity/password.php";
include "../control/request.php";



$errors = array();
$msg = array();

if(isset($_GET['btn-generatepassword'])){
	$strength = $_GET['strength'];
	$length = $_GET['length'];
	


	//$strength = "weak";

	//call function generatepassword with strength from entity class password
	$password = generatepassword($length, $strength);
	$msg['generatedpassword'] = $password;
	echo $msg['generatedpassword'];

}


if(isset($_POST['btn-logout'])){
	//logout
	if(controllogout()){
		header("Location: index.php");
	}
}


if(isset($_POST['btn-search'])){
	$search_value = $_POST['search-value'];
	//control search
	//call a search function
	if(empty($search_value)){
		$errors['search'] = "empty";
		return;
	}
	$search_result;
	search($search_value, $search_result);
	//do something with search_result;
	$search_rows = count($search_result);
	echo "Search result: ".$search_rows;
	foreach($search_result as $result){
		echo "<li>".$result['title']."</li>";
	}
}
?>