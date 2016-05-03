<!DOCTYPE html>

<html>
	<head>
		<meta charset = "utf-8">
		<title>Create Character</title>
		<link rel="stylesheet" type="text/css" href="resources/css/headers.css">
	</head>

	<body>
		<div class="container">
		    <div class="wrapper">
		        
		        <!-- Include Status display message -->
		        <div class="status">
		            <?php include "statusbar.php"; ?>
		        </div>
		        
		        <!-- Display Error Message if Anonymous User accidentally gets to page -->
		        <?php 
		            if($_SESSION['active_user']==FALSE){
		                session_start();
		                $_SESSION['errormsg']='You are not logged in!';
		                header('Location: errorpage.php');
		            }
		        ?>

		        <!-- Website banner image -->
		        <div class="banners"></div> 
		        
		        <!-- Navigation Bar -->
		        <div class="NavBar">
		            <!-- Include Navigation Bar -->
		            <?php include 'navbar.php'; ?>
		        </div>
		
				<div class="Content">
					<h3><center>Create Character</center></h3>
					
					<form method="post" action="charform.php">
						<ul style = "list-style:none; text-align: left; width: 75%;">
							<li style= "margin-bottom:10px; margin-left:300px;"><label>Name:<input name = "name" type = "text" size = "25" style="float:right; margin-right: 100px" required></label></li>
							<li style= "margin-bottom:10px; margin-left:300px;"><label>Title:<input name = "title" type = "text" size = "25" style=" float:right; margin-right: 100px" required></label></li>
							<li style= "margin-bottom:10px; margin-left:300px;"><label>Class:<input name = "class" type = "text" size = "25" style=" float:right; margin-right: 100px" required></label></li>
							<li style= "margin-bottom:10px; margin-left:300px;"><label>Level:<input name = "level" type = "text" size = "25" 	style=" float:right; margin-right: 100px" required></label></li>
							<li style= "margin-bottom:10px; margin-left:300px;"><label>HP:<input name = "hp" type= "text" size = "25" 	style=" float:right; margin-right: 100px" required></label></li>
							<li style= "margin-bottom:10px; margin-left:300px;"><label>MP/WP/SP:<input name = "rsc" type= "text" size = "25" 	style=" float:right; margin-right: 100px" required></label></li>
						</ul>

						<p>
							<a href="loginpage.html">
						   <button><input type = "submit" value="Submit"></button></a>
						</p>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>