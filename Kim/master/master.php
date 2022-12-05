<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/master.css">
    <title>R & K master</title>
</head>
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border:0;"><a href="master.php" class="site_title"><img src="img/R&K_logo.PNG" alt="none"></a></div>
                    <div class="clearfix"></div>
                    <div class="profile clearfix">
                        <div class="profile_info">
                            <?php if(empty($_SESSION["userId"])) { ?>
                                <form action="login.php" method="post" class="login">
                                    <h2>ID : </h2><input type="text" name="id"><br>
                                    <h2>PW : </h2><input type="password" name="pw"><br><br>
                                    <input type="submit" value="로그인" class="submit">
                                </form>
                            <?php } else { ?>
                                <div class="profile_pic">
                                    <img src="img/alps-g92ff9d08f_1920.jpg" alt="none" class="img-circle profile_img">
                                </div>
                                <form action="logout.php" method="post">
                                    <span>Welcome</span>
                                    <h2><?=$_SESSION["userName"]?>님</h2>
                                    <input type="submit" value="로그아웃">
                                </form>
                            <?php } ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <br>
                    <div id="sidebar_menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>관리자 페이지</h3>
                            <ul class="nav side-menu" id="side-menu">
                                <li><a href="master.php">Home</a></li>
                                <li>
                                    <a href="#">상품관리</a>
                                    <ul class="nav child_menu">
                                        <li><a href="sub/p_management.php?site=best">베스트</a></li>
                                        <li><a href="sub/p_management.php?site=new">신제품</a></li>
                                        <li><a href="sub/p_management.php?site=bath">배쓰</a></li>
                                        <li><a href="sub/p_management.php?site=body">보디</a></li>
                                        <li><a href="sub/p_management.php?site=shower">샤워</a></li>
                                        <li><a href="sub/p_management.php?site=face">페이스</a></li>
                                        <li><a href="sub/p_management.php?site=hair">헤어</a></li>
                                        <li><a href="sub/p_management.php?site=makeup">메이크업</a></li>
                                        <li><a href="sub/p_management.php?site=perfume">퍼퓸</a></li>
                                        <li><a href="sub/p_management.php?site=gift">기프트</a></li>
                                        <li><a href="sub/p_management.php?site=vegan">비건</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right_col" role="main" style="min-height:750px">
                <div class="row">
                    <div class="top_wrapper" style="background-color:#222;border-radius:10px;">
                        <div class="right">
                            <div><img src="img/81_R&K_logo.png" alt="none" class="img-circle"></div>
                            <div class="right_text">
                                <span>R & K<br></span>
                                <p><a href="/rnk/mainPage.php">https://www.r&k.co.kr</a></p>
                            </div>
                        </div>
                        <div class="left"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="delivery_wrapper" style="background-color:#222; border-radius: 10px;">
                        <div class="delivery_text wrapper_text">
                            <span>배송 진행 상황</span>
                            <p>모두 보기</p>
                        </div>
                        <?php 
                            require("sub/db_connect.php");
                            $dvWait = $PDO->query("select count(*) from order_list where o_state = 2")->fetchColumn();
                            $dvIng = $PDO->query("select count(*) from order_list where o_state = 3")->fetchColumn();
                            $dvDone = $PDO->query("select count(*) from order_list where o_state = 0")->fetchColumn();
                            $dvLate = $PDO->query("select count(*) from order_list where o_state = 4")->fetchColumn();
                            
                        ?>
                        <div class="delivery_progress_wrapper">
                            <div class="delivery_progress wait">
                                <span><?= $dvWait?></span>
                                <p>배송 대기중</p>
                            </div>
                            <div class="delivery_progress ing">
                                <span><?= $dvIng?></span>
                                <p>배송 중</p>
                            </div>
                            <div class="delivery_progress completion">
                                <span><?= $dvDone?></span>
                                <p>배송 완료</p>
                            </div>
                            <div class="delivery_progress delay">
                                <span><?= $dvLate?></span>
                                <p>배송 지연</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="js/jjj.js"></script>
</body>
</html>