<?php
	// When the user clicks the logout button
	if (isset($_POST['submit'])) {
		session_start();
		// Delete session variables after logging out
		session_unset();
		// Destroy the ongoing session
		session_destroy();
		header("Location: ../index.php");
		exit();
	}
?>
