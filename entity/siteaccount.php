<?php
//include "itemsInterface.php";
//include "folder.php";

$user_id = $_SESSION['user_id'];
class siteaccount{

	private $url;
	private $username;
	private $password;
	private $containingfolder;
	private $autologin;
	private $folder_id;
	private $user_id;

	/*
	function __construct($foldername, $url, $username, $password, $autologin){
		$this->containingfolder = $containingfolder;
		$this->url = $url;
		$this->username = $username;
		$this->password = $password;
		$this->autologin = $autologin;
	}
	*/

	function __construct($foldername, $url, $username, $password){
		$this->user_id = $GLOBALS['user_id'];
		$this->containingfolder = new folder($foldername);
		$this->url = $url;
		$this->username = $username;
		$this->password = $password;
		$this->autologin = true;
	}

	//saves new site
	function save(){
		//check folder exists
		if($containingfolder->folderexists()){
			//add site function createsite
			createsite();
			return true;

		}
		else{
			//save folder in to db or prompt the user weather to add to db
		}
		return false;
	}
	


	private function createsite(){
		$conn = connectDB();
		$query = "INSERT INTO sites(user_id, folder_id, foldername, url, title, username, password, autologin) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("iisssssi", $user_id, $folder_id, $foldername, $url, $title, $username, $password, $autologin);
		$user_id =$this->user_id;
		$folder_id = $this->folder_id;
		$url = $this->url;
		$title = $this->title;
		$username = $this->username;
		$password = $this->password;
		$autologin = $this->autologin;
		$stmt->execute();
		$stmt->close();
		$conn->close();

	}

	//deletes selected account
	static function delete(){}


	//browse vault;

	static function browse(&$sites){
		$conn = connectDB();
		$user_id = $_SESSION['user_id'];
		$query = "SELECT * FROM sites WHERE user_id = $user_id";
		if($result = $conn->query($query)){
			$num_rows = $result->num_rows;
			for($x = 0; $x < $num_rows; $x++){
				$sites[$x] = $result->fetch_assoc();
			}
			return true;
		}
		else{
			return false;
		}
	}

}
?>