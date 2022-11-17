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

    <section id="section" class="container flex">
        <div class="product-intro flex">
            <div class="image-area">
                <div class="swiper mySwiper2">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="https://www.lush.co.kr/upload/item/97/20211027142237L.png" alt="none"></div>
                        <div class="swiper-slide"><img src="https://www.lush.co.kr/upload/item/97/20211027142145L.png" alt="none"></div>
                        <div class="swiper-slide"><img src="https://www.lush.co.kr/upload/item/97/20211027142145L(1).png" alt="none"></div>
                        <div class="swiper-slide"><img src="https://www.lush.co.kr/upload/heroImage/20211027142146L.jpg" alt="none"></div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
                <div timbsSlider="" class="swiper mySwiper">
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
                    <ul class="hash-box flex">
                        <li>#꿀의촉촉함 #완전강추 #데일리팩</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="product-detail"></div>
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
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });
    </script>
</body>
</html>