<?php 
    session_start();
	require("../php/db_connect.php");
    if(isset($_SESSION["userId"])){ 
	$p = $_REQUEST['p'];
	$tp = $_REQUEST['tp'];
	$uid = $_SESSION["userId"];

	$query = $PDO->query("select * from basket where uID = '$uid' and p_code='$p'");
	if($row = $query->fetch()){
		if($row['p_code']){
			echo "<script> alert('이미 등록된 상품입니다.');
			window.history.back();
			</script>";
		}
	}else{
		$PDO->exec("insert into basket (uID, p_code, p_quantity) values('$uid','$p','$tp')");	
		echo "
			<script>
				alert('장바구니에 등록되었습니다.');
				window.history.back();
			</script>";
	}
   	header("Location:product_view.php?p=".$p);
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
	<?php if(empty($_SESSION["userId"])){?>
	<script>
		alert('로그인 후 진행 해주세요.');
		history.back();
	</script>
	<?php } ?>
</body>
</html>