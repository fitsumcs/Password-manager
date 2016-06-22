<?php
include "../control/connectivity.php";

//$conn=connectDB();

class useraccount{
	function __construct(){}

	//$username;
	//$email;
	//$password;
	//$vault_id;
	//$user_id;	

	static function login($email, $password){
		$conn = connectDB();
		$user_id;
		$query = "SELECT * FROM users WHERE email = '$email'";
		if($result = $conn->query($query)){
			$row = $result->fetch_assoc();
			$user_id = $row['user_id'];
			
			
			if($password == $row['password']){
				
				return $user_id;
			}
		}
	}


	static function signup($username, $email, $password, &$msg, &$errors){

		$conn = connectDB();
		$query = "SELECT email FROM users WHERE email = '$email'";
		if($results = $conn->query($query)){
			
			$num_rows = $results->num_rows;
			if($num_rows != 0){
				$msg['signup'] = "fail";
				$msg['email'] = "exists";
				return false;
			}
			
		}
		
		//first make email confirmation

		
		$stmt = $conn->prepare("INSERT INTO users(username, email, password, active) VALUES(?, ?, ?, ?)");
		$stmt->bind_param("sssb", $username, $email, $password, $active);
		$username = $conn->real_escape_string($username);
		$email = $conn->real_escape_string($email);
		$password = $conn->real_escape_string($password);
		$active = 0;
		$stmt->execute();
		$user_id = $conn->insert_id;
		$stmt->close();
		


		//confirm email address confirmmail($user_id, $key, $email){}
		//$key = $username.$email.$date('mY');
		//$key = md5($key);
		//$query = "INSERT INTO confirm VALUES(null, $user_id, '$key', '$email')";
		//if($conn->query($query)){
		//	$confirm_id = $conn->insert_id;

		//}

		$msg['signup'] = "success";
		return true;
	}

	
	static function logout(){
		session_destroy();
		unset($_SESSION['user_id']);
		return true;
	}

	

	//manage forgotten passswords
	static function forgottenpassword($email){}
}
?>