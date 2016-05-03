<!DOCTYPE html>

<html>
	<head>
		<meta charset = "utf-8">
		<title>Home Page</title>
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
					<h3>Message of the Day</h3>
				</div>

				<div class="Content">
					<table border="1" style="width: 100%;">
						<thead>
							<th>News Feed</th>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>