<?php
// Start the session
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();
session_abort();

// Redirect to the login page or any other page you prefer  
header("Location: login-page.php");
exit();
?>