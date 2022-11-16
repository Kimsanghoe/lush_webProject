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
            <form action="">
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
                    <tbody>
                        <tr>
                            <td colspan="6">
                                <span class="subtitle">장바구니에 담겨있는 제품이 없습니다.</span>
                            </td>
                        </tr>
                    </tbody>
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

    <?php require_once("./component/footer.php");?>
</body>
</html>