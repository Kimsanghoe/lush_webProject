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
                    <li><a href="#">276 개의 후기 보기</a></li>
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
                        <span><?= number_format($row['r_price']);?> 원</span>
                        <p style="display:none"><?= $row['r_price']?></p>
                        <div class="amount-wrap">
                            <button class="amount minus" onclick="count('minus')"><img src="https://www.lush.co.kr/content/renewal/pc/images/ico/ico_minus_gray.svg" alt="minus"></button>
                            <input type="text" maxlength="3" value="1" id="amount-result">
                            <button class="amount plus" onclick="count('plus')"><img src="https://www.lush.co.kr/content/renewal/pc/images/ico/ico_plus_black.svg" alt="plus"></button>
                        </div>
                    </div>
                    <ul class="total-price-wrap">
                        <li class="flex">총 합계 금액 <span>￦ <span id="total-price"><?= $row['r_price'] ?></span></span></li>
                    </ul>
                    <div class="button-wrap flex">
                        <button class="like-btn border-btn">좋아요</button>
                        <button type="submit" class="cart-btn border-btn" value=<?=$product?>>장바구니</button>
                        <button type="submit" class="buy-btn black-btn">바로 구매</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-detail">
            <ul class="detail-tab flex">
                <li><a href="javascript:;" class="on">제품정보</a></li>
                <li><a href="javascript:;">제품후기</a></li>
                <li><a href="javascript:;">배송/반품/교환 안내</a></li>
                <li><a href="javascript:;">상품필수정보</a></li>
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
                            <p>RnK 해피 피플이 작성한 리뷰입니다</p>
                            <p><?= $row['p_d_text_p_1']?></p>
                            <span>by. 스페이스</span>
                        </li>
                        <li class="product-recommend-img"><img src="<?= $row['p_d_img5']?>" alt="none"></li>
                    </ul>
                    <div class="product-description">
                        <h3><?= $row['p_d_text_h3_2']?></h3>
                        <p><?= $row['p_d_text_p_2']?></p>
                    </div>
                    <div class="product-banner"><img src="<?= $row['p_d_img6']?>" alt="none"></div>
                    <ul class="product-recommend flex">
                        <li class="product-recommend-img"><img src="https://img.lush.co.kr/product/body/maskofmagnanminty_use.jpg" alt="none"></li>    
                        <li class="product-recommend-body" style="text-align: right;">
                            <h3>사용 방법</h3>
                            <p><?= $row["p_d_text_p_3"]?></p>

                            <?php if($row['p_d_text_p_4']) { ?>
                                <p><?= $row['p_d_text_p_4']?></p>
                            <?php } ?>
                        </li>
                    </ul>
                    <div class="product-ingredient">
                        <h3>제품 성분</h3>
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
                                <span>대표성분</span>
                                <?php 
                                    if($row['p_d_img7_n']){echo $row['p_d_img7_n']; echo '&nbsp';}
                                    if($row['p_d_img8_n']){echo $row['p_d_img8_n']; echo '&nbsp';}
                                    if($row['p_d_img9_n']){echo $row['p_d_img9_n']; echo '&nbsp';}
                                    if($row['p_d_img10_n']){echo $row['p_d_img10_n']; echo '&nbsp';}
                                ?>
                            </p>
                            <p>
                                <span>전 성분 표기</span>
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
                    <h2>총 2776개의 후기</h2>
                    <div class="swiper reviewSwipe">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><img src="https://www.lush.co.kr/thumbnail?src=/upload/review/97/519c945dff.jpeg" alt="none"></div>
                            <div class="swiper-slide"><img src="https://www.lush.co.kr/thumbnail?src=/upload/review/97/ac2fd25883.jpg" alt="none"></div>
                            <div class="swiper-slide"><img src="https://www.lush.co.kr/thumbnail?src=/upload/review/97/f76f344231.jpeg" alt="none"></div>
                            <div class="swiper-slide"><img src="https://www.lush.co.kr/thumbnail?src=/upload/review/97/527e2cd9cb.jpg" alt="none"></div>
                            <div class="swiper-slide"><img src="https://www.lush.co.kr/thumbnail?src=/upload/review/97/9bdf506375580a2a" alt="none"></div>
                            <div class="swiper-slide"><img src="https://www.lush.co.kr/thumbnail?src=/upload/review/97/519c945dff.jpeg" alt="none"></div>
                            <div class="swiper-slide"><img src="https://www.lush.co.kr/thumbnail?src=/upload/review/97/ac2fd25883.jpg" alt="none"></div>
                            <div class="swiper-slide"><img src="https://www.lush.co.kr/thumbnail?src=/upload/review/97/f76f344231.jpeg" alt="none"></div>
                            <div class="swiper-slide"><img src="https://www.lush.co.kr/thumbnail?src=/upload/review/97/527e2cd9cb.jpg" alt="none"></div>
                            <div class="swiper-slide"><img src="https://www.lush.co.kr/thumbnail?src=/upload/review/97/9bdf506375580a2a" alt="none"></div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    <div class="review-wrap">
                        <ul>
                            <?php
                                $reviewQuery = $PDO->query("SELECT * FROM product_review LEFT JOIN product ON product_review.p_code = product.p_code LEFT JOIN customerinfo ON product_review.uID = customerinfo.uID;");
                                while($review = $reviewQuery->fetch()) { ?>
                                <li>
                                    <div class="review-top flex">
                                        <div class="user flex">
                                            <div class="profile"><img src="<?=$review['profile']?>" alt="icon"></div>
                                            <span><?=$review['uNAME']?></span>
                                        </div>
                                        <img src="https://www.lush.co.kr/content/renewal/pc/images/ico/stars<?=$review['rating']?>.svg" alt="stars">
                                        <span class="date"><?= $review['reviewDate']?></span>
                                    </div>
                                    <div class="review-bottom flex">
                                        <p><?=$review['content']?></p>
                                        <div class="review-side"><img src="https://www.lush.co.kr/upload/review/97/519c945dff.jpeg" alt="none"></div>
                                    </div>
                                </li>
                            <?php } ?>               
                        </ul>
                    </div>
                    <div class="pagination">
                        <ul class="flex">
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="detail-view">
                <div class="scription-wrap">
                    <ul>
                        <li class="flex">
                            <span>배송비</span>
                            <p>기본 배송료는 3,500원입니다. (도서, 산간, 오지 일부지역은 배송비가 추가될 수 있습니다.)</p>
                        </li>
                        <li class="flex">
                            <span>택배사</span>
                            <p>우체국 택배를 이용합니다.</p>
                        </li>
                        <li class="flex">
                            <span>배송 가능 지역</span>
                            <p>국내 배송 가능 / 해외 배송은 불가능합니다.</p>
                        </li>
                        <li class="flex">
                            <span>이메일</span>
                            <p>webmaster@rnk.co.kr</p>
                        </li>
                        <li class="flex">
                            <span>상담 전화</span>
                            <p>13:00 ~ 16:00 (1644-2357)</p>
                        </li>
                        <li class="flex">
                            <span>상담 톡</span>
                            <p>10:00 ~ 16:00 (https://pf.kakao.com/_VEbUM/chat)</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="detail-view">
                <div class="scription-wrap">
                    <ul>
                        <li class="flex">
                            <span>용량/중량</span>
                            <p><?= $row['volume']?></p>
                        </li>
                        <li class="flex">
                            <span>제품 주요 사양</span>
                            <p><?= $row['pks']?></p>
                        </li>
                        <li class="flex">
                            <span>사용 기한</span>
                            <p><?= $row['date_of_use']?></p>
                        </li>
                        <li class="flex">
                            <span>사용 방법</span>
                            <p><?= $row['how_to_use']?></p>
                        </li>
                        <?php if($row['m_company']) {?>
                            <li class="flex">
                                <span>제조사</span>
                                <p><?= $row['m_company']?></p>
                            </li>
                        <?php } ?>
                        <li class="flex">
                            <span>제조국</span>
                            <p><?= $row['m_country']?></p>
                        </li>
                        <li class="flex">
                            <span>주요 성분</span>
                            <p><?= $row['main_in_gredient']?></p>
                        </li>
                        <li class="flex">
                            <span>식품의약품안전청<br>심사 필 유무</span>
                            <p><?= $row['rFDA']?></p>
                        </li>
                        <li class="flex">
                            <span>사용 상 주의사항</span>
                            <p><?= $row['p_for_use']?></p>
                        </li>
                        <li class="flex">
                            <span>품질 보증 기준</span>
                            <p><?= $row['qualityas']?></p>
                        </li>
                        <li class="flex">
                            <span>소비자 상담 전화번호</span>
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
        });

        $(".buy-btn").click(function() {
            var q = $('#amount-result').val();
            var product = $('.cart-btn').val();
            var tp = $('#total-price').text().replace("," , ""); 
            
            window.location.assign("../order_add.php?p="+product+"&q="+q+"&tp="+tp);
        });
    </script>
</body>
</html>