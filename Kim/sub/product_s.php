<?php 
	
	require("db_connect.php");
	$numRecords = $db->query("select count(*) from product")->fetchColumn();
	
	switch($cate){
		case 'best':	
			$query = $db->query("select * from product, category where product.c_code = category.c_code order by product.p_code limit $start, $listSize");
			break;
			
		case 'best50':
			$query = $db->query("select * from best50, category where best50.c_code = category.c_code order by best50.p_code limit $start, $listSize");
			$numRecords = $db->query("select count(*) from best50")->fetchColumn();
			break;
		case 'domestic':
			$query = $db->query("select * from product, category where product.c_code = category.c_code order by product.p_code limit $start, $listSize");
			break;
		case 'naked':
			$query = $db->query("select * from product, category where product.c_code = category.c_code order by product.p_code limit $start, $listSize");
			break;
		case 'rushart':
			$query = $db->query("select * from product, category where product.c_code = category.c_code order by product.p_code limit $start, $listSize");
			break;
	}
?>

								