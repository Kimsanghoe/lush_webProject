<?php 
    if(session_id() == ''){
        session_start();
    }
    if(empty($_SESSION["userId"])){?>
        <script>
            alert('로그인 후 진행 해주세요.');
            history.back();
        </script>
<?php } ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/css/main.css" rel="stylesheet" type="text/css"/>
    <link href="style/css/reset.css" rel="stylesheet" type="text/css"/>
    <link href="style/css/font.css" rel="stylesheet" type="text/css "/>
    <link href="style/css/layout.css" rel="stylesheet" type="text/css "/>
    <link rel="stylesheet" href="style/cart.css">
    <link rel="icon" type="image/png" sizes="192x192"  href="images/ico/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/ico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="images/ico/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/ico/favicon-16x16.png">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <title>R & K</title>
</head>
<body>
    <?php require_once("./component/header.php");?>

    <section id="section" class="container">
        <div class="cart-title">
            <h1>장바구니</h1>
        </div>
        <?php require("php/db_connect.php");?>
        <div class="cart-tab">
            <ul class="tab-btn flex">
                <li><a href="#" class="on">일반배송 (0)</a></li>
                <li><a href="#">스파 (0)</a></li>
            </ul>
        </div>
        <div class="cart-table">
            <form>
                <table class="cart_t">
                    <colgroup>
                        <col width="84px">
                        <col width="100px">
                        <col width="428px">
                        <col width="160px">
                        <col width="auto">
                        <col width="144px">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>
                                <input type="checkbox" id="cart-all" class="check-all">
                                <label for="cart-all"></label>
                            </th>
                            <th></th>
                            <th style="text-align:left;padding-left:24px;">제품 정보</th>
                            <th>수량</th>
                            <th>금액</th>
                            <th>합계금액</th>
                        </tr>
                    </thead>
                   <?php
                        $uid = $_SESSION["userId"];
                        $query = $PDO->query("select * from product, basket, category where product.p_code = basket.p_code and product.c_code = category.c_code and basket.uID = '$uid'");
                        while($row = $query->fetch()) { ?>
                    <tbody>
                        <tr>
                            <td>
                                <input type="checkbox" id="cart-all" class="check-all" value="<?= $row['p_code']?>">
                                <label for="cart-all"></label>
                            </td>
                            <td></td>
                            <td style="text-align:left;padding-left:24px;">제품 정보</td>
                            <td>
                                <div class="amount-wrap">
                                    <button type="button" class="amount minus" ><img src="https://www.lush.co.kr/content/renewal/pc/images/ico/ico_minus_gray.svg" alt="minus"></button>
                                    <input type="text" maxlength="3" value="<?=$row['p_quantity'] ?>" id="amount-result">
                                    <button type="button" class="amount plus" ><img src="https://www.lush.co.kr/content/renewal/pc/images/ico/ico_plus_black.svg" alt="plus"></button>
                                </div>                 
                            </td>
                            <td><span><?=number_format($row['r_price']) ?></span></td>
                            <td>
                                <?php 
                                    $total = $row['r_price'] * $row['p_quantity'];
                                    $total = number_format($total);
                                ?>
                                <span id="total-price"><?=$total?></span>
                            </td>
                        </tr>
                    </tbody>
                    <?php } ?>
                </table>
            </form>
        </div>
        <div class="table-button">
            <button class="border-btn">선택 삭제</button>
            <button class="border-btn">선택 찜하기</button>
        </div>
        <div class="cart-total">
            <ul class="total-wrap flex">
                <li><p>선택제품<span>0</span></p></li>
                <li><p>제품합계<span>￦ 0</span></p></li>
                <li><p>+ 배송비<span>￦ 0</span></p></li>
                <li><p>= 주문금액<span>￦ 0</span></p></li>
            </ul>
        </div>
        <div class="cart-notice">
            <p>* 장바구니제품은 30일간 보관됩니다. 더 오래 보관하시려면 <span>[찜하기]</span>로 등록하세요.</p>
            <p>* 장바구니제품이 품절되면 자동으로 목록에서 삭제됩니다.</p>
        </div>
        <div class="cart-button-wrap flex">
            <button class="border-btn">쇼핑 계속하기</button>
            <button class="black-btn">주문하기</button>
        </div>
    </section>

    
    <script>
      /*  function count(type) {
            
            var price = $('.cart_t > tbody td').eq(4).text();
            price = price.replace(",", "");
            const amount = document.getElementById("amount-result");
            let num = amount.value;

            var total = document.getElementById("total-price");

            if(type === "plus") {
                num = parseInt(num) + 1;
            } else if(type === "minus" && num > 1) {
                num = parseInt(num) - 1;
            }

            amount.value = num;
            $("#total-price").text((price * num).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ','));
        }*/
 
        

        $(document).ready(function() {
            var thisRow = $(this).closest('tr');
            var price = thisRow.find('td:eq(4)').find('span').text();
            price = price.replace("," , "");     
            const amount = thisRow.find('td:eq(3)').find('input');
            let num = amount.val();
            
            $(".minus").click(function() {
                if(num > 1) {
                    num = parseInt(num) - 1;
                }
                amount.val(num);
                var total_p = thisRow.find('td:eq(5)').find('span');
                total_p.text((price * num).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ','));
            });

            $(".plus").click(function() {
                num = parseInt(num) + 1;
                amount.val(num);
                var total_p = thisRow.find('td:eq(5)').find('span');
                total_p.text((price * num).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ','));
            });
        });

        
    </script>

    <?php require_once("./component/footer.php");?>
   
</body>


</html>