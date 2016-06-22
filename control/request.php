<?php
//include "connectivity.php";
//include "../entity/profile.php";
//include "datahandler.php";

//search
function search($search_value, &$search_result){
	$user_id = $_SESSION['user_id'];
	$conn = connectDB();
	//check for sql injection
	if(preg_match("/[A-Z  | a-z]+/", $search_value)){
		//execute the query
		$querysite = "SELECT * FROM sites WHERE title LIKE '%".$search_value."%' AND vault_id = 25";
		$queryform = "SELECT * FROM formfills WHERE title LIKE '%.$search_value AND user_id = $user_id";
		$querynote = "SELECT * FROM notes WHERE title LIKE '%'.$search_value AND user_id = $user_id";

		//not working though
		if($results = $conn->query($querysite)){
			
			$num_rows = $results->num_rows;
			for($x = 0; $x < $num_rows; $x++){
				$search_result[$x] = $results->fetch_assoc();
			}
		}
	}
	else{
		echo "invalid input of search value";
	}
	

}


//site auto login
function autologin(){}

//form auto fill


function autoformfill(){}


//launch saved site
function launchsite(){}

//to send mail to an email address
function send_email($name, $email, $password, $hash){
    $to      = $email; // Send email to our user
    $subject = 'Signup | Verification'; // Give the email a subject 
    $message = '
     
    Thanks for signing up!
    Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
     
    ------------------------
    Username: '.$name.'
    Password: '.$password.'
    ------------------------
     
    Please click this link to activate your account:
    http://localhost:4444/cbsproject/password manager/boundary/anytest.php?email='.$email.'&hash='.$hash.'
     
    '; // Our message above including the link
                         
    $headers = 'From:noreply@yourwebsite.com' . "\r\n"; // Set from headers
    mail($to, $subject, $message, $headers); // Send our email
}


//grant emergency access
function controlgrant_emergency_access($subject_email, &$msg, &$errors){
	//code here check if email exists and send notification to subject
	if(validateemail($subject_email)){
		grantemergencyaccess($subject_email, $msg, $errors);
		//if request sent seccussfully 
		$msg['emergency_request'] = "sent";
	}
	
}

function displaysites(){
	$sites = array();
	if(siteaccount::browse($sites)){
		$num_sites = count($sites);
		echo "<ul class = 'sites'>";
		foreach($sites as $site){
			$title = $site['title'];
			$url = $site['url'];
			$site_id = $site['site_id'];
			echo "<li id='".$site_id."'><p>".$title."</p><button>Launch</button></li>";
		}
		echo "</ul>";
	}
}


function displayformfills(){
	$formfills = array();
	if(formfill::browse($formfills)){
		$num_forms = count($formfills);
		echo "<ul class='forms'";
		foreach($formfills as $formfill){
			$title = $formfill['title'];
			$formtype = $formfill['formtype'];
			$form_id = $formfill['form_id'];
			echo "<li id'".$form_id."'$title<p><label>$formtype</label></p></li>";
		}
		echo "</ul>";
	}
}

function displaynotes(){
	$notes = array();
	if(note::browse($notes)){
		$num_notes = count($notes);
		echo "<ul class='noteitems'";
		foreach($notes as $note){
			$title = $note['title'];
			//$date = $note['date'];
			$date = '10/20/2010';
			//$note_id = $note['note_id'];
			$note_id = '20';
			echo "<input type='hidden' name='note_id' value=$note_id>";
			echo "<li>$title<li>";
			echo "<li class='date'>$date<span></span><span></span></li>";
		}
		echo "</ul>";
	}
}

?>