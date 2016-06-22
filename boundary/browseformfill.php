<?php
session_start();
include "../control/datapuller.php";
include "../control/datahandler.php";

//error varibles
$errors = array();
$msg = array();

$sites = array();


if(!isset($_SESSION['user_id'])){
	header("Location: index.php");
}

if(isset($_POST['btn-addformfill'])){
	$title = $_POST['title'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$birthdate = $_POST['birthday'];
	$address = $_POST['address'];
	
	if(empty($title)){
		$errors['formtitle'] = 'empty';
		return;
	}
	if(empty($firstname)){
		$errors['firstname'] = 'empty';
		return;
	}
	if(empty($lastname)){
		$errors['lastname'] = 'empty';
		return;
	}
	if(empty($username)){
		$errors['username'] = 'empty';
		return;
	}
	if(empty($email)){
		$errors['email'] = 'empty';
		return;
	}
	if(empty($gender)){
		$errors['gender'] = 'empty';
		return;
	}
	if(empty($birthdate)){
		$errors['birthdate'] = 'empty';
		return;
	}
	if(empty($address)){
		$errors['address'] = 'empty';
		return;
	}

	//call addformfill() function from data handler
	if(addformfill($title, $firstname, $lastname, $username, $email, $gender, $birthdate, $address, $msg, $errors)){
		echo $msg['saveformfill'];
	}
}


if(isset($_SESSION['editformfill'])){
	//edit site
	//get edit site form
}



//include main header
include "includes/userheader.php";
?>

//display formfills goes here