<?php
    session_start();

    $_SESSION["site_set"] = $_REQUEST["site"];
    $p_code = $_REQUEST["p_code"] ?? "";

    if($p_code != "") {
        $query = $PDO->query("select * from product, category where product.c_code = category.c_code and $p_code = product.p_code");
        while($row = $query->fetch()) {
            $p_add_code = $row["p_code"];
            $p_add_name = $row["p_name"];
            $p_add_price = $row["r_price"];
            $p_add_category = $row["c_name"];
            $p_add_state = $row["p_state"];
            $p_add_stock = $row["stock"];
            $p_add_img1 = $row["p_img1"];
            $p_add_img2 = $row["p_img2"];
            $p_add_img3 = $row["p_img3"];
        }
    } else {
        $p_add_code = "";
        $p_add_name = "";
        $p_add_price = "";
        $p_add_category = "";
        $p_add_state = "";
        $p_add_stock = "";
        $p_add_img1 = "";
        $p_add_img2 = "";
        $p_add_img3 = "";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../style/master.css" rel="stylesheet" type="text/css"/>
    <link href="../style/best.css" rel="stylesheet" type="text/css"/>
    <title>R & K master</title>
</head>
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="../master.php" class="site_title"><img src="../img/R&K_logo.PNG" /></a>
                    </div>
                    <div class="clearfix"></div>
                    <div class="profile clearfix">
                        <div class="profile_info">
                            <?php if(empty($_SESSION["userId"])) { ?>
                                <form action="../login.php" method="POST" class="login">
                                    <h2> ID &nbsp; : </h2><input type="text" name="id"><br>
                                    <h2> PW : </h2><input type="password" name="pw"><br><br>
                                    <input type="submit" value="로그인" class="submit">
                                </form>
                            <?php } else { ?>
                                <div class="profile_pic">
                                    <img src="/rnk/master/img/alps-g92ff9d08f_1920.jpg" alt="img" class="img-circle profile_img">
                                </div>
                                <form action="logout.php" method="POST" id="logoutForm">
                                    <span>Welcome!</span>
                                    <h2><?=$_SESSION["userName"]?>님</h2>
                                    <input type="submit" value="로그아웃" form="logoutForm">
                                </form>
                            <?php } ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>관리자 페이지 <?=$p_code?></h3>
                            <ul class="nav side-menu" id="side-menu">
                                <li><a href="../master.php">HOME</a></li>
                                <li>
                                    <a href="#">상품 관리</a>
                                    <ul class="nav child_menu">
                                        <li><a href="p_management.php?site=best">베스트</a></li>
                                        <li><a href="p_management.php?site=new">신제품</a></li>
                                        <li><a href="p_management.php?site=bath">배쓰</a></li>
                                        <li><a href="p_management.php?site=body">보디</a></li>
                                        <li><a href="p_management.php?site=shower">샤워</a></li>
                                        <li><a href="p_management.php?site=face">페이스</a></li>
                                        <li><a href="p_management.php?site=hair">헤어</a></li>
                                        <li><a href="p_management.php?site=makeup">메이크업</a></li>
                                        <li><a href="p_management.php?site=perfume">퍼퓸</a></li>
                                        <li><a href="p_management.php?site=gift">기프트</a></li>
                                        <li><a href="p_management.php?site=vegan">비건</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right_col" role="main">
                <div class="row" style="display: inline-block;">
                    <div class="top_wrapper">
                        <div class="right">
                            <?php include("count.php"); ?>
                            <div><a href="#">전체 (<?=$total_rows?>)</a></div>
                            <div><a href="#">판매 중 (<?=$sale_rows?>)</a></div>
                            <div><a href="#">품절 (<?=$soldout_rows?>)</a></div>
                            <div><a href="#">숨김 (<?=$pause_rows?>)</a></div>
                        </div>
                        <div class="left">
                            <div class="p_add_btn"><a href="javascript:void(0)" >제품 등록</a></div>
                            <div class="p_delete_btn"><a href="javascript:void(0)">삭제</a></div>
                            <div class="p_update_btn"><a href="javascript:void(0)">수정</a></div>
                        </div>
                        <div class="product_add_wrapper">
                            <form action="./insert.php" method="GET" id="insertForm">
                                <div class="table_box">
                                    <table>
                                        <tr>
                                            <th class="product_code" style="display: none;"></th>
                                            <th class="product_name">상품명</th>
                                            <th class="product_price_m" >판매가</th>
                                            <th class="product_category">카테고리</th>
                                            <th class="product_state">상태</th>
                                            <th class="product_stock">재고</th>
                                            <th class="product_img1">상품 이미지1</th>
                                            <th class="product_img1">상품 이미지2</th>
                                            <th class="product_img1">상품 이미지3</th>
                                        </tr>
                                        <tr>
                                            <td style="display: none;"><input type="text" name="p_add_code" value="<?=$p_add_code?>"></td>
                                            <td><input type="text" name="p_add_name" value="<?=$p_add_name?>"></td>
                                            <td><input type="text" name="p_add_price" value="<?=$p_add_price?>"></td>
                                            <td>
                                                <select name="p_add_category" id="p_add_category">
                                                    <?php
                                                        $query = $PDO->query("select * from category");

                                                        while($row = $query->fetch()) {
                                                            if($p_add_category == $row["c_name"]) {
                                                                $correct = "selected";
                                                            } else {
                                                                $correct = "";
                                                            }
                                                    ?>
                                                    <option <?=$correct?>><?=$row["c_name"]?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select name="p_add_state">
                                                    <option value="판매중">판매중</option>
                                                    <option value="품절">품절</option>
                                                    <option value="일시중지">일시중지</option>
                                                </select>
                                            </td>
                                            <td><input type="text" name="p_add_stock" value="<?=$p_add_stock?>"></td>
                                            <td><input type="text" name="p_add_img1" value="<?=$p_add_img1?>"></td>
                                            <td><input type="text" name="p_add_img2" value="<?=$p_add_img2?>"></td>
                                            <td><input type="text" name="p_add_img3" value="<?=$p_add_img3?>"></td>
                                        </tr>
                                    </table>
                                    <button type="submit" form="insertForm" class="p_add_submit">등록</button>
                                    <div class="clear_both"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="search">
                    <form action="#" method="GET">
                        <div class="search_box">
                            <input name="search" type="text" placeholder="상품명 검색">
                            <button><img src="../img/search.png" alt="검색"/></button>
                        </div>
                    </form>
                </div>
                <div class="product_wrapper" style="margin-top: 18px;">
                    <div class="table_box">
                        <table>
                            <tr>
                                <th class="product_select"></th>
                                <th class="num">No</th>
                                <th class="product_name">상품명</th>
                                <th class="product_price_m" >판매가</th>
                                <th class="product_category">카테고리</th>
                                <th class="product_state">상태</th>
                                <th class="product_stock">재고</th>
                                <th class="product_added_date">등록일</th>
                                <th class="product_modify_date">수정일</th>
                            </tr>
                            <?php
                                $page = $_REQUEST["page"] ?? 1;
                                $listSize = 30;
                                $start = ($page-1) * $listSize;

                                include("site.php");
                                while($row = $query->fetch()) {
                                    if($row["p_dm"] == "") {
                                        $row["p_dm"] = "-";
                                    }
                            ?>
                            <tr>
                                <td><input type="radio" id="update_radio" name="update_radio" value="<?=$row["p_code"]?>"></td>
                                <td><?=$row["p_code"]?></td>
                                <td><?=$row["p_name"]?></td>
                                <td><?=$row["r_price"]?></td>
                                <td><?=$row["c_name"]?></td>
                                <td><?=$row["p_state"]?></td>
                                <td><?=$row["stock"]?></td>
                                <td><?=$row["p_rd"]?></td>
                                <td><?=$row["p_dm"]?></td>
                            </tr>
                            <?php } ?>
                        </table>
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
                    <div class="pagination" style="width: 680px;text-align: center;margin: 10px auto;">
                        <?php
                            if($firstLink > 1) {
                                $move = $lastLink - 1;
                                echo "<a href=p_management.php?site={$_SESSION['site_set']}&page={$move} class='aaa'>&lt</a>";
                            }
                            
                            for($i = $firstLink; $i <= $lastLink; $i++) {
                                if($i == $page) {
                                    echo "<a href=p_management.php?site={$_SESSION['site_set']}&page={$i}><u>$i</u></a>";
                                } else {
                                    echo "<a href=p_management.php?site={$_SESSION['site_set']}&page={$i}>$i</a>";
                                }
                            }

                            if($lastLink < $totalPage) {
                                $move = $lastLink +1;
                                echo "<a href=p_management.php?site={$_SESSION['site_set']}&page={$move}>&gt</a>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="../js/jjj.js"></script>
</body>
</html>