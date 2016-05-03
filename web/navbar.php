<!DOCTYPE html>
<html>

<!-- Begin Navigation Bar Section -->
		  <ul><center>
		  	<li>
		  		<a href="Home.php">
		  		<button class="NavButton">Home</button></a>
	  		</li>
		  	
		  	<li>
		  		<a href="Roster.php">
		  		<button class="NavButton">Roster</button></a>
		  	</li>

		  	<li>
		  		<a href="registrationpage.php">
		  		<button class="NavButton">Registration</button></a>
		  	</li>

		  	<li>
		  		<?php
		  			/* IF logged in, display button */
		  			if($_SESSION['active_user']==TRUE){
		  				echo '<a href="account.php">
			  		<button class="NavButton">Account</button></a>';
		  			}
		  			/* If not logged in, disable button */
		  			elseif($_SESSION['active_user']==FALSE){
		  				echo '<a href="account.php">
			  		<button class="NavButton" style="opacity: 0.6; cursor: not-allowed" disabled>Account</button></a>';
		  			}
		  		?>
		  	</li>
		  	<li>
		  		<a href="loginpage.php">
		  		<button class="NavButton">Login</button></a>
		  	</li>
		  </center></ul>
	  <!-- End Navigation Bar -->

</html>