<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/css/main.css" rel="stylesheet" type="text/css"/>
    <link href="style/css/reset.css" rel="stylesheet" type="text/css"/>
    <link href="style/css/font.css" rel="stylesheet" type="text/css "/>
    <link href="style/css/layout.css" rel="stylesheet" type="text/css "/>
    <link rel="stylesheet" href="style/myPage.css">
    <link rel="stylesheet" href="style/sidebar.css">
    <link rel="icon" type="image/png" sizes="192x192"  href="images/ico/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/ico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="images/ico/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/ico/favicon-16x16.png">
    <title>R & K</title>
</head>
<body>
    <?php require_once("./component/header.php");?>

    <section id="section" class="container flex">
        <!-- sidebar -->
        <?php require_once("./component/sidebar.php");?>

        <div class="content-space">
            <div class="user-box flex">
                <div class="user-info flex center">
                    <img src="https://www.lush.co.kr/upload/user_level/1/Logo%20(1).png" alt="levelImg">
                    <div>
                        <p class="user-name"><?=$_SESSION["userName"] ?? ""?>님</p>
                        <a href="#">회원정보 변경</a>
                        <br>
                        <a href="#">배송지 관리</a>
                    </div>
                </div>
                <div class="user-menu">
                    <ul class="flex">
                        <li class="benefit">
                            <p>혜택</p>
                            <a href="#"><span>0 장</span></a>
                        </li>
                        <li class="duczzi">
                            <p>덕찌력</p>
                            <a href="#"><span>0</span></a>
                        </li>
                        <li class="question">
                            <p>문의</p>
                            <a href="#"><span>0 건</span></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="order-ing">
                <p class="sub-page-title">진행 중인 주문<span class="sub-page-subtitle">최근 30일 내에 진행중인 주문정보입니다.</span></p>
                <ul class="flex">
                    <li>
                        <p>입금대기</p>
                        <span id="wating-deposit-cnt"">
                            <a href="#">0</a>
                        </span>
                    </li>
                    <li>
                        <p>결제완료</p>
                        <span id="wating-deposit-cnt"">
                            <a href="#">0</a>
                        </span>
                    </li>
                    <li>
                        <p>배송준비중</p>
                        <span id="wating-deposit-cnt"">
                            <a href="#">0</a>
                        </span>
                    </li>
                    <li>
                        <p>배송중</p>
                        <span id="wating-deposit-cnt"">
                            <a href="#">0</a>
                        </span>
                    </li>
                    <li>
                        <p>배송완료</p>
                        <span id="wating-deposit-cnt"">
                            <a href="#">0</a>
                        </span>
                    </li>
                    <li>
                        <p>구매확정</p>
                        <span id="wating-deposit-cnt"">
                            <a href="#">0</a>
                        </span>
                    </li>
                    <li>
                        <ul>
                            <li>
                                <span>취소</span>
                                <span><a href="#">0</a></span>
                            </li>
                            <li>
                                <span>교환</span>
                                <span><a href="#">0</a></span>
                            </li>
                            <li>
                                <span>반품</span>
                                <span><a href="#">0</a></span>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="recent-order">
                <p class="sub-page-title">최근 주문내역<span class="sub-page-subtitle">최근 30일 내에 주문하신 내역입니다.</span></p>
                <ul class="flex">
                    <li>
                        <p>최근 내역이 없습니다.</p>
                    </li>
                </ul>
            </div>
            <div class="recent-viewer">
                <p class="sub-page-title">최근 본 제품<span class="sub-page-subtitle">최근 30일 이내에 보신 제품입니다.</span></p>
                <ul class="flex">
                    <li>
                        <p>최근 본 제품이 없습니다.</p>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <?php require_once("./component/footer.php");?>
</body>
</html>