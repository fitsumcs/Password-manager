<?php


function generatepassword($seed, $strength){
	$password = "";
	$possible = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
	$alphanumeric = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	$minseed = 6;
	$maxseed = 12;
	$length = strlen($possible);
	

	for($a = 0; $a < $seed; $a++){
		
		$possible = str_shuffle($possible);
		$char = substr($possible, mt_rand(0, $length - 1), 1);
		//check if character is in the password
		if(!strstr($password, $char)){
		//	//its not used.
			$password .= $char;
		}
		//no else needed.
	}
	return $password;
}

function ratepassword($password, $strength){

	//password length
	if(strlen($password) < 6){
		$strength['length'] = "tooshort";
	}
	else if(strlen($password) > 12){
		$strength['length'] = "toolong";
	}
	else{
		$strength['length'] = "moderate";
	}

	//match numbers
	if(!preg_match("#[0-9]+#",$password)){
		$strength['number'] = "nonumber";
	}
	else{
		$strength['number'] = true;
	}

	//match small letter
	if(!preg_match("#[A-Z]+#", $password)){
		$strength['smallleter'] = 'nosmallleter';
	}
	else{
		$strength['smallleter'] = true;
	}
	if(!preg_match("#\W+#", $password)){
		$strength['symbol'] = "nosymbol";
	}
	else{
		$strength['symbol'] = true;
	}

	//and match all other known key words


}
?>