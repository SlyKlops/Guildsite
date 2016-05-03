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
	  			<!-- Include Status display message -->
                <div class="status">
                    <?php include "statusbar.php"; ?>
                </div>
                
                <!-- Website banner image -->
                <div class="banners"></div> 
                
                <!-- Navigation Bar -->
                <div class="NavBar">
                    <!-- Include Navigation Bar -->
                    <?php include 'navbar.php'; ?>
                </div>

	  			<div class="Content">
	  				<?php 
	  					$error_message = $_SESSION['errormsg'];
	  					/*Display error message*/
	  					echo '<p style="text-align: center;">'.$error_message.'</p>';

	  					/*Redirect to login if login error*/
	  					if($error_message == 'You are not logged in!'){
	  						header('refresh:5; url=loginpage.php'); 
	  						echo '<p>Redirecting to login page...</p>';
	  					}
	  				?>
				</div>
			</div>
		</div>
	</body>
</html>