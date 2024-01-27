<?php
// Start or resume the current session
session_start();

// Clear all session variables
$_SESSION = array();

// Destroy the session
session_destroy();
	
// Redirect to the login page or any other page
header("Location: login.php");
exit();
?>
