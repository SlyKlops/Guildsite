<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
		<title>Guild Roster</title>
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

    		<div class="title">
    			<h3><center>Guild Roster</center></h3>
    		</div>

        <!-- Character Roster Table -->
    		<div class="body"><center>
      		<table border="1" style="width: 100%; overflow: auto;">
      			<thead>
      				<tr>
        				<th>Rank</th>
        				<th>Character Name</th>
        				<th>Class</th>
        				<th>Level</th>
        				<th>Energy/CP</th>
      				</tr>
              <!-- PHP for populating table -->
              <?php 
                //Construct Query
                $query = "CALL `Get_Roster`()";
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

                while($data = mysql_fetch_row($result))
                {   
                    echo "<tr>";
                    echo "<td>".$data[1]."</td>";
                    echo '<td><a href=CharacterPage.php?charname='.urlencode($data[2]).' style="color:black">'.$data[2].'</a></td>';
                    echo "<td>".$data[3]."</td>";
                    echo "<td>".$data[4]."</td>";
                    echo "<td>100/150</td>";
                    echo "</tr>";
                }

                mysql_free_result($result);
                mysql_close($database);
              ?>
      			</thead>
      		</table></center>
        </div>

    		<div class="body">
          <!-- Guild Activity Table -->
      		<table border="1" style="float: left; width: 50%; border-style: solid; overflow: auto;  ">
      			<thead>
      				<tr>
      				<th>Name</th>
      				<th>Level</th>
      				<th>Points</th>
      				<th>Energy/CP</th>
      				</tr>
              <!-- PHP for populating table -->
              <?php 
                //Construct Query
                $query = "CALL `Get_Roster`()";
                //Connect to DB
                if(!($database = mysql_connect("localhost", "root", "myserver95")))
                    die("Could not connect to database");
                //Open slsite Database
                if(!mysql_select_db("slsite", $database))
                    die( "<p>Could not open slsite database</p>".mysql_error());
                //Execute query
                if(!($result = mysql_query($query, $database)))
                {
                    print("<p>Could not execute query!</p>");
                    die( mysql_error());
                }


                while($data = mysql_fetch_row($result))
                {   
                    echo "<tr>";
                    echo '<td><a href="CharacterPage.php" style="color:black">'.$data[2].'</a></td>';
                    echo "<td>".$data[4]."</td>";
                    echo "<td>0</td>";
                    echo "<td>100/150</td>";
                    echo "</tr>";
                }
                mysql_free_result($result);
                mysql_close($database);
              ?>
      			</thead>	
      		</table>
          <!-- Guild Quests -->
      		<table border="1" style="float: right; width: 50%; border-style: solid; overflow: auto;">
      			<thead>
      				<tr>
        				<th>Name</th>
        				<th>Level</th>
        				<th>Quests Helped</th>
      				</tr>

              <!-- PHP for populating table -->
              <?php 
                //Construct Query
                $query = "CALL `Get_Roster`()";
                //Connect to DB
                if(!($database = mysql_connect("localhost", "root", "myserver95")))
                    die("Could not connect to database");
                //Open slsite Database
                if(!mysql_select_db("slsite", $database))
                    die( "<p>Could not open slsite database</p>".mysql_error());
                //Execute query
                if(!($result = mysql_query($query, $database)))
                {
                    print("<p>Could not execute query!</p>");
                    die( mysql_error());
                }


                while($data = mysql_fetch_row($result))
                {   
                    echo "<tr>";
                    echo "<td>".$data[2]."</td>";
                    echo "<td>".$data[4]."</td>";
                    echo "<td>0</td>";
                    echo "</tr>";
                }
                mysql_free_result($result);
                mysql_close($database);
              ?>

      			</thead>
    		  </table>
        </div>
  		</div>
		</div>
	</body>
</html>