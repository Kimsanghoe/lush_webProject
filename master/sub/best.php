<?php
    session_start();
    require("db_connect.php");

    $action = "insert.php";
    $p_code = $_REQUEST["p_code"] ?? "";

    if($p_code != ""){
        $query = $PDO->query("select * from product, category where product.c_code = category.c_code and $p_code = product.p_code");
        
        while($row = $query->fetch()){
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
    <link rel="stylesheet" href="../style/bootstrap-reboot.css">
    <link rel="stylesheet" href="../style/master.css">
    <link rel="stylesheet" href="../style/best.css">
    <title>R & K master</title>
</head>
<body>
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border:0;"><a href="../master.php" class="site_title"><img src="../img/R&K_logo.PNG" alt="none"></a></div>
                    <div class="clearfix"></div>
                    <div class="profile clearfix">
                        <div class="profile_info">
                            <?php if(empty($_SESSION["userId"])) { ?>
                                <form action="login.php" method="post" class="login">
                                    <h2>ID : </h2><input type="text" name="id"><br>
                                    <h2>PW : </h2><input type="password" name="pw"><br><br>
                                    <input type="submit" value="?????????" class="submit">
                                </form>
                            <?php } else { ?>
                                <div class="profile_pic">
                                    <img src="../img/alps-g92ff9d08f_1920.jpg" alt="none" class="img-circle profile_img">
                                </div>
                                <form action="logout.php" method="post">
                                    <span>Welcome</span>
                                    <h2><?=$_SESSION["userName"]?>???</h2>
                                    <input type="submit" value="????????????">
                                </form>
                            <?php } ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <br>
                    <div id="sidebar_menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>????????? ?????????<?=$p_code?></h3>
                            <ul class="nav side-menu" id="side-menu">
                                <li><a href="master.php">Home</a></li>
                                <li>
                                    <a href="#">????????????</a>
                                    <ul class="nav child_menu">
                                        <li><a href="sub/p_management.html?site=best">?????????</a></li>
                                        <li><a href="sub/p_management.html?site=new">?????????</a></li>
                                        <li><a href="sub/p_management.html?site=bath">??????</a></li>
                                        <li><a href="sub/p_management.html?site=body">??????</a></li>
                                        <li><a href="sub/p_management.html?site=shower">??????</a></li>
                                        <li><a href="sub/p_management.html?site=face">?????????</a></li>
                                        <li><a href="sub/p_management.html?site=hair">??????</a></li>
                                        <li><a href="sub/p_management.html?site=makeup">????????????</a></li>
                                        <li><a href="sub/p_management.html?site=perfume">??????</a></li>
                                        <li><a href="sub/p_management.html?site=gift">?????????</a></li>
                                        <li><a href="sub/p_management.html?site=vegan">??????</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right_col" role="main">
                <div class="row" style="display:inline-block;">
                    <div class="top_wrapper sub">
                        <div class="right">
                            <?php
                                $conn = mysqli_connect("127.0.0.1:3306", "root", "", "rnkDB");
                                $p_total = "select * from product";
                                $total_data = mysqli_query($conn, $p_total);                  
                                $total_rows = mysqli_num_rows($total_data);
                            
                                $p_sale = "select * from product where p_state='?????????'";
                                $sale_data = mysqli_query($conn, $p_sale);                  
                                $sale_rows = mysqli_num_rows($sale_data);
                            
                                $p_soldout = "select * from product where p_state='??????'";
                                $soldout_data = mysqli_query($conn, $p_soldout);                  
                                $soldout_rows = mysqli_num_rows($soldout_data);
                            
                                $p_pause = "select * from product where p_state='????????????'";
                                $pause_data = mysqli_query($conn, $p_pause);                  
                                $pause_rows = mysqli_num_rows($pause_data);
                            ?>
                            <div><a href="#">??????(<?=$total_rows?>)</a></div>
                            <div><a href="#">?????? ???(<?=$sale_rows?>)</a></div>
                            <div><a href="#">??????(<?=$soldout_rows?>)</a></div>
                            <div><a href="#">??????(<?=$pause_rows?>)</a></div>
                        </div>
                        <div class="left">
                            <div class="p_add_btn"><a href="javascript:void(0)" >?????? ??????</a></div>
                            <div class="p_delete_btn"><a href="javascript:void(0)">??????</a></div>
                            <div class="p_update_btn"><a href="javascript:void(0)">??????</a></div> 
                        </div>
                        <div class="product_add wrapper">
                            <form action="insert.php" id="insertForm">
                                <div class="table_box">
                                    <table>
                                        <tr>
                                            <th class="product_code" style="display: none;"></th>
                                            <th class="product_name">?????????</th>
                                            <th class="product_price_m" >?????????</th>
                                            <th class="product_category">????????????</th>
                                            <th class="product_state">??????</th>
                                            <th class="product_stock">??????</th>
                                            <th class="product_img1">?????? ?????????1</th>
                                            <th class="product_img1">?????? ?????????2</th>
                                            <th class="product_img1">?????? ?????????3</th>
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
                                                            if($p_add_category == $row["c_name"]){
                                                                $correct = "selected";
                                                            } else {
                                                                $correct = "";
                                                            }
                                                    ?>
                                                    <option value="<?=$correct?>"><?=$row["c_name"]?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select name="p_add_state" id="p_add_state">
                                                    <option value="?????????">?????????</option>
                                                    <option value="??????">??????</option>
                                                    <option value="????????????">????????????</option>
                                                </select>
                                            </td>
                                            <td><input type="text" name="p_add_stock" value="<?=$p_add_stock?>"></td>
                                            <td><input type="text" name="p_add_img1" value="<?=$p_add_img1?>"></td>
                                            <td><input type="text" name="p_add_img2" value="<?=$p_add_img2?>"></td>
                                            <td><input type="text" name="p_add_img3" value="<?=$p_add_img3?>"></td>
                                        </tr>
                                    </table>
                                    <button type="submit" form="insertForm" class="p_add_submit">??????</button>
                                    <div class="clear_both"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="search">
                    <form action="#" method="GET">
                        <div class="search_box">
                            <input type="text" name="search" placeholder="????????? ??????">
                            <button><img src="../img/search.png" alt="search"></button>
                        </div>
                    </form>
                </div>
                <div class="product_wrapper" style="margin-top: 18px">
                    <div class="table_box">
                        <table>
                            <tr>
                                <th class="product_select"></th>
                                <th class="num">No</th>
                                <th class="product_name">?????????</th>
                                <th class="product_price_m" >?????????</th>
                                <th class="product_category">????????????</th>
                                <th class="product_state">??????</th>
                                <th class="product_stock">??????</th>
                                <th class="product_added_date">?????????</th>
                                <th class="product_modify_date">?????????</th>
                            </tr>
                            <?php
                                $page = $_REQUEST["page"] ?? 1;
                                $listSize = 30;
                                $start = ($page-1) * $listSize;
                                
                                $query = $PDO->query("select * from product, category where product.c_code = category.c_code order by product.p_code desc limit $start, $listSize");
                                while($row = $query->fetch()) {
                                    if($row["p_dm"] == ""){
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
                        $numRecords = $PDO->query("select count(*) from product")->fetchColumn();
                        $totalPage = ceil($numRecords /$listSize);
                        
                        if ($lastLink > $totalPage) {
                            $lastLink = $totalPage;
                        }
                    ?>
                    <div class="pagination" style="width:680px;text-align:center;margin:10px auto;">
                        <?php
                            if($firstLink > 1){
                                $move = $lastLink -1;
                                echo "<a href=best.php?page={$move} class='aaa'>&lt</a> ";
                            }
                            
                            for($i = $firstLink; $i<= $lastLink; $i++){
                                if($i == $page){
                                    echo "<a href=best.php?page={$i}><u>$i</u></a> ";
                                }else{
                                    echo "<a href=best.php?page={$i}>$i</a> ";
                                }
                            }
                            if($lastLink < $totalPage){
                                $move = $lastLink +1;
                                echo "<a href=best.php?page={$move}>&gt</a>";
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