<?php require_once("Database_Connection.php");?>

<!DOCTYPE html>

<html>
	<head>
	  <meta charset = "utf-8">
	  <title>Registration Form</title>
	  <link rel="stylesheet" type="text/css" href="resources/css/headers.css">
	</head>

	<body>
	<div class="container">

	<!-- Website Banner -->
		<div class="banners"></div>
		  
		<!-- Begin Navigation Bar Section -->
	  <div class="NavBar">
		  <ul><center>
		  	<li>
		  		<a href="Home.html">
		  		<button class="NavButton">Home</button></a>
	  		</li>
		  	
		  	<li>
		  		<a href="Roster.html?">
		  		<button class="NavButton">Roster</button></a>
		  	</li>

		  	<li>
		  		<a href="registrationpage.html">
		  		<button class="NavButton">Registration</button></a>
		  	</li>

		  	<li>
		  		<a href="account.html">
		  		<button class="NavButton">Account</button></a>
		  	</li>
		  	<li>
		  		<a href="loginpage.html">
		  		<button class="NavButton">Login</button></a>
		  	</li>
		  </center></ul>
	  </div>
	  <!-- End Navigation Bar -->
		
		<div class="fuckTabitha">
		<h3><center>Registration</center></h3>
		<ul style = "list-style:none; text-align: left; width: 75%;">
			<li style= "margin-bottom:10px; margin-left:300px;"><label>Username:<input name = "name" type = "text" size = "25" style="float:right; margin-right: 100px" required></label></li>
			<li style= "margin-bottom:10px; margin-left:300px;"><label>E-mail:<input name = "email" type = "email" size = "25" style=" float:right; margin-right: 100px" required></label></li>
			<li style= "margin-bottom:10px; margin-left:300px;"><label>Password:<input type = "password" id= "password" size = "25" style=" float:right; margin-right: 100px" required></label></li>
			<li style= "margin-bottom:10px; margin-left:300px;"><label>Confirm Password:<input type = "password" id= "confirm_password" size = "25" 	style=" float:right; margin-right: 100px" required></label></li>
		</ul>

		<p>
		   <input type = "submit" value = "Submit">
		</p>
		</div>
		</div>
	</body>
</html>