<?php
require("db_connect.php");
$conn = mysqli_connect("127.0.0.1:3307", "ksh", "1234", "kshdb");
switch($_SESSION['site_set']){
    case 'best':
        $p_total = "select * from best50";
        $p_sale = "select * from best50 where p_state='판매중'";
        $p_soldout = "select * from best50 where p_state='품절'";
        $p_pause = "select * from best50 where p_state='일시중지'";
        $numRecords = $db->query("select count(*) from best50")->fetchColumn();
        break;
    case 'new':
        $p_total = "select * from product where p_rd > DATE_ADD(now(), INTERVAL -30 DAY)";
        $p_sale = "select * from product where p_rd > DATE_ADD(now(), INTERVAL -30 DAY) and p_state='판매중'";
        $p_soldout = "select * from product where p_rd > DATE_ADD(now(), INTERVAL -30 DAY) and p_state='품절'";
        $p_pause = "select * from product where p_rd > DATE_ADD(now(), INTERVAL -30 DAY) and p_state='일시중지'";
        $numRecords = $db->query("select count(*) from product where p_rd > DATE_ADD(now(), INTERVAL -30 DAY)")->fetchColumn();
        break;
    case 'bath':
        $p_total = "select * from product where (c_code=1 or c_code=2 or c_code=3 or c_code=4)";
        $p_sale = "select * from product where (c_code=1 or c_code=2 or c_code=3 or c_code=4) and p_state='판매중'";
        $p_soldout = "select * from product where (c_code=1 or c_code=2 or c_code=3 or c_code=4) and p_state='품절'";
        $p_pause = "select * from product where (c_code=1 or c_code=2 or c_code=3 or c_code=4) and p_state='일시중지'";
        $numRecords = $db->query("select count(*) from product where (c_code=1 or c_code=2 or c_code=3 or c_code=4)")->fetchColumn();
        break;   
    case 'body':
        $p_total = "select * from product where (product.c_code=12 or product.c_code=13 or product.c_code=14 or product.c_code=15 or product.c_code=16 or product.c_code=17)";
        $p_sale = "select * from product where (product.c_code=12 or product.c_code=13 or product.c_code=14 or product.c_code=15 or product.c_code=16 or product.c_code=17) and p_state='판매중'";
        $p_soldout = "select * from product where (product.c_code=12 or product.c_code=13 or product.c_code=14 or product.c_code=15 or product.c_code=16 or product.c_code=17) and p_state='품절'";
        $p_pause = "select * from product where (product.c_code=12 or product.c_code=13 or product.c_code=14 or product.c_code=15 or product.c_code=16 or product.c_code=17) and p_state='일시중지'";
        $numRecords = $db->query("select count(*) from product where (product.c_code=12 or product.c_code=13 or product.c_code=14 or product.c_code=15 or product.c_code=16 or product.c_code=17)")->fetchColumn();
        break;
    case 'shower':
        $p_total = "select * from product where (product.c_code=5 or product.c_code=6 or product.c_code=7 or product.c_code=8 or product.c_code=9 or product.c_code=10 or product.c_code=11)";
        $p_sale = "select * from product where (product.c_code=5 or product.c_code=6 or product.c_code=7 or product.c_code=8 or product.c_code=9 or product.c_code=10 or product.c_code=11) and p_state='판매중'";
        $p_soldout = "select * from product where (product.c_code=5 or product.c_code=6 or product.c_code=7 or product.c_code=8 or product.c_code=9 or product.c_code=10 or product.c_code=11) and p_state='품절'";
        $p_pause = "select * from product where (product.c_code=5 or product.c_code=6 or product.c_code=7 or product.c_code=8 or product.c_code=9 or product.c_code=10 or product.c_code=11) and p_state='일시중지'";
        $numRecords = $db->query("select count(*) from product where (product.c_code=5 or product.c_code=6 or product.c_code=7 or product.c_code=8 or product.c_code=9 or product.c_code=10 or product.c_code=11)")->fetchColumn();
        break;
    case 'face':
        $p_total = "select * from product where (product.c_code=18 or product.c_code=19 or product.c_code=20 or product.c_code=21 or product.c_code=22 or product.c_code=23)";
        $p_sale = "select * from product where (product.c_code=18 or product.c_code=19 or product.c_code=20 or product.c_code=21 or product.c_code=22 or product.c_code=23) and p_state='판매중'";
        $p_soldout = "select * from product where (product.c_code=18 or product.c_code=19 or product.c_code=20 or product.c_code=21 or product.c_code=22 or product.c_code=23) and p_state='품절'";
        $p_pause = "select * from product where (product.c_code=18 or product.c_code=19 or product.c_code=20 or product.c_code=21 or product.c_code=22 or product.c_code=23) and p_state='일시중지'";
        $numRecords = $db->query("select count(*) from product where (product.c_code=18 or product.c_code=19 or product.c_code=20 or product.c_code=21 or product.c_code=22 or product.c_code=23)")->fetchColumn();
        break;
    case 'hair':
        $p_total = "select * from product where (product.c_code=24 or product.c_code=25 or product.c_code=26 or product.c_code=27 or product.c_code=28 or product.c_code=29)";
        $p_sale = "select * from product where (product.c_code=24 or product.c_code=25 or product.c_code=26 or product.c_code=27 or product.c_code=28 or product.c_code=29) and p_state='판매중'";
        $p_soldout = "select * from product where (product.c_code=24 or product.c_code=25 or product.c_code=26 or product.c_code=27 or product.c_code=28 or product.c_code=29) and p_state='품절'";
        $p_pause = "select * from product where (product.c_code=24 or product.c_code=25 or product.c_code=26 or product.c_code=27 or product.c_code=28 or product.c_code=29) and p_state='일시중지'";
        $numRecords = $db->query("select count(*) from product where (product.c_code=24 or product.c_code=25 or product.c_code=26 or product.c_code=27 or product.c_code=28 or product.c_code=29)")->fetchColumn();
        break;
    case 'makeup':
        $p_total = "select * from product where (product.c_code=35 or product.c_code=30 or product.c_code=31 or product.c_code=32 or product.c_code=33 or product.c_code=34)";
        $p_sale = "select * from product where (product.c_code=35 or product.c_code=30 or product.c_code=31 or product.c_code=32 or product.c_code=33 or product.c_code=34) and p_state='판매중'";
        $p_soldout = "select * from product where (product.c_code=35 or product.c_code=30 or product.c_code=31 or product.c_code=32 or product.c_code=33 or product.c_code=34) and p_state='품절'";
        $p_pause = "select * from product where (product.c_code=35 or product.c_code=30 or product.c_code=31 or product.c_code=32 or product.c_code=33 or product.c_code=34) and p_state='일시중지'";
        $numRecords = $db->query("select count(*) from product where (product.c_code=35 or product.c_code=30 or product.c_code=31 or product.c_code=32 or product.c_code=33 or product.c_code=34)")->fetchColumn();
        break;
    case 'perfume':
        $p_total = "select * from product where (product.c_code=36 or product.c_code=37 or product.c_code=38 or product.c_code=39 or product.c_code=40 or product.c_code=41)";
        $p_sale = "select * from product where (product.c_code=36 or product.c_code=37 or product.c_code=38 or product.c_code=39 or product.c_code=40 or product.c_code=41) and p_state='판매중'";
        $p_soldout = "select * from product where (product.c_code=36 or product.c_code=37 or product.c_code=38 or product.c_code=39 or product.c_code=40 or product.c_code=41) and p_state='품절'";
        $p_pause = "select * from product where (product.c_code=36 or product.c_code=37 or product.c_code=38 or product.c_code=39 or product.c_code=40 or product.c_code=41) and p_state='일시중지'";
        $numRecords = $db->query("select count(*) from product where (product.c_code=36 or product.c_code=37 or product.c_code=38 or product.c_code=39 or product.c_code=40 or product.c_code=41)")->fetchColumn();
        break;
    case 'gift':
        $p_total = "select * from product where (product.c_code=42 or product.c_code=43 or product.c_code=44 or product.c_code=45 or (product.r_price >= 10000 and product.r_price <= 39999) or (product.r_price >= 40000 and product.r_price <= 69999) or product.r_price >= 70000)";
        $p_sale = "select * from product where (product.c_code=42 or product.c_code=43 or product.c_code=44 or product.c_code=45 or (product.r_price >= 10000 and product.r_price <= 39999) or (product.r_price >= 40000 and product.r_price <= 69999) or product.r_price >= 70000) and p_state='판매중'";
        $p_soldout = "select * from product where (product.c_code=42 or product.c_code=43 or product.c_code=44 or product.c_code=45 or (product.r_price >= 10000 and product.r_price <= 39999) or (product.r_price >= 40000 and product.r_price <= 69999) or product.r_price >= 70000) and p_state='품절'";
        $p_pause = "select * from product where (product.c_code=42 or product.c_code=43 or product.c_code=44 or product.c_code=45 or (product.r_price >= 10000 and product.r_price <= 39999) or (product.r_price >= 40000 and product.r_price <= 69999) or product.r_price >= 70000) and p_state='일시중지'";
        $numRecords = $db->query("select count(*) from product where (product.c_code=42 or product.c_code=43 or product.c_code=44 or product.c_code=45 or (product.r_price >= 10000 and product.r_price <= 39999) or (product.r_price >= 40000 and product.r_price <= 69999) or product.r_price >= 70000)")->fetchColumn();
        break;
    case 'vegan':
        $p_total = "select * from product where p_img2 like '%null(19).png'";
        $p_sale = "select * from product where p_img2 like '%null(19).png' and p_state='판매중'";
        $p_soldout = "select * from product where p_img2 like '%null(19).png' and p_state='품절'";
        $p_pause = "select * from product where p_img2 like '%null(19).png' and p_state='일시중지'";
        $numRecords = $db->query("select count(*) from product where p_img2 like '%null(19)%'")->fetchColumn();
        break; 
}

$total_data = mysqli_query($conn, $p_total);                  
$total_rows = mysqli_num_rows($total_data);


$sale_data = mysqli_query($conn, $p_sale);                  
$sale_rows = mysqli_num_rows($sale_data);


$soldout_data = mysqli_query($conn, $p_soldout);                  
$soldout_rows = mysqli_num_rows($soldout_data);


$pause_data = mysqli_query($conn, $p_pause);                  
$pause_rows = mysqli_num_rows($pause_data);
?>