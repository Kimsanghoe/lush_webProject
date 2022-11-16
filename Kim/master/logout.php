<?php session_start();?>
<?php
		unset($_SESSION["userId"]);
		unset($_SESSION["userName"]);		
		
		header("Location:master.html");
		exit;	
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">	
</head>
<body>
	
</body>
</html> 







