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
                    <?php include 'navbar.html'; ?>
                </div>

                <!-- Login Form -->
				<div class="fuckTabitha">
	  				<h3><center>Login</center></h3>
	  				
	  				<form method="post" action='#'>
					  	<ul style="list-style: none; text-align: left; width: 75%">
					  		<li style= "margin-bottom:10px; margin-left:300px;"><label>Username:<input name = "name" type = "text" size = "25" style="float:right; margin-right: 100px" required></label></li>
					  		<li style= "margin-bottom:10px; margin-left:300px;"><label>Password:<input name = "dapassword" type = "password" id= "password" size = "25" style=" float:right; margin-right: 100px" required></label></li>
					  	</ul>

						<!-- Login Button -->  	
					  	<p>
						   <input name = "submit" type = "submit" value = "Login">
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
								
								$uname=$_POST['name'];
								$upwd=$_POST['dapassword'];
								if($uname!=''&&$upwd!='')
								{
									//Construct query
									$query = "SELECT * FROM user WHERE Username ='".$uname."' and Password='".$upwd."'";
									//Execute query
									if(!($result = mysql_query($query, $database)))
									{
										print("<p>Could not execute query!</p>");
										die( mysql_error());
									}
									//$query=mysql_query("select * from user where name='".$name."' and password='".$pwd."'") or die(mysql_error());
								   	$res=mysql_fetch_row($result);
								   	if($res)
								   	{
								   		//session_start();
								   	 	$_SESSION['username']=$uname;
								   	 	$_SESSION['active_user']=TR;
								    	header('location: Home.php');
								   	}
								   	else
								   	{
								    	echo'The username or password you entered is incorrect';
								   	}
								}
								else
								{
									echo'Username and password are required fields';
								}
							}
					?>

				</div>
			</div>
		</div>	
	</body>
</html>