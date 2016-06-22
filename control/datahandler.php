<?php

include_once "../entity/siteaccount.php";
include_once "../entity/formfill.php";
include_once "../entity/note.php";



function validateemail($email){
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	  //invalid
		return false;
	}
	return true;
}

function validatename($name, $errors){
	if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
      $errors['username'] = "invalid";
      return false;
    }
    return true;
}

function verifyemail($email){}
function validatesite($foldername, $url, $username, $password, &$msg, &$errors){
	if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) {
	//invalid website
		$errors['url'] = 'invalid';
		return false;
	}
	if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
      $errors['username'] = "invalid";
      return false;
    }
    if (!preg_match("/^[a-zA-Z ]*$/",$folder)) {
      $errors['username'] = "invalid";
      return false;
    }
    //may be check password strength.
	return true;
}


function addsite($foldername, $url, $username, $password, &$msg, &$errors){
	//first validate site
	if(validatesite($foldername, $url, $username, $password, $msg, $errors)){
		//create siteaccount class and save site in db

		$account = new siteaccount($foldername, $url, $username, $password);
		if($account->save()){
			$msg['saveaccount'] = "succcess";
			return true;
		}
	}
	else{
		return false;
	}


	
}

//note
function validatenote(){}
function addnote($title, $content, $msg, $errors){
	if(!validatename($title, $errors)){
		return false;
	}
	//validate note content
	$note = new note($title, $content);
	if($note->save()){
		$msg['savenote'] = "success";
		return true;
	}
	else{
		return false;
	}
}


//formfill
function validateformfill(){}
function addformfill($title, $firstname, $lastname, $username, $email, $gender, $birthdate, $address, &$msg, &$errors){
	//validate all fields
	if(!validatename($title, $errors)){
		return false;
	}
    if(!validatename($firstname, $errors)){
		return false;
	}
    if(!validatename($lastname, $errors)){
		return false;
	}
	if(!validatename($username, $errors)){
		return false;
	}
    if(!validateemail($email)){
    	$errors['email'] = 'invalid';
    }
    if(!validatename($address, $errors)){
		return false;
	}
	//change birthdate to date form with php
	//$birthdate = date('Y-m-d', strtotime($birthdate));


	//create a formfill class
	$formfill = new formfill();
	if($formfill->save()){
		$msg['saveformfill'] = 'success';
		return true;
	}
	return false;
}


?>