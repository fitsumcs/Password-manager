<?php
session_start();
include "../control/accounthandler.php";

if(isset($_SESSION['user_id'])){
	header("Location: browsevault.php");
}

//varibles
$errors = array();
$msg = array();


if(isset($_POST['btn-login'])){
	$email = $_POST['email'];
	$password = $_POST['password'];

	if(empty($email)){
		$errors['login-email'] = "empty";
		return;
	}
	if(empty($password)){
		$errors['login-password'] = "empty";
		return;
	}

	//call logging in function
	
	if(controllogin($email, $password, $msg, $errors)){
		if($msg['login'] = "success"){
			header("Location: browsevault.php");
			
		}
	}
	
	
}


if(isset($_POST['btn-signup'])){
	$username = $_POST['susername'];
	$email = $_POST['semail'];
	$password = $_POST['spassword'];
	$confirmpassword =$_POST['confirmpassword'];
	if(!$password == $confirmpassword){
		$errors['login-password'] = "notmatch";
		return;
	}

	if(empty($username)){
		$errors['signup-username'] = "empty";
		return;
	}
	if(empty($password)){
		$errors['signup-password'] = "empty";
		return;
	}
	if(empty($email)){
		$errors['signup-email'] = "empty";
		return;
	}


	//call the signing up function
	
	if(controlsignup($username, $email, $password, $msg, $errors)){
		if($msg['login'] = "success"){
			header("Location: browsevault.php");
			
		}
	}
	

}


echo "<br>browse vault";
if(isset($msg['login'])){
	if($msg['login'] == "success"){
		echo "succes fully loggedin";
		$msg['login'] = null;
	}
}
?>