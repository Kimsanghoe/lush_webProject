<?php
	session_start();
	$id = $_REQUEST["id"];
	$pw = $_REQUEST["pw"];
	
	require("sub/db_connect.php");
	
	$query = $PDO->query("select * from member where id='$id' and pw='$pw'");
	
	if($row = $query->fetch()){
		$_SESSION["userId"] = $row["id"];
		$_SESSION["userName"] = $row["name"];
		
		header("Location:master.php");
		exit;
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<script>
		alert('ID 또는 PW 오류입니다.');
		history.back();
	</script>
</body>
</html>