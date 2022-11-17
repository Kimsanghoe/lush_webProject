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
    <link rel="stylesheet" href="../style/product_view.css">
    <title>R & K</title>
    <link rel="icon" type="../image/png" sizes="192x192"  href="/rnk/images/ico/android-icon-192x192.png">
    <link rel="icon" type="../image/png" sizes="32x32" href="/rnk/images/ico/favicon-32x32.png">
    <link rel="icon" type="../image/png" sizes="96x96" href="/rnk/images/ico/favicon-96x96.png">
    <link rel="icon" type="../image/png" sizes="16x16" href="/rnk/images/ico/favicon-16x16.png">
</head>
<body>
    <?php require_once("../component/header.php") ?>

    <section id="section" class="container">
        <div class="product-intro flex">
            <div class="image-area">
                <div class="swiper mySwiper2">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="https://www.lush.co.kr/upload/item/97/20211027142237L.png" alt="none"></div>
                        <div class="swiper-slide"><img src="https://www.lush.co.kr/upload/item/97/20211027142145L.png" alt="none"></div>
                        <div class="swiper-slide"><img src="https://www.lush.co.kr/upload/item/97/20211027142145L(1).png" alt="none"></div>
                        <div class="swiper-slide"><img src="https://www.lush.co.kr/upload/heroImage/20211027142146L.jpg" alt="none"></div>
                    </div>
                </div>
                <div thumbsSlider="" class="swiper mySwiper" style="margin-top:10px;">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="https://www.lush.co.kr/upload/item/97/20211027142237L.png" alt="none"></div>
                        <div class="swiper-slide"><img src="https://www.lush.co.kr/upload/item/97/20211027142145L.png" alt="none"></div>
                        <div class="swiper-slide"><img src="https://www.lush.co.kr/upload/item/97/20211027142145L(1).png" alt="none"></div>
                        <div class="swiper-slide"><img src="https://www.lush.co.kr/upload/heroImage/20211027142146L.jpg" alt="none"></div>
                    </div>
                </div>
            </div>
            <div class="info-area">
                <ul class="info-top flex">
                    <li><a href="#">276 개의 후기 보기</a></li>
                    <li><img src="https://www.lush.co.kr/content/renewal/pc/images/ico/share.svg" alt="none"></li>
                </ul>
                <div class="info-wrap">
                    <img src="https://www.lush.co.kr/upload/item/97/20211027142145L.png" alt="none" class="product-img">
                    <h2 class="product-name">마스크 오브 매그니토</h2>
                    <p class="category">파워 마스크</p>
                    <ul class="hash-box flex center">
                        <li>#꿀의촉촉함 #완전강추 #데일리팩</li>
                    </ul>
                    <div class="price flex">
                        <span>￦ 22,000원</span>
                        <div class="amount-wrap">
                            <button class="amount minus" onclick="count('minus')"><img src="https://www.lush.co.kr/content/renewal/pc/images/ico/ico_minus_gray.svg" alt="minus"></button>
                            <input type="text" maxlength="3" value="1" id="amount-result">
                            <button class="amount plus" onclick="count('plus')"><img src="https://www.lush.co.kr/content/renewal/pc/images/ico/ico_plus_black.svg" alt="plus"></button>
                        </div>
                    </div>
                    <ul class="total-price-wrap">
                        <li class="flex">총 합계 금액 <span>￦ 0</span></li>
                    </ul>
                    <div class="button-wrap flex">
                        <button class="like-btn border-btn">좋아요</button>
                        <button class="cart-btn border-btn">장바구니</button>
                        <button class="buy-btn black-btn">바로 구매</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-detail">
            <ul class="detail-tab flex">
                <li><a href="#" class="on">제품정보</a></li>
                <li><a href="#">제품후기</a></li>
                <li><a href="#">배송/반품/교환 안내</a></li>
                <li><a href="#">상품필수정보</a></li>
            </ul>
        </div>
    </section>

    <?php require_once("../component/footer.php")?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });

        var swiper2 = new Swiper(".mySwiper2", {
            spaceBetween: 10,
            thumbs: {
                swiper: swiper,
            },
        });

        function count(type) {
            const result = document.getElementById("amount-result");
            let num = result.value;

            if(type === "plus") {
                num = parseInt(num) + 1;
            } else if(type === "minus" && num > 1) {
                num = parseInt(num) - 1;
            }

            result.value = num;
        }
    </script>
</body>
</html>