<?php

session_start();
include "../control/datapuller.php";
include "../control/datahandler.php";

$errors = array();
$msg = array();

if(!isset($_SESSION['user_id'])){
	header("Location: index.php");

}

if(isset($_POST['btn-savenote'])){
	$title = $_POST['title'];
	$content = $_POST['content'];
	if(empty($title)){
		$errors['notetitle'] = "empty";
		if(empty($content)){
			$errors['notecontent'] = "empty";
		}
		return;
	}
	if(empty($content)){
		$errors['notecontent'] = "empty";
		return;
	}

	//call datahandler function to save new note
	addnote($title, $content, $msg, $errors);
}

if(isset($_POST['btn-deletenote'])){
	
}


include "includes/userheader.php";
?>