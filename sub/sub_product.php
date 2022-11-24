<?php
    session_start(); 
    $cate = $_REQUEST["cate"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/rnk/style/css/main.css" rel="stylesheet" type="text/css"/>
    <link href="/rnk/style/css/reset.css" rel="stylesheet" type="text/css"/>
    <link href="/rnk/style/css/font.css" rel="stylesheet" type="text/css "/>
    <link href="/rnk/style/css/layout.css" rel="stylesheet" type="text/css "/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="/rnk/style/css/style.css">
    <link rel="stylesheet" href="/rnk/style/sub_best.css">
    <title>R & K</title>
    <link rel="icon" type="../image/png" sizes="192x192"  href="/rnk/images/ico/android-icon-192x192.png">
    <link rel="icon" type="../image/png" sizes="32x32" href="/rnk/images/ico/favicon-32x32.png">
    <link rel="icon" type="../image/png" sizes="96x96" href="/rnk/images/ico/favicon-96x96.png">
    <link rel="icon" type="../image/png" sizes="16x16" href="/rnk/images/ico/favicon-16x16.png">
</head>
<body>
    <?php require_once("../component/header.php") ?>

    <article>
        <div class="main">
            <div class="category_depth clearbox">
                <ul class="list">
                    <li class="item">HOME</li>
                    <li>&nbsp;>&nbsp;</li>
                    <li class="item">제품</li>
                    <li>&nbsp;>&nbsp;</li>
                    <li class='item'>베스트</li>
                </ul>
            </div>
            <div class="goods_list_top clearbox">
                <div class="goods_list_summary">
                    <span class="sort_item on"><a href="#">전체</a></span>
                    <span class="sort_item "><a href="#">best50</a></span>
                    <span class="sort_item "><a href="#">주간 베스트</a></span>
                    <span class="sort_item "><a href="#">국내제조</a></span>
                    <span class="sort_item "><a href="#">네이키드</a></span>
                    <span class="sort_item "><a href="#">러쉬 아트 큐레이션</a></span>
                </div>
                <div class="goods_list_sort">
                    <span class="sort_item "><a href="#">추천순</a></span>
                    <span class="sort_item "><a href="#">최신순</a></span>
                    <span class="sort_item "><a href="#">낮은가격순</a></span>
                    <span class="sort_item "><a href="#">높은가격순</a></span>
                </div>
            </div>
            <div class="list">
                <ul class="list-wrap" style="position:relative;width:1224px;height:1888px;">
                <?php 
                    $page = $_REQUEST["page"] ?? 1;
                    $listSize = 16;
                    $start = ($page-1) * $listSize;
                    $left = 0;
                    $top =  0;
                    $cnt = 0;
                    $b50 = 0;
                    // require("../php/db_connect.php");
                    include("product_s.php");

                    while($row = $query->fetch()) {
                ?>
                <li class="list-item " style="position:absolute;left:<?=$left?>px;top:<?=$top?>px;">
                    <div class="item">
                        <a href="product_view.php?p=<?= $row["p_code"]?>" class="prd-img-box"><img src="<?=$row["p_img1"]?>" class="prd-img" alt="<?=$row["p_name"]?>"></a>
                        <div class="tag-box flex center">
                        <?php //p_img2,p_img3가 다 있을경우
                            if($row["p_img2"] && $row["p_img3"]){
                        ?>
                            <a href="javascript:;"><img src="<?= $row["p_img2"]?>" alt="none"></a>
                            <a href="javascript:;"><img src="<?= $row["p_img3"]?>" alt="none"></a>
                        <?php } elseif($row["p_img2"]){ //p_img2만 있는 경우 ?> 
                            <a href="javascript:;"><img src="<?= $row["p_img2"]?>" alt="none"></a>
                        <?php } else {echo "";} ?>
                        </div>
                        <a href="product_view.php?p=<?= $row["p_code"]?>" class="name"><?=$row["p_name"]?></a>
                        <a href="product_view.php?p=<?= $row["p_code"]?>" class="cate"><?=$row["c_name"]?></a>
                        <a href="product_view.php?p=<?= $row["p_code"]?>" class="price">￦<?=$row["r_price"]?></a>
                        <div class="item-mask" style="display: none; opacity: 1;"></div>
                    </div>
                    <div class="buttons" style="display: none; opacity: 1;">
                        <button type="button" name="likeBtn" onclick="Shop.addToWishList('1000003127', '1', 'false', '/categories/index/113','0','1')" class="like">좋아요</button>
                        <button type="button" name="cartBtn" onclick="Shop.addToCart('1000003127', '1', '1', 'false', '/categories/index/113','1', 'false', 'N')" class="basket">장바구니 담기</button>
                    </div>
                </li>
                <?php
                        $left = $left + 312;
                        $cnt = $cnt + 1;

                        if($cnt == 4) {
                            $top = $top + 464;
                            $left = 0;
                            $cnt = 0;
                        }
                    }
                ?>
                </ul>
            </div>
            <?php 
                $paginationSize = 5;
                $firstLink = floor(($page - 1) / $paginationSize) * $paginationSize + 1;
                $lastLink = $firstLink + $paginationSize -1;
                $totalPage = ceil($numRecords /$listSize);
                
                if ($lastLink > $totalPage) {
                    $lastLink = $totalPage;
                }
            ?>
            <div class='pagination' style="width:680px;text-align:center;margin:0 auto;">
                <?php
                    if($firstLink > 1) {
                        $move = $lastLink - 1;
                        echo "<a href=sub_product.php?page={$move}&cate={$cate} class='aaa'>&lt</a>";
                    }

                    for($i = $firstLink; $i <= $lastLink; $i++) {
                        if($i == $page) {
                            echo "<a href=sub_product.php?page={$i}&cate={$cate}><u>$i</u></a>";
                        } else {
                            echo "<a href=sub_product.php?page={$i}&cate={$cate}>$i</a>";
                        }
                    }

                    if($lastLink < $totalPage) {
                        $move = $lastLink + 1;
                        echo "<a href=sub_product.php?page={$move}&cate={$cate}>&gt</a>";
                    }
                ?>
            </div>
        </div>
    </article>

    <?php require_once("../component/footer.php")?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
</body>
</html>