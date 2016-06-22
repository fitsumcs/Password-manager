<?php

//include "itemsInterface.php";
//include_once "../control/connectivity.php";


class formfill{

	private $title;
	private $firstname;
	private $lastname;
	private $username;
	private $email;
	private $birthdate;
	private $gneder;
	private $address;
	private $formtype;

	function __construct($title, $firstname, $lastname, $username, $email, $birthdate, $gender, $address){
		$this->title = $title;
		$this->firstname = $firstname;
		$this->lastname = $lastname;
		$this->username = $username;
		$this->email = $email;
		$this->birthdate = $birthdate;
		$this->gender = $gender;
		$this->address = $address;
		$this->formtype = 'default';
	}

	//saves new formfill in user account
	static function save(){

		$user_id = $_SESSION['user_id'];
		$conn = connectDB();
		

		$query = "INSERT INTO formfills(user_id, title, firstname, lastname, username, email, birthdate, gender, address) VALUES ('$user_id', '$this->title', '$this->firstname', '$this->lastname', '$this->username', '$this->email', '$this->birthdate', '$this->gender', '$this->address')";
		if($conn->query($query)){
			return true;
		}
		return false;
	}

	//deletes selected formfill
	static function delete(){}

	//sets form fill as default
	static function setasdefault(){}

	//returns list of saved formfills
	static function browse(&$formfills){
		$conn = connectDB();
		$user_id = $_SESSION['user_id'];
		$query = "SELECT * FROM formfills WHERE user_id = $user_id";
		if($result = $conn->query($query)){
			$num_rows = $result->num_rows;
			for($x = 0; $x < $num_rows; $x++){
				$formfills[$x] = $result->fetch_assoc();
			}
			return true;
		}
		else{
			return false;
		}
	}
}
?>