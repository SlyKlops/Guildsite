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
				<!-- Include Status display message -->
                <div class="status">
                    <?php include "statusbar.php"; ?>
                </div>
                
                <!-- Website banner image -->
                <div class="banners"></div> 
                
                <!-- Navigation Bar -->
                <div class="NavBar">
                    <!-- Include Navigation Bar -->
                    <?php include 'navbar.html'; ?>
                </div>
		
				<div class="Content">
					<!-- Change Password Form-->
					<h3><center>Change Password</center></h3>
						<ul style = "list-style:none; text-align: left; width: 75%;">
							<li style= "margin-bottom:10px; margin-left:300px;"><label>Old Password:<input type = "password" id= "password" size = "25" style=" float:right; margin-right: 100px" required></label></li>
							<li style= "margin-bottom:10px; margin-left:300px;"><label>New Password:<input type = "password" id= "password" size = "25" style=" float:right; margin-right: 100px" required></label></li>
							<li style= "margin-bottom:10px; margin-left:300px;"><label>Confirm Password:<input type = "password" id= "confirm_password" size = "25" 	style=" float:right; margin-right: 100px" required></label></li>
						</ul>
					<!-- Submit form button -->
					<p>
					   <input type = "submit" value = "Submit">
					</p>
				</div>
			</div>
		</div>
	</body>
</html>