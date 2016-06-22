<?php
session_start();

include "../control/datahandler.php";
include "../control/accounthandler.php";
include "../control/request.php";
include "includes/userheader.php";

$msg = array();
$errors = array();

if(isset($_POST['btn-grantemergencyaccess'])){
	$email = $_POST['subject-email'];
	controlgrant_emergency_access($email, $msg, $errors);
}
?>