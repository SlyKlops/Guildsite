<!DOCTYPE html>

<html>
	<head>
	  <meta charset = "utf-8">
	  <title>Change Password</title>
	  <link rel="stylesheet" type="text/css" href="resources/css/headers.css">
	</head>

	<body>
	<div class="container">
	  <div class="wrapper">
	<div class="status">
		  	<p style="display: inline;">Logged in as:
				<?php 
					session_start();
					$name = $_SESSION['username']; 
					echo $name; 
				?>
				<a href="signout.php"><button><h6>Logout</h6></button></a>
			</p>
		</div>
	<!-- Website Banner -->
		<div class="banners"></div>
		  
		<!-- Begin Navigation Bar Section -->
	  <div class="NavBar">
		  <ul><center>
		  	<li>
		  		<a href="Home.php">
		  		<button class="NavButton">Home</button></a>
	  		</li>
		  	
		  	<li>
		  		<a href="Roster.php">
		  		<button class="NavButton">Roster</button></a>
		  	</li>

		  	<li>
		  		<a href="registrationpage.php">
		  		<button class="NavButton">Registration</button></a>
		  	</li>

		  	<li>
		  		<a href="account.php">
		  		<button class="NavButton">Account</button></a>
		  	</li>
		  	<li>
		  		<a href="loginpage.php">
		  		<button class="NavButton">Login</button></a>
		  	</li>
		  </center></ul>
	  </div>
	  <!-- End Navigation Bar -->
		
		<div class="fuckTabitha">
		<h3><center>Change Password</center></h3>
		<ul style = "list-style:none; text-align: left; width: 75%;">
			<li style= "margin-bottom:10px; margin-left:300px;"><label>Old Password:<input type = "password" id= "password" size = "25" style=" float:right; margin-right: 100px" required></label></li>
			<li style= "margin-bottom:10px; margin-left:300px;"><label>New Password:<input type = "password" id= "password" size = "25" style=" float:right; margin-right: 100px" required></label></li>
			<li style= "margin-bottom:10px; margin-left:300px;"><label>Confirm Password:<input type = "password" id= "confirm_password" size = "25" 	style=" float:right; margin-right: 100px" required></label></li>
		</ul>

		<p>
		   <input type = "submit" value = "Submit">
		</p>
		</div>
		</div>
		</div>
	</body>
</html>