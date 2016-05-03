<!DOCTYPE html>
<html>
	<!-- Displays current logged in user -->
	<?php
		/* Check for Active Session */
		session_start();
			/* Check if user is logged in */
			if($_SESSION['active_user']==TRUE){
				$name = $_SESSION['username'];
				echo '<p style="display: inline;">Logged in as: '.$name.'<a href="signout.php"><button><h6>Logout</h6></button></a></p>';
			}
			elseif($_SESSION['active_user']==FALSE) {
				$name = 'Anonymous';
				echo '<p style="display: inline;">Viewing as: '.$name.'<a href="loginpage.php"><button><h6>Login</h6></button></a></p>';
			}
	?>
</html>