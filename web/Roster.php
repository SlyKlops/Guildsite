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
            <?php include 'navbar.html'; ?>
        </div>

    		<div class="title">
    			<h3><center>Guild Roster</center></h3>
    		</div>

        <!-- Character Roster Table -->
    		<div class="body"><center>
      		<table border="1" style="width: 100%;">
      			<thead>
      				<tr>
      				<th>Rank</th>
      				<th>Character Name</th>
      				<th>Class</th>
      				<th>Level</th>
      				<th>Energy/CP</th>
      				</tr>
      			</thead>
      		</table></center>
        </div>

    		<div class="body">
          <!-- Guild Activity Table -->
      		<table border="1" style="float: left; width: 50%; border-style: solid;">
      			<thead>
      				<tr>
      				<th>Name</th>
      				<th>Level</th>
      				<th>Points</th>
      				<th>Energy/CP</th>
      				</tr>
      			</thead>	
      		</table>
          <!-- Guild Quests -->
      		<table border="1" style="float: right; width: 50%; border-style: solid;">
      			<thead>
      				<tr>
        				<th>Name</th>
        				<th>Level</th>
        				<th>Quests Helped</th>
      				</tr>
      			</thead>
    		  </table>
        </div>
  		</div>
		</div>
	</body>
</html>