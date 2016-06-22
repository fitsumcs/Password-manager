<?php


include 'includes/indexheader.php';
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HOME-Password manager</title>
<link rel="stylesheet" href="css/index.css" type="text/css" />
    <style>
        
    </style>
</head>
<body>
<header>
	<nav>
		<ul>
			<li><a href="">Your LOGO</a></li>
			<li><a href="">Home</a></li>
			<li><a href="">Sign UP</a></li>
			<li><a href="">Log In</a></li>
			<li><a href="">About Us</a></li>
		</ul>
	</nav>
</header><main>


<div id="main-form">
<center>
<div id="login-form">
	<form method="post" action="#">
		<table id="signin-table">
			<tr>
				<td><label for="email">Email</label></td>
				<td><input type="email" name="email" maxlength="25" required/></td>
			</tr>
			<tr>
				<td><label for="password">Password</label></td>
				<td><input type="password" name="password" maxlength="25" required/></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<button type="submit" name="btn-login"> Sign In</button>
				</td>
			</tr>
		</table>
	</form>
</div>
<div id="signup-form">
	<form method="post" action="#">
		<table id="signup-table">
			<tr>
				<td><label for="susername">User Name</label></td>
				<td><input type="text" name="susername" maxlength="25"/></td>
			</tr>
			<tr>
				<td><label for="semail">Email</label></td>
				<td><input type="text" name="semail" maxlength="25" required/></td>
			</tr>
			<tr>
				<td><label for="spassword">Password</label></td>
				<td><input type="password" name="spassword" maxlength="25" required/></td>
			</tr>
			<tr>
				<td><label for="sconfirmpassword">Confirm Password</label></td>
				<td><input type="password" name="sconfirmpassword" maxlength="25" required>
			</tr>
			<tr>
				<td>
					<td><button type="submit" name="btn-signup">Sign Up</button></td>
            </tr>
        </table>
    </form>
    </div>
    </center>
    </div>
    </main>
    </body>
</html>