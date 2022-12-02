<?php
    require("./php/db_connect.php");

    session_start();

    if(empty($_SESSION["userId"])) {?>
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
    <title>R & K</title>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</head>
<body>
    <?php require_once("./component/header.php");?>

    <section id="section" class="container">
        <div class="cart-title">
            <h1>장바구니</h1>
        </div>
        <div class="cart-tab">
            <ul class="tab-btn flex">
                <li><a href="#" class="on">일반배송 (0)</a></li>
                <li><a href="#">스파 (0)</a></li>
            </ul>
        </div>
        <div class="cart-table">
            <form action="#">
                <table>
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
                                <input type="checkbox" id="cart-all" class="check-box">
                                <label for="cart-all"></label>
                            </th>
                            <th></th>
                            <th style="text-align:left;padding-left:24px;">제품 정보</th>
                            <th>수량</th>
                            <th>금액</th>
                            <th>합계금액</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $uid = $_SESSION["userId"];
                        $query = $PDO->query("select * from product, basket, category where product.p_code = basket.p_code and product.c_code = category.c_code and basket.uID = '$uid'");
                        $count = $query->rowCount();

                        if($count == 0) {
                    ?>
                        <tr class="empty">
                            <td colspan="6">
                                <span>장바구니에 담겨있는 제품이 없습니다.</span>
                            </td>
                        </tr>
                    <?php } else {
                        while($row = $query->fetch()) {
                    ?>
                        <tr>
                            <td class="item-checkbox">
                                <input type="checkbox" id="cart-all" class="check-box" name="p_check">
                                <label for="cart-all"></label>
                            </td>
                            <td class="item-image">
                                <img src="<?=$row['p_img1']?>" alt="none">
                            </td>
                            <td class="item-text">
                                <input type="text" value="<?=$row['p_code']?>" id="p_p" style="display:none">
                                <p><?=$row['p_name']?></p>
                                <p><?=$row['c_name']?></p>
                            </td>
                            <td class="item-amount">
                                <div class="amount-wrap">
                                    <button type="button" class="amount minus" ><img src="https://www.lush.co.kr/content/renewal/pc/images/ico/ico_minus_gray.svg" alt="minus"></button>
                                    <input type="text" maxlength="3" value="<?=$row['p_quantity']?>" id="amount-result">
                                    <button type="button" class="amount plus" ><img src="https://www.lush.co.kr/content/renewal/pc/images/ico/ico_plus_black.svg" alt="plus"></button>
                                </div>
                            </td>
                            <td class="item-price">￦ <span><?=number_format($row['r_price']) ?></span></td>
                            <td class="item-result">
                                <?php 
                                    $total = $row['r_price'] * $row['p_quantity'];
                                    $total = number_format($total);
                                ?>
                                ￦ <span id="total-price"><?=$total?></span>
                            </td>
                        </tr>
                    <?php }
                    } ?>
                    </tbody>
                </table>
            </form>
        </div>
        <div class="table-button">
            <button class="border-btn del-btn" type="button">선택 삭제</button>
            <button class="border-btn" type="button">선택 찜하기</button>
        </div>
        <div class="cart-total">
            <ul class="total-wrap flex">
                <li><p>선택제품<span>0</span></p></li>
                <li><p>제품합계<span>￦</span><span>0</span></p></li>
                <li><p>+ 배송비<span>￦ 3,500</span></p></li>
                <li><p>= 주문금액<span>￦</span><span>0</span></p></li>
            </ul>
        </div>
        <div class="cart-notice">
            <p>* 장바구니제품은 30일간 보관됩니다. 더 오래 보관하시려면 <span>[찜하기]</span>로 등록하세요.</p>
            <p>* 장바구니제품이 품절되면 자동으로 목록에서 삭제됩니다.</p>
        </div>
        <div class="cart-button-wrap flex">
            <button class="border-btn">쇼핑 계속하기</button>
            <button class="order-btn black-btn">주문하기</button>
        </div>
    </section>

    <?php require_once("./component/footer.php");?>

    <script>
        $(".minus").click(function() {
            var thisRow = $(this).closest('tr');
            var price = thisRow.find('td:eq(4)').find('span').text();
            price = price.replace("," , "");
            const amount = thisRow.find('td:eq(3)').find('input');
            let num = amount.val();
            if(num > 1) {
                num = parseInt(num) - 1;
            }
            amount.val(num);
            var total_p = thisRow.find('td:eq(5)').find('span');
            total_p.text((price * num).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ','));
        });

        $(".plus").click(function() {
            var thisRow = $(this).closest('tr');
            var price = thisRow.find('td:eq(4)').find('span').text();
            price = price.replace("," , "");     
            const amount = thisRow.find('td:eq(3)').find('input');
            let num = amount.val();
            num = parseInt(num) + 1;
            amount.val(num);
            var total_p = thisRow.find('td:eq(5)').find('span');
            total_p.text((price * num).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ','));
        });

        $(".check-box").change(function() {
            var rowData = new Array();
            var tdArr = new Array();
            var checkbox = $("input[name=p_check]:checked");

            checkbox.each(function(i) {
                var tr = checkbox.parent().parent().eq(i);
                var td = tr.children();
                rowData.push(tr.text());
                var no = td.eq(5).find('span').text().replace("," , "");
                tdArr.push(no);
                sum = 0;
                tdArr.forEach( (item) => {
                    sum += parseInt(item);
                });

                $('.total-wrap li:nth-child(2) span:nth-child(2)').text(sum.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ','));
                
                if(sum != 0) {
                    sum = sum + 3500;
                }
                
                $('.total-wrap li:nth-child(4) span:nth-child(2)').text(sum.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ','));
            });  
        });

        $(".del-btn").click(function() {
            var rowData = new Array();
            var tdArr = new Array();
            var checkbox = $("input[name=p_check]:checked");

            checkbox.each(function(i) {
                var tr = checkbox.parent().parent().eq(i);
                var td = tr.children();
                rowData.push(tr.text());
                var no = td.eq(2).find('input').val();
                console.log(no);
                tdArr.push(no);
            });

            if(tdArr == '') {
                alert("제품을 선택해주세요.");
                exit();
            }

            location.assign("php/cart_del.php?p="+tdArr);
        });

        var totalCheck = $("input[name=p_check]").length;
        $("#cart-all").click(function() {
            if($("#cart-all").is(":checked")) {
                $("input[name=p_check]").prop("checked", true);
                totalCheck = $("input[name=p_check]").length;
                checked = totalCheck;
                $(".total-wrap li:nth-child(1) span").text(totalCheck);
            } else {
                $("input[name=p_check]").prop("checked", false);
                checked = 0;
                $(".total-wrap li:nth-child(1) span").text(checked);
                $('.total-wrap li:nth-child(2) span:nth-child(2)').text(0);
                $('.total-wrap li:nth-child(4) span:nth-child(2)').text(0); 
            }
        });

        $("input[name=p_check]").click(function() {
            var checked = $("input[name=p_check]:checked").length;
            if(totalCheck != checked) {
                $("#cart-all").prop("checked", false);
                $('.total-wrap li:nth-child(2) span:nth-child(2)').text(0);
                $('.total-wrap li:nth-child(4) span:nth-child(2)').text(0); 
            } else {
                $("#cart-all").prop("checked", true); 
            }

            $(".total-wrap li:nth-child(1) span").text(checked);
        });

        $(".order-btn").click(function() {
            var rowData = new Array();
            var p = new Array();
            var q = new Array();
            var checkbox = $("input[name=p_check]:checked");
            var totalp = new Array();
            
            checkbox.each(function(i) {
                var tr = checkbox.parent().parent().eq(i);
                var td = tr.children();
                rowData.push(tr.text());
                var no = td.eq(2).find('input').val();
                var qun = td.eq(3).find('input').val();
                var pr = td.eq(5).find('span').text();
                pr = pr.replace("," , "");
                p.push(no);
                q.push(qun);
                totalp.push(pr);   
            });

            location.assign("/rnk/php/order_add.php?p="+p+"&q="+q+"&tp="+totalp);
        });
    </script>
</body>
</html>