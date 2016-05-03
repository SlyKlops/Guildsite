<?php require_once 'Database_Connection.php'; ?>
<!DOCTYPE html>
<html>
	<body>

	<!-- Start Session, Initialize Session Variables -->
	<?php
		session_start();
		$_SESSION['active_user'] = FALSE;
		$_SESSION['username'] = 'Anonymous';
	?>

	</body>
</html>
