<?php

include "../entity/useraccount.php";

function controllogin($email, $password, &$msg, &$errors){
	//validate email
	if($user_id = useraccount::login($email, $password)){
		$_SESSION['user_id'] = $user_id;
		$msg['login'] = "success";
		
		return true;
	}
	
}
function controlsignup($username, $email, $password, &$msg, &$errors){
	
	//make username and email validation
	
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$errors['email'] = 'invalid';
		
		return false;//not valid email.
	}

	//call signup function in useraccount class
	useraccount::signup($username, $email, $password, $msg, $errors);

	if($msg['signup'] == "success"){
		$user_id = useraccount::login($email, $password);
		$_SESSION['user_id'] = $user_id;
		$msg['login'] = "success";
		
		return true;
	}
	else{
		//return value if signup is not successfull.
	}
	

	
}


function controllogout(){
	if(!isset($_SESSION['user_id'])){
		header("Location: index.php");
	}
	if(useraccount::logout()){
		return true;
	}
	else{
		return false;
	}
}
function controlpasswordchange(){
	$user_id = $_SESSION['user_id'];
	//check for password strength
	//check for password repitetion
	//call changepassword fromuseraccounts
	useraccount::changepassword();
}

function controlforgotpassword(){}



?>