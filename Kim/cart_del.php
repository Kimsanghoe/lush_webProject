<?php 
    session_start();
	require("php/db_connect.php");
	$p_code = $_REQUEST["p"];
    $p_codes = explode(",", $p_code);
    foreach($p_codes as $value){
        $PDO->exec("delete from basket where p_code=$value");
    }

    header("Location:cart.php");
  
?>