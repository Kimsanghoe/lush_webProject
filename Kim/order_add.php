<?php 
        session_start();
        require("php/db_connect.php");
        $p = $_REQUEST['p'];
        $ps = explode(",", $p);
        $tp = $_REQUEST["tp"];
        $tps = explode(",", $tp);
        $q = $_REQUEST['q'];
        $qs = explode(",", $q); 
        $uid = $_SESSION["userId"];

        $query = $PDO->query("select * from order_list where uID = '$uid' order by order_s desc limit 1");
        while($row = $query->fetch()){
            $num = $row["order_s"] ? $row["order_s"] : 0;
        }
        $num = $num + 1;
        for($n = 0; $n < count($ps); $n++){
            $PDO->exec("insert into order_list (p_code, order_s, o_quantity, uID, totalPrice) values('$ps[$n]', '$num', '$qs[$n]', '$uid', '$tps[$n]')");	
        }
        header("Location:orderComplete.php");
	    exit;
        
?>