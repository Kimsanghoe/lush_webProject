<?php
    require("../php/db_connect.php");
    $numRecords = $PDO->query("select count(*) from product")->fetchColumn();

    switch($cate){
        case 'best':
            $query = $PDO->query("select * from product, category where product.c_code = category.c_code order by product.p_code desc limit $start, $listSize");
            break;
        case 'best50':
            $query = $PDO->query("select * from best50, category where best50.c_code = category.c_code order by best50.p_code limit $start, $listSize");
            $numRecords = $PDO->query("select count(*) from best50")->fetchColumn();
            break;
        case 'domestic':
            $query = $PDO->query("select * from product, category where product.c_code = category.c_code order by product.p_code limit $start, $listSize");
            break;
        case 'naked':
            $query = $PDO->query("select * from product, category where product.c_code = category.c_code order by product.p_code limit $start, $listSize");
            break;
        case 'rushart':
            $query = $PDO->query("select * from product, category where product.c_code = category.c_code order by product.p_code limit $start, $listSize");
            break;
    }
?>