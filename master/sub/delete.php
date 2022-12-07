<?php
	session_start();
	
	require("db_connect.php");
	$p_code = $_REQUEST["p_code"];
	$PDO->exec("delete from product where p_code=$p_code");	
	
	header("Location:p_management.php?site=".$_SESSION["site_set"]);
	exit;
?>
<!--위 조건에 만족 하지 않을때만 아래가 실행된다.-->
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
		alert('상품을 선택해 주세요.');
		history.back();
	</script>
</body>
</html>