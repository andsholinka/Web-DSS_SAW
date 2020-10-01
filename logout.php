<?php 

	session_start();
	// $_SESSION["login_id"];
	// $_SESSION["login_username"];

	// unset($_SESSION["login_id"]);
	// unset($_SESSION["login_username"]);
	$_SESSION = [];
	session_unset();
	session_destroy();

	header("location:login.php")


?>