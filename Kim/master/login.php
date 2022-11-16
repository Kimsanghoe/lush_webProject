<?php session_start();?>
<?php
	$id = $_REQUEST["id"];
	$pw = $_REQUEST["pw"];
	
	$db = new PDO("mysql:host=localhost;port=3307;dbname=kshdb", "ksh", "1234");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$query = $db->query("select * from member where id='$id' and pw='$pw'");
	if($row = $query->fetch()){
		$_SESSION["userId"] = $row["id"];
		$_SESSION["userName"] = $row["name"];
		
		header("Location:master.html");
		exit;
	}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">	
</head>
<body>

<script>
	alert('ID 또는 PW 오류입니다.');
	history.back();
</script>
	
</body>
</html> 







