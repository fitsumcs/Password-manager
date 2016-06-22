<?php

//include "../control/connectivity.php";

class profile{


	function __construct(){}

	static function displayprofilepicture(){}

	static function changepassword(){}

	static function changepassword($user_id, $password){
		$conn = connectDB();
		$query = "UPDATE users SET password = $newpassword'";
		$res = $conn->query($query);
		//pass
	}
	static function grantemergencyaccess($subject_email, &$msg, &$errors){
		//code
		$conn = $GLOBALS['conn'];
		$query = "SELECT user_id FROM users WHERE email = $subject_email";
		$result = $conn->query($query);
		$row = $result->fetch_assoc();
		$subject_user_id = $row['user_id'];
		$user_id = $_SESSION['user_id'];
		$query = "UPDATE users emergency_id = $subject_user_id WHERE user_id = $user_id";
		$conn->query($query);
	}
}
?>