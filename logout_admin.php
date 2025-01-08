<?php
session_start();
session_destroy(); // Destroy the session to log the user out
header("Location: login admin.php"); // Redirect to the homepage
exit();
?>

