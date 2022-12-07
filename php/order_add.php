<?php 
        session_start();
        require("./db_connect.php");
        if(isset($_REQUEST["d"])) {
            $d = $_REQUEST["d"];
            $ds = explode(",", $d);
        }

        if(!isset($_SESSION["userId"])) {
            errMsg("로그인 후 진행해주세요.");
            exit;
        }

        $p = $_REQUEST["p"];
        $ps = explode(",", $p);
        $tp = $_REQUEST["tp"];
        $tps = explode(",", $tp);
        $q = $_REQUEST["q"];
        $qs = explode(",", $q); 
        $uid = $_SESSION["userId"];

        if($p && $tp && $q && $uid) {
            $query = $PDO->query("select * from order_list where uID = '$uid' order by order_s desc limit 1");
            
            while($row = $query->fetch()){
                $num = $row["order_s"] ? $row["order_s"] : 0;
            }

            $num = $num + 1;
            for($n = 0; $n < count($ps); $n++) {
                $PDO->exec("insert into order_list (p_code, order_s, o_quantity, uID, totalPrice) values('$ps[$n]', '$num', '$qs[$n]', '$uid', '$tps[$n]')");	
            }

            if(isset($ds)) {
                foreach($ds as $value) {
                    $PDO->exec("DELETE FROM basket WHERE basket_id = $value");
                }
            }

            header("Location:/rnk/orderComplete.php");
        } else {
            errMsg("선택된 제품이 없습니다.");
        }

        exit;
?>