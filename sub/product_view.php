<?php require("../php/db_connect.php"); ?>

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
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</head>
<body>
    <?php require_once("../component/header.php") ?>

    <?php
        $product = $_REQUEST["p"];
        $numRecords = $PDO->query("select count(*) from product_review where p_code = $product")->fetchColumn();
        $query = $PDO->query("select * from product, product_detail, category where product.p_code = product_detail.p_code and product.c_code = category.c_code and product.p_code = $product");
        while($row = $query->fetch()) {
    ?>
    <section id="section" class="container">
        <div class="product-intro flex">
            <div class="image-area">
                <div class="swiper productMain">
                    <div class="swiper-wrapper">
                    <?php if($row['p_d_img1']) { ?>
                        <div class="swiper-slide"><img src="<?= $row['p_d_img1']?>" alt="img1"></div>
                    <?php } ?>
                    <?php if($row['p_d_img2']) { ?>
                        <div class="swiper-slide"><img src="<?= $row['p_d_img2']?>" alt="img2"></div>
                    <?php } ?>
                    <?php if($row['p_d_img3']) { ?>
                        <div class="swiper-slide"><img src="<?= $row['p_d_img3']?>" alt="img3"></div>
                        <?php } ?>
                    <?php if($row['p_d_img4']) { ?>
                        <div class="swiper-slide"><img src="<?= $row['p_d_img4']?>" alt="img4"></div>
                    <?php } ?>
                    </div>
                </div>
                <div thumbsSlider="" class="swiper productSub" style="margin-top:10px;">
                    <div class="swiper-wrapper">
                    <?php if($row['p_d_img1']) { ?>
                        <div class="swiper-slide"><img src="<?= $row['p_d_img1']?>" alt="img1"></div>
                    <?php } ?>
                    <?php if($row['p_d_img2']) { ?>
                        <div class="swiper-slide"><img src="<?= $row['p_d_img2']?>" alt="img2"></div>
                    <?php } ?>
                    <?php if($row['p_d_img3']) { ?>
                        <div class="swiper-slide"><img src="<?= $row['p_d_img3']?>" alt="img3"></div>
                    <?php } ?>
                    <?php if($row['p_d_img4']) { ?>
                        <div class="swiper-slide"><img src="<?= $row['p_d_img4']?>" alt="img4"></div>
                    <?php } ?>
                    </div>
                </div>
            </div>
            <div class="info-area">
                <ul class="info-top flex">
                    <li><span id="gotoReview"><?=$numRecords?> ?????? ?????? ??????</span></li>
                    <li><img src="https://www.lush.co.kr/content/renewal/pc/images/ico/share.svg" alt="none"></li>
                </ul>
                <div class="info-wrap">
                    <img src="<?= $row['p_d_img1']?>" alt="none" class="product-img">
                    <h2 class="product-name"><?= $row['p_name']?></h2>
                    <p class="category"><?= $row['c_name']?></p>
                    <ul class="hash-box flex center">
                        <li>
                        <?php if($row['p_d_hashtag1']) { ?>
                            #<?= $row['p_d_hashtag1'] ?>
                        <?php } ?>
                        <?php if($row['p_d_hashtag2']) { ?>
                            #<?= $row['p_d_hashtag2'] ?>
                        <?php } ?> <?php if($row['p_d_hashtag3']) { ?>
                            #<?= $row['p_d_hashtag3'] ?>
                        <?php } ?>
                        </li>
                    </ul>
                    <div class="price flex">
                        <span><?= number_format($row['r_price']);?> ???</span>
                        <p style="display:none"><?= $row['r_price']?></p>
                        <div class="amount-wrap">
                            <button class="amount minus" onclick="count('minus')"><img src="https://www.lush.co.kr/content/renewal/pc/images/ico/ico_minus_gray.svg" alt="minus"></button>
                            <input type="text" maxlength="3" value="1" id="amount-result">
                            <button class="amount plus" onclick="count('plus')"><img src="https://www.lush.co.kr/content/renewal/pc/images/ico/ico_plus_black.svg" alt="plus"></button>
                        </div>
                    </div>
                    <ul class="total-price-wrap">
                        <li class="flex">??? ?????? ?????? <span>??? <span id="total-price"><?=number_format($row['r_price']);?></span></span></li>
                    </ul>
                    <div class="button-wrap flex">
                        <button class="like-btn border-btn">?????????</button>
                        <button type="submit" class="cart-btn border-btn" value=<?=$product?>>????????????</button>
                        <button type="submit" class="buy-btn black-btn">?????? ??????</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-detail">
            <ul class="detail-tab flex">
                <li><a href="javascript:;" class="on">????????????</a></li>
                <li><a href="javascript:;">????????????</a></li>
                <li><a href="javascript:;">??????/??????/?????? ??????</a></li>
                <li><a href="javascript:;">??????????????????</a></li>
            </ul>
            <div class="detail-view on">
                <div class="product-title">
                    <p class="mini-name"><?= $row['p_name']?></p>
                    <h2 class="product-name"><?= $row['c_name']?></h2>
                    <p class="mini-name"><?= $row['p_d_mini_name']?></p>
                </div>
                <div class="product-section">
                    <ul class="product-recommend flex">
                        <li class="product-recommend-body">
                            <img src="https://www.lush.co.kr/content/renewal/pc/images/ico/stars5.svg" alt="stars">
                            <h3><?= $row['p_d_text_h3_1']?></h3>
                            <p>RnK ?????? ????????? ????????? ???????????????</p>
                            <p><?= $row['p_d_text_p_1']?></p>
                            <span>by. ????????????</span>
                        </li>
                        <li class="product-recommend-img"><img src="<?=$row['p_d_img5']?>" alt="none"></li>
                    </ul>
                    <div class="product-description">
                        <h3><?= $row['p_d_text_h3_2']?></h3>
                        <p><?= $row['p_d_text_p_2']?></p>
                    </div>
                    <div class="product-banner"><img src="<?=$row['p_d_img6']?>" alt="none"></div>
                    <ul class="product-recommend flex">
                        <li class="product-recommend-img"><img src="<?=$row['p_d_img6_1']?>" alt="none"></li>
                        <li class="product-recommend-body" style="text-align: right;">
                            <h3>?????? ??????</h3>
                            <p><?= $row["p_d_text_p_3"]?></p>

                            <?php if($row['p_d_text_p_4']) { ?>
                                <p><?= $row['p_d_text_p_4']?></p>
                            <?php } ?>
                        </li>
                    </ul>
                    <div class="product-ingredient">
                        <h3>?????? ??????</h3>
                        <ul class="flex">
                            <li>
                                <img src="<?= $row['p_d_img7']?>" alt="none">
                                <span><?= $row['p_d_img7_n']?></span>
                                <p><?= $row['p_d_img7_d']?></p>
                            </li>

                            <?php if($row['p_d_img8']) { ?>
                                <li>
                                    <img src="<?= $row['p_d_img8']?>" alt="none">
                                    <span><?= $row['p_d_img8_n']?></span>
                                    <p><?= $row['p_d_img8_d']?></p>
                                </li>
                            <?php } ?>

                            <?php if($row['p_d_img9']) { ?>
                                <li>
                                    <img src="<?= $row['p_d_img9']?>" alt="none">
                                    <span><?= $row['p_d_img9_n']?></span>
                                    <p><?= $row['p_d_img9_d']?></p>
                                </li>
                            <?php } ?>

                            <?php if($row['p_d_img10']) { ?>
                                <li>
                                    <img src="<?= $row['p_d_img10']?>" alt="none">
                                    <span><?= $row['p_d_img10_n']?></span>
                                    <p><?= $row['p_d_img10_d']?></p>
                                </li>
                            <?php } ?>
                        </ul>
                        <div class="all-ingre">
                            <p>
                                <span>????????????</span>
                                <?php 
                                    if($row['p_d_img7_n']){echo $row['p_d_img7_n']; echo '&nbsp';}
                                    if($row['p_d_img8_n']){echo $row['p_d_img8_n']; echo '&nbsp';}
                                    if($row['p_d_img9_n']){echo $row['p_d_img9_n']; echo '&nbsp';}
                                    if($row['p_d_img10_n']){echo $row['p_d_img10_n']; echo '&nbsp';}
                                ?>
                            </p>
                            <p>
                                <span>??? ?????? ??????</span>
                                <?= $row['p_d_text_p_5']?>
                            </p>
                        </div>
                    </div>
                    <div class="product-qna">
                        <h3>Q & A</h3>
                        <ul>
                            <li>
                                <p><?= $row['p_d_q_1']?></p>
                                <p><?= $row['p_d_a_1']?></p>
                            </li>

                            <?php if($row['p_d_q_2']) { ?>
                                <li>
                                    <p><?= $row['p_d_q_2']?></p>
                                    <p><?= $row['p_d_a_2']?></p>
                                </li>
                            <?php } ?>

                            <?php if($row['p_d_q_2']) { ?>
                                <li>
                                    <p><?= $row['p_d_q_3']?></p>
                                    <p><?= $row['p_d_a_3']?></p>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="detail-view">
                <div class="review">
                    <h2>??? <?=$numRecords?>?????? ??????</h2>

                    <?php if($numRecords != 0) { ?>
                    <div class="swiper reviewSwipe">
                        <div class="swiper-wrapper">
                        <?php
                            $reviewImgQuery = $PDO->query("SELECT reviewImg FROM product_review WHERE p_code = {$row["p_code"]};");
                            while($images = $reviewImgQuery->fetch()) {
                                if($images['reviewImg'] == null) { continue; }
                        ?>
                            <div class="swiper-slide"><img src="<?=$images['reviewImg']?>" alt="none"></div>
                        <?php } ?>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    <div class="review-wrap">
                        <ul>
                        <?php
                            $reviewQuery = $PDO->query("SELECT * FROM customerinfo, product_review WHERE customerinfo.uid = product_review.uid AND p_code='$product';");
                            while($review = $reviewQuery->fetch()) { ?>
                            <li>
                                <div class="review-top flex">
                                    <div class="user flex">
                                        <div class="profile"><img src="<?=$review['profile']?>" alt="icon"></div>
                                        <span><?=$review['uNAME']?></span>
                                    </div>
                                    <img src="https://www.lush.co.kr/content/renewal/pc/images/ico/stars<?=$review['rating']?>.svg" alt="stars">
                                    <span class="date"><?=$review['reviewDate']?></span>
                                </div>
                                <div class="review-bottom flex">
                                    <p><?=$review['content']?></p>
                                    <?php if(isset($review['reviewImg'])) { ?>
                                    <div class="review-side">
                                        <img src="<?=$review['reviewImg']?>" alt="none">
                                    </div>
                                    <?php } ?>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php } else { ?>
                        <div class="empty-review">
                            <p>????????? ?????? ????????? ????????????.</p>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="detail-view">
                <div class="scription-wrap">
                    <ul>
                        <li class="flex">
                            <span>?????????</span>
                            <p>?????? ???????????? 3,500????????????. (??????, ??????, ?????? ??????????????? ???????????? ????????? ??? ????????????.)</p>
                        </li>
                        <li class="flex">
                            <span>?????????</span>
                            <p>????????? ????????? ???????????????.</p>
                        </li>
                        <li class="flex">
                            <span>?????? ?????? ??????</span>
                            <p>?????? ?????? ?????? / ?????? ????????? ??????????????????.</p>
                        </li>
                        <li class="flex">
                            <span>?????????</span>
                            <p>webmaster@rnk.co.kr</p>
                        </li>
                        <li class="flex">
                            <span>?????? ??????</span>
                            <p>13:00 ~ 16:00 (1644-2357)</p>
                        </li>
                        <li class="flex">
                            <span>?????? ???</span>
                            <p>10:00 ~ 16:00 (https://pf.kakao.com/_VEbUM/chat)</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="detail-view">
                <div class="scription-wrap">
                    <ul>
                        <li class="flex">
                            <span>??????/??????</span>
                            <p><?= $row['volume']?></p>
                        </li>
                        <li class="flex">
                            <span>?????? ?????? ??????</span>
                            <p><?= $row['pks']?></p>
                        </li>
                        <li class="flex">
                            <span>?????? ??????</span>
                            <p><?= $row['date_of_use']?></p>
                        </li>
                        <li class="flex">
                            <span>?????? ??????</span>
                            <p><?= $row['how_to_use']?></p>
                        </li>
                        <?php if($row['m_company']) {?>
                            <li class="flex">
                                <span>?????????</span>
                                <p><?= $row['m_company']?></p>
                            </li>
                        <?php } ?>
                        <li class="flex">
                            <span>?????????</span>
                            <p><?= $row['m_country']?></p>
                        </li>
                        <li class="flex">
                            <span>?????? ??????</span>
                            <p><?= $row['main_in_gredient']?></p>
                        </li>
                        <li class="flex">
                            <span>????????????????????????<br>?????? ??? ??????</span>
                            <p><?= $row['rFDA']?></p>
                        </li>
                        <li class="flex">
                            <span>?????? ??? ????????????</span>
                            <p><?= $row['p_for_use']?></p>
                        </li>
                        <li class="flex">
                            <span>?????? ?????? ??????</span>
                            <p><?= $row['qualityas']?></p>
                        </li>
                        <li class="flex">
                            <span>????????? ?????? ????????????</span>
                            <p><?= $row['consumerCPN']?></p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
    <?php require_once("../component/footer.php")?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script>
        $(".cart-btn").click(function() {
            var tp = $('#amount-result').val();
            var product = $('.cart-btn').val();
            window.location.assign("../php/cart_add.php?p="+product+"&tp="+tp);
        });

        var productSubSwiper = new Swiper(".productSub", {
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });

        var productMainSwiper = new Swiper(".productMain", {
            spaceBetween: 10,
            thumbs: {
                swiper: productSubSwiper,
            },
        });

        var reviewSwiper = new Swiper(".reviewSwipe", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });

        function count(type) {
            var price = $('.price p').text();
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
        }

        $(document).ready(function() {
            $(".detail-tab > li").click(function() {
                let idx = $(".detail-tab > li").index(this);

                $(".detail-tab > li > a").removeClass('on');
                $(".product-detail .detail-view").removeClass('on');

                $(".detail-tab > li > a").eq(idx).addClass('on');
                $(".product-detail .detail-view").eq(idx).addClass('on');
            });

            $("#gotoReview").click(function() {
                $(".detail-tab > li > a").removeClass('on');
                $(".product-detail .detail-view").removeClass('on');

                $(".detail-tab > li > a").eq(1).addClass('on');
                $(".product-detail .detail-view").eq(1).addClass('on');

                var offset = $(".product-detail").offset()
                $("html").animate({scrollTop: offset.top}, 400);
            });

            $(".buy-btn").click(function() {
                var q = $('#amount-result').val();
                var product = $('.cart-btn').val();
                var tp = $('#total-price').text().replace("," , "");
                
                window.location.assign("/rnk/php/order_add.php?p="+product+"&q="+q+"&tp="+tp);
            });
        });
    </script>
</body>
</html>