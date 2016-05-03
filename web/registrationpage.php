<!DOCTYPE html>

<html>
	<head>
		<meta charset = "utf-8">
		<title>Registration Form</title>
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
					<!-- Registration Form -->
					<h3><center>Registration</center></h3>
						<form method="post" action="regform.php">
							<ul style = "list-style:none; text-align: left; width: 75%;">
								<li style= "margin-bottom:10px; margin-left:300px;"><label>Username:<input name = "name" type = "text" size = "25" style="float:right; margin-right: 100px" required></label></li>
								<li style= "margin-bottom:10px; margin-left:300px;"><label>E-mail:<input name = "email" type = "email" size = "25" style=" float:right; margin-right: 100px" required></label></li>
								<li style= "margin-bottom:10px; margin-left:300px;"><label>Password:<input name = "dapassword" type = "password" id= "password" size = "25" style=" float:right; margin-right: 100px" required></label></li>
								<li style= "margin-bottom:10px; margin-left:300px;"><label>Confirm Password:<input type = "password" id= "confirm_password" size = "25" 	style=" float:right; margin-right: 100px" required></label></li>
							</ul>
							<!-- Submit Button -->
							<p>
								<a href="loginpage.php">
								<button><input type = "submit" value="Submit"></button></a>
							</p>
						</form>
				</div>
			</div>
		</div>
	</body>
</html>