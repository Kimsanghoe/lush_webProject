<?php 
	$db = new PDO("mysql:host=localhost;port=3307;dbname=kshdb", "ksh", "1234");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>