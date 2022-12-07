<?php
    switch($_SESSION['site_set']){
        case 'best':
            $query = $PDO->query("select * from best50, category where best50.c_code = category.c_code order by best50.p_code desc limit $start, $listSize");
            break;
        case 'new':
            $query = $PDO->query("select * from product, category where product.c_code = category.c_code and p_rd > DATE_ADD(now(), INTERVAL -30 DAY) order by p_rd DESC limit $start, $listSize");
            break;
        case 'bath':
            $query = $PDO->query("select * from product, category where product.c_code = category.c_code and (product.c_code=1 or product.c_code=2 or product.c_code=3 or product.c_code=4) order by product.p_code desc limit $start, $listSize");
            break;
        case 'body':
            $query = $PDO->query("select * from product, category where product.c_code = category.c_code and (product.c_code=12 or product.c_code=13 or product.c_code=14 or product.c_code=15 or product.c_code=16 or product.c_code=17) order by product.p_code desc limit $start, $listSize");
            break;
        case 'shower':
            $query = $PDO->query("select * from product, category where product.c_code = category.c_code and (product.c_code=5 or product.c_code=6 or product.c_code=7 or product.c_code=8 or product.c_code=9 or product.c_code=10 or product.c_code=11) order by product.p_code desc limit $start, $listSize");
            break;
        case 'face':
            $query = $PDO->query("select * from product, category where product.c_code = category.c_code and (product.c_code=18 or product.c_code=19 or product.c_code=20 or product.c_code=21 or product.c_code=22 or product.c_code=23) order by product.p_code desc limit $start, $listSize");
            break;
        case 'hair':
            $query = $PDO->query("select * from product, category where product.c_code = category.c_code and (product.c_code=24 or product.c_code=25 or product.c_code=26 or product.c_code=27 or product.c_code=28 or product.c_code=29) order by product.p_code desc limit $start, $listSize");
            break;
        case 'makeup':
            $query = $PDO->query("select * from product, category where product.c_code = category.c_code and (product.c_code=35 or product.c_code=30 or product.c_code=31 or product.c_code=32 or product.c_code=33 or product.c_code=34) order by product.p_code desc limit $start, $listSize");
            break;
        case 'perfume':
            $query = $PDO->query("select * from product, category where product.c_code = category.c_code and (product.c_code=36 or product.c_code=37 or product.c_code=38 or product.c_code=39 or product.c_code=40 or product.c_code=41) order by product.p_code desc limit $start, $listSize");
            break;
        case 'gift':
            $query = $PDO->query("select * from product, category where product.c_code = category.c_code and (product.c_code=42 or product.c_code=43 or product.c_code=44 or product.c_code=45 or (product.r_price >= 10000 and product.r_price <= 39999) or (product.r_price >= 40000 and product.r_price <= 69999) or product.r_price >= 70000) order by product.p_code desc limit $start, $listSize");
            break;
        case 'vegan':
            $query = $PDO->query("select * from product, category where product.c_code = category.c_code and p_img2 like '%null(19).png' order by product.p_code desc limit $start, $listSize");
            break;
    }
?>