<?php
	session_start();
	require("db_connect.php");
	$p_add_code = $_REQUEST["p_add_code"];

	if($p_add_code != ""){
		$p_add_name = $_REQUEST["p_add_name"] ??"";
		$p_add_price = $_REQUEST["p_add_price"] ?? "";
		$p_add_category = $_REQUEST["p_add_category"] ?? "";
		$query = $db->query("select * from category");
		while($row = $query->fetch()){
			if($p_add_category == $row["c_name"]){
				$p_add_category = $row["c_code"];
			}
		}
		$p_add_state =  $_REQUEST["p_add_state"] ?? "";
		$p_add_stock = $_REQUEST["p_add_stock"] ?? "";
		$p_add_img1 = $_REQUEST["p_add_img1"] ?? "";
		$p_add_img2 = $_REQUEST["p_add_img2"] ?? "";
		$p_add_img3 = $_REQUEST["p_add_img3"] ?? "";

		if(($p_add_name && $p_add_price && $p_add_category && $p_add_img1)){
			
			$db->exec("update product set p_name='$p_add_name', r_price='$p_add_price', stock='$p_add_stock', p_state='$p_add_state', p_img1='$p_add_img1', p_img2='$p_add_img2', p_img3='$p_add_img3' where p_code=$p_add_code");						
			header("Location:p_management.html?site=".$_SESSION['site_set']);
			exit;
		}
	}else{
		$p_add_name = $_REQUEST["p_add_name"] ??"";
		$p_add_price = $_REQUEST["p_add_price"] ?? "";
		$p_add_category = $_REQUEST["p_add_category"] ?? "";
		$query = $db->query("select * from category");
		while($row = $query->fetch()){
			if($p_add_category == $row["c_name"]){
				$p_add_category = $row["c_code"];
			}
		}
		$p_add_state =  $_REQUEST["p_add_state"] ?? "";
		$p_add_stock = $_REQUEST["p_add_stock"] ?? "";
		$p_add_img1 = $_REQUEST["p_add_img1"] ?? "";
		$p_add_img2 = $_REQUEST["p_add_img2"] ?? "";
		$p_add_img3 = $_REQUEST["p_add_img3"] ?? "";
		
		
		if(($p_add_name && $p_add_price && $p_add_category && $p_add_img1)){
			
			$db->exec("insert into product (c_code, p_name, r_price, stock, `p_img1`, `p_img2`, `p_img3`) values('$p_add_category','$p_add_name','$p_add_price', '$p_add_stock', '$p_add_img1','$p_add_img2','$p_add_img3')");	
			
			header("Location:p_management.html?site=".$_SESSION['site_set']);
			exit;
		}
	}

?>
<!--위 조건에 만족 하지 않을때만 아래가 실행된다.-->
<!doctype html>
<html>
<head>
    <meta charset="utf-8">	
</head>
<body>		
	<script>
		alert('빈칸 없이 입력해야 합니다.');
		history.back();
	</script>	
</body>
</html> 
