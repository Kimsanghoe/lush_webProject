<?php 
	session_start();
	unset($_SESSION["userId"]);
	unset($_SESSION["userName"]);
	header("Location:master.php");
	exit;	
?>