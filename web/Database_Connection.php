<!DOCTYPE html>
<html>
<body>

<!-- Connect to Database -->
<?php
$localhost = "localhost";
$dbuser = "root";
$dbpass = "myserver95";
$dbname = "slsite";
	
	//echo "Attempting connection ...";

$connect = mysql_connect($localhost, $dbuser, $dbpass);
mysql_select_db("$dbname", $connect);
if(!$connect)
{
	die('Could not connect: '.mysql_error());
}
else {
	//echo 'Connected!';
}
?>

</body>
</html>