<!DOCTYPE html>

<html>
	<head>
	  <meta charset = "utf-8">
	  <title>Home Page</title>
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
	  <h3>Message of the Day</h3>
	  </div>
	  </div>
	  </div>
	</body>
</html>