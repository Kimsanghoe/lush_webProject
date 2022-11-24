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
            <div class="order-title">
                <h2>주문/배송 조회</h2>
            </div>
            <div class="order-dateForm">
                <div class="formWrap flex left">
                    <span>기간별 조회</span>
                    <form action="" method="POST">
                        <input type="date" name="startDate" data-placeholder="날짜 선택" required aria-required="true">
                        <span>~</span>
                        <input type="date" name="currentDate" value="2022-11-24">
                    </form>
                    <button class="black-btn">검색</button>
                </div>
            </div>
            <div class="order-table-wrap">
                <div class="order-table-title flex left">
                    <h2>일반배송</h2>
                    <p>주문일 : 2022-11-24 / 주문번호 : <span>K1002LPG230073</span></p>
                    <span><a href="#">상세보기</a></span>
                </div>
                <form action="#">
                    <table class="order-table">
                        <colgroup>
                            <col width="35%">
                            <col width="auto">
                            <col width="auto">
                            <col width="auto">
                            <col width="auto">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>상품 정보</th>
                                <th>가격</th>
                                <th>수량</th>
                                <th>상태</th>
                                <th>관리</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="item-info">
                                    <img src="https://www.lush.co.kr/upload/item/15/20220929153226M.png" alt="none">
                                    <div class="item-text">
                                        <p>티 트리 워터</p>
                                        <p>토너</p>
                                    </div>
                                </td>
                                <td class="item-price">
                                    <p>￦ <span>16,000</span></p>
                                </td>
                                <td class="item-amount">
                                    <p>1개</p>
                                </td>
                                <td class="item-status">
                                    <p class="done">취소 완료</p>
                                </td>
                                <td class="item-setting">
                                    <button class="border-btn">내역보기</button>
                                </td>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr>
                                <td class="item-info">
                                    <img src="https://www.lush.co.kr/upload/item/15/20220929153226M.png" alt="none">
                                    <div class="item-text">
                                        <p>티 트리 워터</p>
                                        <p>토너</p>
                                    </div>
                                </td>
                                <td class="item-price">
                                    <p>￦ <span>16,000</span></p>
                                </td>
                                <td class="item-amount">
                                    <p>1개</p>
                                </td>
                                <td class="item-status">
                                    <p class="ing">배송 중</p>
                                </td>
                                <td class="item-setting">
                                    <button class="border-btn">내역보기</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="order-table-wrap">
                <div class="order-table-title flex left">
                    <h2>일반배송</h2>
                    <p>주문일 : 2022-11-23 / 주문번호 : <span>K1022KBS232053</span></p>
                    <span><a href="#">상세보기</a></span>
                </div>
                <form action="#">
                    <table class="order-table">
                        <colgroup>
                            <col width="35%">
                            <col width="auto">
                            <col width="auto">
                            <col width="auto">
                            <col width="auto">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>상품 정보</th>
                                <th>가격</th>
                                <th>수량</th>
                                <th>상태</th>
                                <th>관리</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="item-info">
                                    <img src="https://www.lush.co.kr/upload/item/15/20220929153226M.png" alt="none">
                                    <div class="item-text">
                                        <p>티 트리 워터</p>
                                        <p>토너</p>
                                    </div>
                                </td>
                                <td class="item-price">
                                    <p>￦ <span>16,000</span></p>
                                </td>
                                <td class="item-amount">
                                    <p>1개</p>
                                </td>
                                <td class="item-status">
                                    <p class="done">배송 완료</p>
                                </td>
                                <td class="item-setting">
                                    <button class="border-btn">내역보기</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </section>

    <?php require_once("./component/footer.php");?>
</body>
</html>