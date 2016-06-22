<?php

//include "itmesInterface.php";
//include_once "../control/connectivity.php";
//include "AES.php";


class note{


	//$title;
	//$content;

	function __construct($title, $content){
		$this->title = $title;
		$this->content = $content;
	}
	
	//saves new note
	static function save(){
		$conn = connectDB();
		$query = "INSERT INTO notes(user_id, title, content) VALUES(?, ?, ?)";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("iss", $user_id, $title, $content);
		$user_id =$_SESSION['user_id'];
		$title = $this->title;
		$content = $this->content;
		$stmt->execute();
		$stmt->close();
		$conn->close();
	}

	//deletes selected note
	static function delete(){}

	//returns list of saved notes from user
	static function browse(&$notes){
		$conn = connectDB();
		$user_id = $_SESSION['user_id'];
		$query = "SELECT * FROM notes WHERE vault_id = 26";
		if($result = $conn->query($query)){
			$num_rows = $result->num_rows;
			for($x = 0; $x < $num_rows; $x++){
				$notes[$x] = $result->fetch_assoc();
			}
			return true;
		}
		else{
			return false;
		}
	}

}
?>