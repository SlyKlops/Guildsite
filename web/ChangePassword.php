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
                    <?php include 'navbar.php'; ?>
                </div>
		
				<div class="Content">
					<!-- Change Password Form-->
					<h3><center>Change Password</center></h3>

					<form method="post" action='#'>
						<ul style = "list-style:none; text-align: left; width: 75%;">
							<li style= "margin-bottom:10px; margin-left:300px;"><label>Old Password:<input name = "oldpwd" type = "password" id= "password" size = "25" style=" float:right; margin-right: 100px" required></label></li>
							<li style= "margin-bottom:10px; margin-left:300px;"><label>New Password:<input name = "newpwd" type = "password" id= "password" size = "25" style=" float:right; margin-right: 100px" required></label></li>
							<li style= "margin-bottom:10px; margin-left:300px;"><label>Confirm Password:<input name = "confpwd" type = "password" id= "confirm_password" size = "25" 	style=" float:right; margin-right: 100px" required></label></li>
						</ul>
						<!-- Submit form button -->
						<p>
						   <input name = "submit" type = "submit" value = "Submit">
						</p>
					</form>

					<!-- Input info to database -->
					<?php
						//session_start();
						if(isset($_POST['submit']))
							{
								//Connect to DB
								if(!($database = mysql_connect("localhost", "root", "myserver95")))
									die("Could not connect to database </body></html>");
								//Open slsite Database
								if(!mysql_select_db("slsite", $database))
									die( "<p>Could not open slsite database</p>");
								
								$uname=$_SESSION['username'];
								$oldpwd=$_POST['oldpwd'];
								$newpwd=$_POST['newpwd'];
								$confpwd=$_POST['confpwd'];

								if($oldpwd!=''&&$newpwd!=''&&$confpwd!='')
								{
									if($newpwd==$confpwd)
									{
										//Construct query
										$query = "SELECT * FROM user WHERE Username ='".$uname."' and Password='".$upwd."'";
										//Execute query
										if(!($result = mysql_query($query, $database)))
										{
											print("<p>Could not execute query!</p>");
											die( mysql_error());
										}
										//Update Password Query
										$query = "CALL `Change_Password`('$uname','$newpwd')";
										//Execute new query
										if(!($result = mysql_query($query, $database)))
										{
											print("<p>Could not execute query!</p>");
											die( mysql_error());
										}
										header('location: signout.php');
									}
									else
									{
										echo 'Passwords do not match';
									}
								}
								else
								{
									echo'All fields are required';
								}
							}
					?>
				</div>
			</div>
		</div>
	</body>
</html>