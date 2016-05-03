<html>
	<head>
		<title>Processing Form...</title>
	</head>
	
	<body>
		<?php
			session_start(); 
			$uname 	= $_SESSION['username'];
			$cname	= $_POST['name'];
			$ctitle = $_POST['title'];
			$cclass	= $_POST['class'];
			$clvl	= (int)$_POST['level'];
			$chp	= (int)$_POST['hp'];
			$crsc	= (int)$_POST['rsc'];

			//Construct Query
			$query 	= "CALL `Add_Character`( '".$uname."', '$cname', '$ctitle', '$cclass',".$clvl.", ".$chp.", ".$crsc." )";

			//Connect to DB
			if(!($database = mysql_connect("localhost", "root", "myserver95")))
				die("Could not connect to database </body></html>");
			//Open slsite Database
			if(!mysql_select_db("slsite", $database))
				die( "<p>Could not open slsite database</p>");
			//Execute query
			if(!($result = mysql_query($query, $database)))
			{
				print("<p>Could not execute query!</p>");
				die( mysql_error());
			}

			mysql_close($database);

			print("<p>Thanks for submitting your registration $uname!</p>
				<p>You should be redirected to the login page shortly.</p>");
			$_SESSION['characterName'] = $cname;
			header('Location: CharacterPage.php');
			die(); //Finish page
		?>
	</body>
</html>