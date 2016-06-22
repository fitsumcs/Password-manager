<?php

//session may be started here

//include_once "../control/connectivity.php";

$user_id = $_SESSION['user_id'];
class folder{
	private $foldername;
	private $user_id;
	private $folder_id;

	function __construct($foldername){
		$this->user_id = $GLOBALS['user_id'];
		$this->foldername = $foldername;
		$this->folder_id = retrivefolder_id();
	}
	function retrivefolder_id(){
		$folder_id;
		$conn = connectDB();
		
		if(folderexists()){
			$query = "SELECT folder_id FROM folders WHERE user_id = $this->user_id AND foldername = $this->foldername";
			$result = $conn->query($query);
			$row = $result->fetch_assoc;
			$folder_id = $row['folder_id'];
			return $folder_id;
		}
		return null;
	}
	private function folderexists(){
		$conn = connectDB();
		$query = "SELECT foldename FROM folders WHERE user_id = $this->user_id AND foldername = $this->foldername";
		if($result = $conn->query($query)){
			if($result->num_rows > 0){
				return true;
			}
			else{
				return false;
			}
		}
	}

	function getfoldername(){}
	function getfolder_id(){}
}

?>