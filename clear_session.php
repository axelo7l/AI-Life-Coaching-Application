<?php
session_start();
unset($_SESSION['UserID']); // Replace with your session variable name
header("Location: home.php"); // Redirect to the homepage or another page
exit();
?>
