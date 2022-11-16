<?php
	session_start();
	require("db_connect.php");
	$p_code = $_REQUEST["p_code"];
	
	
	


		
	$db->exec("delete from product where p_code=$p_code");	
	
	header("Location:p_management.html?site=".$_SESSION["site_set"]);
	exit;


?>
<!--위 조건에 만족 하지 않을때만 아래가 실행된다.-->
<!doctype html>
<html>
<head>
    <meta charset="utf-8">	
</head>
<body>		
	<script>
		alert('상품을 선택해 주세요.');
		history.back();
	</script>	
</body>
</html> 
