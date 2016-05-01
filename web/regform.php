
<!DOCTYPE html>
<!-- processes information from registrationpage.html -->

<html>
<head>
	<title>Processing Form...</title>
</head>
<body>
	<?php 
		$uname 	= $_POST["name"];
		$uemail = $_POST["email"];
		$upwd	= $_POST["dapassword"];

		//Construct Query
		$query 	= "INSERT INTO USER" .
			"( Username, Email, Password )" .
			"VALUES ( '$uname', '$uemail', '$upwd')";

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
		header('Location: loginpage.html');
		die(); //Finish page
	?>
</body>
</html>
