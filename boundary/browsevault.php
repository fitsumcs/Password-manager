<?php
session_start();
//include "../control/datapuller.php";
//include "../control/datahandler.php";

//error varibles
$errors = array();
$msg = array();

$sites = array();


if(!isset($_SESSION['user_id'])){
	header("Location: index.php");
}

if(isset($_POST['btn-addsite'])){
	$foldername = $_POST['foldername'];
	$url = $_POST['url'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	if(empty($foldername)){
		$foldename = "unknown";
	}
	if(empty($url)){
		$errors['url'] = "empty";
		return;
	}
	if(empty($username)){
		$errors['username'] = "empty";
		return;
	}
	if(empty($password)){
		$errors['password'] = "empty";
		return;
	}


	//call function to add site from control/datahandler
	addsite($foldername, $url, $username, $password, $msg, $errors);
	

}

if(isset($_SESSION['editsite'])){
	//edit site
	//get edit site form
}



//include main header
include "includes/userheader.php";
?>


		

<!doctype html>
<html>
    <head>
        <title>index</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="css/browsevault.css">
        <link rel="stylesheet" href="css/site.css">
    </head>
    <body>
        
        
        <main>

<header>

<h2 style="line-height: 1.2">USER VAULT</h2>
	<form id = 'log-out' method="post" action="#">
			
</header>
<div id="special-tools">
	<ul id="generate-password">
		<form id='generate-password' methode="get" action="#">
			<label for="length">Password Length</label>
			<input type="number" name="length"/><br/>
			<input type="radio" name="strength" value="weak" checked> WEAK
            <input type="radio" name="strength" value="medium"> MEDIUM
            <input type="radio" name="strength" value="strong"> STRONG<br>
            <input type="submit" name="btn-generatepassword" value="GENERATE PASSWORD">
		</form>
	</ul>
	<ul id="search">
		<form id='search' method="post" action ="#">
			
			<input type='text' name="search-value" placeholder="search">
			<input type="submit" name="btn-search" value="Serach">
		</form>
	</ul>
		
</div>




                <section>
<input type="radio" id="site" class="hidden-nav" value="1" name="tractor" checked='checked' />    
<input type="radio" id="note" class="hidden-nav" value="2" name="tractor" />      
<input type="radio" id="formfill" class="hidden-nav" value="3" name="tractor" />
<input type="radio" id="books" class="hidden-nav" value="4" name="tractor" />
  
  <nav>   
  <label for="site" class='tab'>SITE</label>
  <label for="note" class='tab'>NOTE</label>
  <label for="formfill" class='tab'>FORM FILL</label>
      <!--
  <label for="books" class='tab'>BOOKS</label>
      -->
      <ul class="menu">
			
			<li><a href="#">Profile</a>
				<ul>
					<li><form method="post" action="#">
		<input type="submit" name="btn-logout" value="Log out"/><br>
	</form></li>
					
					<li><a href="#">Setting</a></li>
				</ul>
			</li>
			
			
		</ul>
  </nav>
  
  <article class='site'>
    
      
      <!-- ACCORDION -->
      
      <div class="accordion" style='width: 80%'>
    <ul>
        <li>
            <input type="radio" name="select" class="accordion-select" />
            <div class="accordion-title">
                <span>Social</span>
            </div>
            <div class="accordion-content">
                <ul id="accounts">
                    <li class="block"><h4>Social</h4>
                        <ul class="siteitems">
                            <li><p>Facebook</p><button>Launch</button><span>edit site</span> <span>delete site</span></li>
                            <li><p>Gmail</p><button>Launch</button><span>edit site</span> <span>delete site</span></li>
                        </ul>
                    </li>
                    <li class="block"><h4>Educational</h4>
                        <ul class="siteitems">
                            <li><p>Codecademy</p><button>Launch</button><span>edit site</span> <span>delete site</span></li>
                        </ul>
                    </li>
            
        </ul>
            </div>
            <div class="accordion-separator"></div>
        </li>
        <li>
            <input type="radio" name="select" class="accordion-select" />
            <div class="accordion-title">
                <span>Educational</span>
            </div>
            <div class="accordion-content">
                Content
            </div>
            <div class="accordion-separator"></div>
        </li>
        <li>
            <input type="radio" name="select" class="accordion-select" />
            <div class="accordion-title">
                <span>Other folder</span>
            </div>
            <div class="accordion-content">
                Content
            </div>
            <div class="accordion-separator"></div>
        </li>
        <li>
            <input type="radio" name="select" class="accordion-select" />
            <div class="accordion-title">
                <span>Mail box</span>
            </div>
            <div class="accordion-content">
                Content
            </div>
            <div class="accordion-separator"></div>
        </li>
        
    </ul>
          
</div>
      <center>
      <div class="additem">
          +
      </div>
    </center>
      
   
  </article>
  
  <article class='note'>
      <table>
          <tr>
              <td>Title</td>
              <td>Date</td>
          </tr>
          <tr>
              <td>
                  
                  <?php
                  displaynotes();
                  ?>
              </td>
          </tr>
      </table>
          
      
      <form method="post" action="#">
      <table>
          <tr>
              <td>Add Note</td>
          </tr>
          <tr>
              <td><label for='title'>Title</label><input type="text" name="title" placeholder="title"></td>
          </tr>
          <tr>
              <td><textarea rows="10" cols="30"></textarea></td>
          </tr>
          <tr>
          	<td>
          		<input type="submit" name="btn-savenote" value="Save Note">
          	</td>
          </tr>
      </table>
      </form>
      <center>
      <div class="additem">
          +
      </div>
          </center>
      
  </article>
  
  <article class='formfill'>
      
      <table>
          <center>
          <tr>
              <td>Title</td>
              <td>Date</td>
              <td>Type</td>
          </tr>
          <tr>
              <td>My form</td>
              <td>10/10/2060</td>
              <td>default</td>
          </tr>
          <tr>
              <td>My form</td>
              <td>10/10/2060</td>
              <td>default</td>
          </tr>
              
          </center>
      </table>
      
      <table class="addform">
            <tr>
                <td><label for="title">Title</label>
                <td><input type="text" name="title"></td>

            </tr>
            <tr>
                <td><label for="firstname">First Name</label>
                <td><input type="text" name="firstname"></td>

            </tr>
            <tr>
                <td><label for="lastname">Last Name</label>
                <td><input type="text" name="lastname"></td>

            </tr>
            <tr>
                <td><label for="username">User Name</label>
                <td><input type="text" name="username"></td>

            </tr>

            <tr>
                <td><label for="email">Email Address</label>
                <td><input type="email" name="email"></td>

            </tr>
            <tr>
                <td><label for="birthday">Birth Day</label></td>
                <td><input type="date" id="birthday" name="birthday" size="20" /></td>

            </tr>
            <tr id="gender">
                <td><label for="gender">Gender</label>
                <td>
                    <input type="radio" name="gender" value="male" checked> <p>Male</p>
                    <input type="radio" name="gender" value="female"> <p>Female</p>
                </td>


            </tr>
            <tr>
                <td><label for="address">Address</label>
                <td><input type="text" name="address"></td>

            </tr>
          
            <tr>
                
                <td colspan="2"><center><input type="submit" name="btn-addformfill" value="Save Form"/></center></td><!--
                <td><button type="submit" name="btn-addformfill" action="">Add Form</button></td>  use this for style only-->
                
            </tr>
              
        </table>
      
      <center>
      <div class="additem">
          +
      </div>
    </center>
        
  </article>
  
  <article class='books fontawesome-copy'>
    <p>this is list of books come on put some code here</p>
  </article>
</section>
            
            
        </main>
        <footer>
            footer
        </footer>
    </body>
</html>