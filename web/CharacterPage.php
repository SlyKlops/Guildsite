<!DOCTYPE html>

<html>
	<head>
		<meta charset = "utf-8">
		<title>Character Page</title>
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
	   			
	   			<!-- Character Table Div -->
	   			<div class="Content">
	  				<table border="1" style="border: 5px solid black; width: 1000px">
		  				<tbody>
		  					<?php
                                $uname = $_SESSION['username'];
                                if(!$_GET['charname']){
                                	$cname = $_SESSION['characterName'];
                                }
                                else{
                                	$cname = $_GET['charname'];
                                	$_SESSION['characterName']=$cname;
                                }
                                //Construct Query
                                $query = "CALL `Get_CharacterInfo`('$cname')";
                                //Connect to DB
                                if(!($database = mysql_connect("localhost", "root", "myserver95")))
                                    die("Could not connect to database");
                                //Open slsite Database
                                if(!mysql_select_db("slsite", $database))
                                    die( "<p>Could not open slsite database</p>");
                                //Execute query
                                if(!($result = mysql_query($query, $database)))
                                {
                                    print("<p>Could not execute query!</p>");
                                    die( mysql_error());
                                }
                                $res=mysql_fetch_row($result);

                                $_SESSION['ctitle'] = $res[1];
                                $_SESSION['cclass'] = $res[2];
                                $_SESSION['clvl'] = $res[3];
                                $_SESSION['chp'] = $res[4];
                                $_SESSION['crsc'] = $res[5];

                                mysql_free_result($result);
                                mysql_close($database);
                            ?>  
					  		<tr>
					  			<td style="height: 15px; width: 100px; font-weight: bold">Character Name</td>
					  			<td style = "width: 100px;">
					  			<?php echo $_SESSION['characterName']; ?>
					  			</td>

					  			<th rowspan="10" style = "width: 500px; height: 500px;"><image src="resources/images/Whale_FullSize.png" alt="<Character Image>"></image>
					  			</th>
					  		</tr>

					  		<tr>
					  			<th>Title</th>
					  			<td>
					  			<?php echo $_SESSION['ctitle']; ?>
					  			</td>
					  		</tr>

					  		<tr>
					  			<th>Class</th>
					  			<td>
					  				<?php echo $_SESSION['cclass']; ?>
					  			</td>
					  		</tr>

					  		<tr>
					  			<th>Level</th>
					  			<td>
					  				<?php echo $_SESSION['clvl']; ?>
					  			</td>
					  		</tr>

					  		<tr>
					  			<td colspan = "2"></td>
					  		</tr>

					  		<tr>
					  			<th>HP</th>
					  			<td>
					  				<?php echo $_SESSION['chp']; ?>
					  			</td>
					  		</tr>

					  		<tr>
					  			<th>MP/WP/SP</th>
					  			<td>
					  				<?php echo $_SESSION['crsc']; ?>
					  			</td>
					  		</tr>

					  		<tr>
					  			<th>Skills?</th>
					  			<td>(Not currently Implemented)</td>
					  		</tr>

					  		<tr>
					  			<th>Production Lvls	?</th>
					  			<td>(Not currently Implemented)</td>
					  		</tr>
		  				</tbody>
	  				</table>
  				</div>

  				<!-- Featured Mount Div -->
  				<div class="Content">
			  		<table border="1" style="border: 5px solid black; width: 1000px;">
			  			<tbody>
				  			<tr>
				  				<th colspan="4">Featured Mount</th>
				  				<td rowspan="9" style = "width: 50px; height: 50px;" ><image src="resources/images/Whale_FullSize.png" alt="<Character Image>"></image></td>
				  			</tr>

				  			<tr>
				  				<th>Name:</th>
				  				<td>$filler</td>
				  				<th>Level:</th>
				  				<td>$filler</td>
				  			</tr>

				  			<tr>
				  				<th>Gender:</th>
				  				<td>$filler</td>
				  			</tr>

				  			<tr>
				  				<th>HP:</th>
				  				<td>$filler</td>
				  			</tr>

				  			<tr>
				  				<th>Stamina:</th>
				  				<td>$filler</td>
				  			</tr>
				  			<tr>
				  				<th>Max Weight:</th>
				  				<td>$filler</td>
				  			</tr>
				  			<tr>
				  				<td colspan="4" ></td>
				  			</tr>

				  			<tr>
				  				<th>Max Speed:</th>
				  				<td>$filler</td>
				  				<th>Turning:</th>
				  				<td>$filler</td>
				  			</tr>

				  			<tr>
				  				<th>Acceleration:</th>
				  				<td>$filler</td>
				  				<th>Braking:</th>
				  				<td>$filler</td>
				  			</tr>

			  			</tbody>
			  		</table>
			  	</div>

			  	<!-- Ability Tree Div -->
			  	<div class="title">
			  		<h2>Coming Soon: Ability Tree
			  		</h2>
			  	</div>
			  	<!-- Recent Activity Feed -->
			  	<div class="title">
			  		<h2> Coming Soon: Recent Activity</h2>
			  	</div>
  			</div>
  		</div>
	</body>
</html>