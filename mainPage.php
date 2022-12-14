<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/css/main.css" rel="stylesheet" type="text/css"/>
    <link href="style/css/reset.css" rel="stylesheet" type="text/css"/>
    <link href="style/css/font.css" rel="stylesheet" type="text/css "/>
    <link href="style/css/layout.css" rel="stylesheet" type="text/css "/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="style/mainPage.css">
    <link rel="icon" type="image/png" sizes="192x192"  href="images/ico/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/ico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="images/ico/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/ico/favicon-16x16.png">
    <title>R & K</title>
    <script type="text/javascript" src="https://static.nid.naver.com/js/naverLogin_implicit-1.0.3.js" charset="utf-8"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</head>
<body>
    <?php 
        require_once("./component/header.php");
        require("php/db_connect.php");
    ?>

    <article>
        <div class="main">
            <div class="container">
                <div class="swiper basic-swiper content-space">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="image_wrapper">
                                <img src="/rnk/images/mainbanner/20221006095042L.png" alt="img">
                                <div class="banner-text">
                                    <p>10월 포토<br>리뷰 이벤트</p>
                                    <span>시월의 어느 멋진 날에</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="image_wrapper">
                                <img src="/rnk/images/mainbanner/20220926145731L.png" alt="img">
                                <div class="banner-text">
                                    <p>나의 입욕이<br>가치 있기를!</p>
                                    <span>수마트라 오랑우탄을 지켜주세요</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="image_wrapper">
                                <img src="/rnk/images/mainbanner/20220930105940L.png" alt="img">
                                <div class="banner-text">
                                    <p>미리 만나는<br>크리스마스</p>
                                    <span>[NEW] 산타가 주는 향기로운 선물</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Add Pagination -->
                    <div class="swiper-button-next swiper-button-next1"></div>
                    <div class="swiper-button-prev swiper-button-prev1"></div>
                    <div class="swiper-pagination swiper-pagination1"></div>
                </div>

                <!-- 두 번째 Swiper -->
                <div class="swiper card-swiper content-space">
                    <div class="swiper-wrapper">
                        <?php
                            $query = $PDO->query("SELECT * FROM product_review pr, product_detail p, customerinfo c WHERE pr.p_code = p.p_code AND pr.uID = c.uID ORDER BY pr.reviewDate DESC LIMIT 7;");
                            while($row = $query->fetch()) {
                                $strlen = mb_strlen($row["uNAME"], "UTF-8");
                                $maskingValue = "";

                                switch($strlen) {
                                    case 2:
                                        $maskingValue = mb_strcut($row['uNAME'], 0, 3, "UTF-8").'*';
                                        break;
                                    case 3:
                                        $maskingValue = mb_strcut($row['uNAME'], 0, 3, "UTF-8").'*'.mb_strcut($row['uNAME'], 8, 11, "UTF-8");
                                        break;
                                    case 4:
                                        $maskingValue = mb_strcut($row['uNAME'], 0, 3, "UTF-8").'**'.mb_strcut($row['uNAME'], 12, 15, "UTF-8");
                                        break;
                                    default:
                                        $maskingValue = mb_strcut($row['uNAME'], 0, 3, "UTF-8").'**'.mb_strcut($row['uNAME'], 12, 15, "UTF-8");
                                        break;
                                }
                        ?>
                        <div class="swiper-slide">
                            <div class="card-head">
                                <img src="https://www.lush.co.kr/content/renewal/pc/images/ico/stars<?=$row["rating"]?>.svg" alt="stars">
                                <p><?=$row["p_d_hashtag2"]?></p>
                                <div class="sub-button">
                                    <img src="https://www.lush.co.kr/content/renewal/pc/images/ico/favourites.svg" alt="img">
                                    <img src="https://www.lush.co.kr/content/renewal/pc/images/ico/bag.svg" alt="img">
                                </div>
                            </div>
                            <div class="image_wrapper">
                                <?php $reviewImg = $row["reviewImg"] ?? $row["p_d_img1"]?>
                                <a href="./sub/product_view.php?p=<?=$row["p_code"]?>"><img src="<?=$reviewImg?>" alt="img"></a>
                            </div>
                            <div class="card-tail">
                                <p><?=$row["content"]?></p>
                                <div class="user">
                                    <img src="<?=$row["profile"]?>" alt="usericon">
                                    <span><?=$maskingValue?></span>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>

                    <!-- Add Pagination -->
                    <div class="swiper-scrollbar swiper-scrollbar1"></div>
                </div>
            </div>

            <div class="over-container">
                <div class="flex-box content-space">
                    <div class="hashtags">
                        <div class="hashtags-wrap">
                            <a href="#"><span>#슬리피기프트</span></a>
                            <a href="#"><span>#네이키드</span></a>
                            <a href="#"><span>#신선한 재료</span></a>
                        </div>
                        <img src="https://www.lush.co.kr/upload/itemBanner/20221014180425L.png" alt="img">
                    </div>
                    <div class="product">
                        <div class="product-summary">
                            <span>BEST</span>
                            <a href="./sub/sub_product.php?cate=best"><img src="https://www.lush.co.kr/content/renewal/pc/images/ico/arrow_forward_black.svg" alt="img"></a>
                            <p>지금 가장 인기있는 제품을 만나보세요!</p>
                        </div>
                        <div class="swiper mini-card-swiper">
                            <div class="swiper-wrapper">
                                <?php
                                    $query = $PDO->query("SELECT * FROM best50, category WHERE best50.c_code=category.c_code ORDER BY p_hits DESC LIMIT 7;");
                                    while($row = $query->fetch()) {
                                ?>
                                <div class="swiper-slide">
                                    <div class="image_wrapper">
                                        <a href="./sub/product_view.php?p=<?=$row["p_code"]?>"><img src="<?=$row["p_img1"]?>" alt="img"></a>
                                    </div>
                                    <div class="sub-button">
                                        <img src="https://www.lush.co.kr/content/renewal/pc/images/ico/favourites.svg" alt="img">
                                        <img src="https://www.lush.co.kr/content/renewal/pc/images/ico/bag.svg" alt="img">
                                    </div>
                                    <div class="product">
                                        <div class="user">
                                            <a href="#" class="product-subtitle"><?=$row["p_name"]?></a>
                                            <div class="hash-box">
                                                <a href="#">#<?=$row["c_name"]?></a>
                                            </div>
                                            <a href="#" class="product-subtitle">₩ <?=number_format($row["r_price"]);?></a>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <!-- Add Pagination -->
                            <div class="swiper-scrollbar swiper-scrollbar2"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="flex-box content-space">
                    <div class="content-box">
                        <h2>공지사항</h2>
                        <img src="https://www.lush.co.kr/upload/mainNotice/20220801220223L.png" alt="img">
                        <p><span>카카오 페이 결제수단 정상 복구 안내</span></p>
                    </div>
                    <div class="content-box">
                        <h2>지금 진행중인 캠페인</h2>
                        <img src="https://www.lush.co.kr/upload/mainCampain/20220929102151L.jpg" alt="img">
                        <p><span>동물대체시험법 제정안 통과를 위해 서명해 주세요!</span></p>
                    </div>
                </div>
            </div>

            <div class="over-container">
                <div class="content-space">
                    <div class="grid-title">
                        <span>지금 놓치면 안될<br/>사랑스러운 이벤트</span>
                        <img src="https://www.lush.co.kr/content/renewal/pc/images/ico/arrow_forward_black.svg" alt="img">
                    </div>
                    <div class="grid-box">
                        <div class="grid-item">
                            <img src="https://www.lush.co.kr/upload/mainEvent/20221006102634L.png" alt="img">
                            <a href="#">
                                <p class="event-name">10월 포토 리뷰 이벤트</p>
                                <p class="date">2022-10-06 ~ 2022-10-31</p>
                            </a>
                        </div>
                        <div class="grid-item">
                            <img src="https://www.lush.co.kr/upload/mainEvent/20221006102634L.png" alt="img">
                            <a href="#">
                                <p class="event-name">10월 포토 리뷰 이벤트</p>
                                <p class="date">2022-10-06 ~ 2022-10-31</p>
                            </a>
                        </div>
                        <div class="grid-item">
                            <img src="https://www.lush.co.kr/upload/mainEvent/20221006102634L.png" alt="img">
                            <a href="#">
                                <p class="event-name">10월 포토 리뷰 이벤트</p>
                                <p class="date">2022-10-06 ~ 2022-10-31</p>
                            </a>
                        </div>
                        <div class="grid-item">
                            <img src="https://www.lush.co.kr/upload/mainEvent/20221006102634L.png" alt="img">
                            <a href="#">
                                <p class="event-name">10월 포토 리뷰 이벤트</p>
                                <p class="date">2022-10-06 ~ 2022-10-31</p>
                            </a>
                        </div>
                        <div class="grid-item">
                            <img src="https://www.lush.co.kr/upload/mainEvent/20221006102634L.png" alt="img">
                            <a href="#">
                                <p class="event-name">10월 포토 리뷰 이벤트</p>
                                <p class="date">2022-10-06 ~ 2022-10-31</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="content-space">
                    <div class="video-content flex-box">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/XuyYexBNGXg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <div class="video-text">
                            <h2>TWISTED TWENTY OF R&K KOREA</h2>
                            <p>"세상을 비트는 욕심쟁이 스무살"<br/>R&K 20주년 쇼케이스에 여러분을 초대합니다!</p>
                        </div>
                    </div>
                </div>

                <!-- wide-swiper -->
                <div class="swiper wide-swiper content-space">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="spa-content flex-box">
                                <img src="https://www.lush.co.kr/upload/mainPerfume/20220729153019L.png" alt="img">
                                <div class="spa-text">
                                    <h2>솔티 보디 스프레이</h2>
                                    <p>오후의 산들바람부터 해가 지는 매직 아워까지,<br/>당신의 매력을 배가시켜줄 향기를 입어보세요!</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="spa-content flex-box">
                                <img src="https://www.lush.co.kr/upload/mainPerfume/20220729152949L.png" alt="img">
                                <div class="spa-text">
                                    <h2>스노우 페어리<br/>보디 스프레이</h2>
                                    <p>눈의 요정이 지나간 자리에 남는 향기!<br/>스칠 때마다 달콤한 향이 나는 몸,<br/>어떻게 사랑에 빠지지 않을 수 있을까요?</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="spa-content flex-box">
                                <img src="https://www.lush.co.kr/upload/mainPerfume/20220729153004L.png" alt="img">
                                <div class="spa-text">
                                    <h2>로드 오브 미스룰<br/>보디 스프레이</h2>
                                    <p>시간이 지날수록 진가를 뿜어내는 매력적인 향기,<br/>달콤한 바닐라가 지나간 자리에요!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination swiper-pagination2"></div>
                </div>

                <!-- wide-swiper -->
                <div class="swiper wide-swiper content-space">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="spa-content flex-box">
                                <img src="https://www.lush.co.kr/upload/mainSpa/20220729152707L.png" alt="img">
                                <div class="spa-text">
                                    <h2>더 굿 아워</h2>
                                    <p>견고한 압의 마사지로 온몸의 생기를<br/>불어 넣어 지친 근육의 뻐근함을<br/>해방시켜 드립니다.</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="spa-content flex-box">
                                <img src="https://www.lush.co.kr/upload/mainSpa/20220818110337L.png" alt="img">
                                <div class="spa-text">
                                    <h2>더 에너자이저</h2>
                                    <p>음악의 일부가 된듯한 짜릿함!<br/>드럼 스틱과 스트레칭 밴드를 활용하여 리듬에 맞춰<br/>몸과 마음의 에너지를 끌어올리는 마사지입니다.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination swiper-pagination2"></div>
                </div>
            </div>
        </div>
    </article>

    <?php require_once("./component/footer.php")?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="./js/mainSwiper.js"></script>
</body>
</html>