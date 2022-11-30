<?php
    $sd = $_REQUEST['startDate'] ??  "";
    $cd = $_REQUEST['currentDate'] ??  "";
?>

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
    <style>
        #section > div.sidebar > div:nth-child(2) > ul > li > a {color: #18a957;font-weight: 500;}
    </style>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
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
                    <?php $today = date("Y-m-d"); ?>
                    <form action="orderInquiry.php" id="date_form">
                        <input type="date" name="startDate" data-placeholder="날짜 선택" required aria-required="true">
                        <span>~</span>
                        <input type="date" name="currentDate" value="<?=$today?>">
                    </form>
                    <button form="date_form" class="black-btn">검색</button>
                </div>
            </div>
            <?php
                require("./php/db_connect.php");
                $uid = $_SESSION["userId"];
                $timestamp = strtotime("$cd +1 days");
                $cd = date("Y-m-d",$timestamp);

                if($sd && $cd) {
                    $query = $PDO->query("select * from order_list where uID = '$uid' and o_date >= '$sd' and o_date < '$cd' group by order_s order by order_s desc");
                } else {
                    $query = $PDO->query("select * from order_list where uID = '$uid' group by order_s order by order_s desc");
                }

                while($row = $query->fetch()) {
                    $num = $row["order_s"];
                    $dateVal = substr($row["o_date"], 0, 10);
            ?>
            <div class="order-table-wrap">
                <div class="order-table-title flex left">
                    <h2>일반배송</h2>
                    <p>주문일 : <?=$dateVal?> / 주문번호 : <span>K1002<?=$row["order_s"]?></span></p>
                    <span><a href="#">상세보기</a></span>
                </div>
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
                    <?php
                        $que = $PDO->query("select * from order_list o, product p, category c where o.p_code = p.p_code and c.c_code = p.c_code and uID = '$uid' and order_s = $num");
                        while($ro = $que->fetch()) {
                    ?>
                    <tbody>
                        <tr class="order-wrap">
                            <td class="item-info">
                                <img src="<?=$ro["p_img1"]?>" alt="none">
                                <div class="item-text">
                                    <p><?= $ro["p_name"]?></p>
                                    <p><?= $ro["c_name"]?></p>
                                </div>
                            </td>
                            <td class="item-price">
                                <p>￦ <span><?=$ro["r_price"]?></span></p>
                            </td>
                            <td class="item-amount">
                                <p><?= $ro["o_quantity"]?>개</p>
                            </td>
                            <td class="item-status">
                                <p class="done"><?=$ro["o_state"] == '0' ? "주문 완료" : "취소 완료"?></p>
                            </td>
                            <td class="item-setting">
                                <button class="review-write border-btn">리뷰 쓰기</button>
                            </td>
                        </tr>
                        <tr class="review-form-wrap">
                            <td colspan="5">
                                <form id="review-form" name="review-form" method="POST" action="./php/review_add.php" enctype="multipart/form-data">
                                    <p>제품은 어떠셨나요?</p>
                                    <input type="text" name="pCode" value="<?=$ro["p_code"]?>" style="display:none;">
                                    <fieldset class="review-rate">
                                        <input type="radio" name="rating" value="1" id="rate1<?=$ro['order_num']?>"><label for="rate1<?=$ro['order_num']?>">★</label>
                                        <input type="radio" name="rating" value="2" id="rate2<?=$ro['order_num']?>"><label for="rate2<?=$ro['order_num']?>">★</label>
                                        <input type="radio" name="rating" value="3" id="rate3<?=$ro['order_num']?>"><label for="rate3<?=$ro['order_num']?>">★</label>
                                        <input type="radio" name="rating" value="4" id="rate4<?=$ro['order_num']?>"><label for="rate4<?=$ro['order_num']?>">★</label>
                                        <input type="radio" name="rating" value="5" id="rate5<?=$ro['order_num']?>"><label for="rate5<?=$ro['order_num']?>">★</label>
                                    </fieldset>
                                    <textarea name="review-text" id="review-text" placeholder="제품의 후기를 남겨주세요"></textarea>
                                    <div class="filebox">
                                        <input class="upload-name" value="선택된 파일이 없습니다" placeholder="선택된 파일이 없습니다" readonly>
                                        <label for="file<?=$ro['order_num']?>">사진 첨부</label>
                                        <input type="file" id="file<?=$ro['order_num']?>" name="_reviewImg">
                                    </div>
                                    <button type="button" class="cancel-btn border-btn">취소</button>
                                    <button type="button" class="submit-btn" form="review-form<?=$ro["p_code"]?>">리뷰 작성하기</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                    <?php } ?>
                </table>
            </div>
            <?php } ?>
        </div>
    </section>

    <?php require_once("./component/footer.php");?>

    <script>
        $(document).ready(() => {
            $(".review-rate label").click(function() {
                $(this).attr('style', 'text-shadow: 0 0 0 #a00!important').prevAll().attr('style', 'text-shadow: 0 0 0 #a00!important');
                $(this).nextAll().attr('style', 'text-shadow: 0 0 0 #f0f0f0!important');
            });

            $(".filebox > input[type=file]").on('change', function() {
                var fileName = $(this).val().split('/').pop().split('\\').pop();
                $(".upload-name").val(fileName);
            });

            $(".review-write").click(function() {
                var thisRow = $(this).closest('tr');
                var review_tr = thisRow.next();

                if (review_tr.hasClass("on")) { 
                    review_tr.removeClass("on");
                } else {
                    review_tr.addClass("on");
                }
            });

            $(".cancel-btn").click(function() {
                var thisRow = $(this).closest('tr');
                if (thisRow.hasClass("on")) { 
                    thisRow.removeClass("on");
                }
            });

            $(".submit-btn").click(function() {
                var thisRow = $(this).closest('tr');
                thisRow.find("form").submit();
            });
        });
    </script>
</body>
</html>