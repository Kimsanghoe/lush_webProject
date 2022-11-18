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

    <section id="section" class="container">
        <div class="product-intro flex">
            <div class="image-area">
                <div class="swiper productMain">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="https://www.lush.co.kr/upload/item/97/20211027142237L.png" alt="none"></div>
                        <div class="swiper-slide"><img src="https://www.lush.co.kr/upload/item/97/20211027142145L.png" alt="none"></div>
                        <div class="swiper-slide"><img src="https://www.lush.co.kr/upload/item/97/20211027142145L(1).png" alt="none"></div>
                        <div class="swiper-slide"><img src="https://www.lush.co.kr/upload/heroImage/20211027142146L.jpg" alt="none"></div>
                    </div>
                </div>
                <div thumbsSlider="" class="swiper productSub" style="margin-top:10px;">
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
                        <li class="flex">총 합계 금액 <span>￦ <span id="total-price">22,000</span></span></li>
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
                <li><a href="javascript:;" class="on">제품정보</a></li>
                <li><a href="javascript:;">제품후기</a></li>
                <li><a href="javascript:;">배송/반품/교환 안내</a></li>
                <li><a href="javascript:;">상품필수정보</a></li>
            </ul>
            <div class="detail-view">
                <div class="product-title">
                    <p class="mini-name">파워 마스크</p>
                    <h2 class="product-name">마스크 오브 매그니토</h2>
                    <p class="mini-name">Mask Of Magnaminty</p>
                </div>
                <div class="product-section">
                    <ul class="product-recommend flex">
                        <li class="product-recommend-body">
                            <img src="https://www.lush.co.kr/content/renewal/pc/images/ico/stars5.svg" alt="stars">
                            <h3>얼굴부터 발 끝까지<br>사용하고 있는<br>저의 필수템이에요.</h3>
                            <p>러쉬코리아 직원 해피피플이 작성한 리뷰입니다</p>
                            <p>민트의 쿨함과 꿀의 촉촉함이 더해진<br>매력 덩어리 제품이에요. 도톰하게 발라준 뒤,<br>부드러운 팥으로 정성스레 마사지해주면<br>보들보들 아기 피부 짜잔! 정말 쉽죠?</p>
                            <span>by. 스페이스</span>
                        </li>
                        <li class="product-recommend-img"><img src="https://img.lush.co.kr/product/body/maskofmagnanminty_review.jpg" alt="none"></li>
                    </ul>
                    <div class="product-description">
                        <h3>페퍼민트의 향기에 바닐라의 달콤함이 살짝!</h3>
                        <p>
                            얼굴과 몸에 영양을 듬뿍 선사하는 워시 오프 팩으로 건강한 피부로 가꾸는 데 도움을 줍니다.<br>
                            부드러운 피부 관리에 도움을 주는 팥가루와 꿀은 촉촉하고 부드러운 피부를 선사해줍니다.<br>
                            매끈함이 필요한 페이스, 시원한 스크럽이 필요한 발목, 촉촉함이 필요한 팔꿈치까지!<br>
                            청량감을 가득 머금은 페퍼민트 오일의 힘으로 온몸 구석구석에 청량함을 선사하세요.<br>
                            Tip. 앗, 익숙한 이 향기! 민트 초콜릿인가요?
                        </p>
                    </div>
                    <div class="product-banner"><img src="https://img.lush.co.kr/product/body/maskofmagnanminty_re_img.jpg" alt="none"></div>
                    <ul class="product-recommend flex">
                        <li class="product-recommend-img"><img src="https://img.lush.co.kr/product/body/maskofmagnanminty_use.jpg" alt="none"></li>    
                        <li class="product-recommend-body" style="text-align: right;">
                            <h3>사용 방법</h3>
                            <p>
                                부드러움이 필요한 모든 곳에 사용하며,<br>
                                피부 결이 보이지 않을 정도로 바른 후<br>
                                5~10분 후 물로 헹궈내며 마사지합니다.
                            </p>
                            <p>
                                * 팩이 마르기 전 헹궈내기를 권장합니다.<br>
                                * 냉장 보관하여 시원하게 사용해도 좋습니다.<br>
                                * 작은 알갱이는 부드러운 스크럽을 도와줍니다.
                            </p>
                        </li>
                    </ul>
                    <div class="product-ingredient">
                        <h3>제품 성분</h3>
                        <ul class="flex">
                            <li>
                                <img src="https://www.lush.co.kr/upload/article/20220223144715L(1).png" alt="none">
                                <span>팥</span>
                                <p>부드러운 피부 관리에 도움</p>
                            </li>
                            <li>
                                <img src="https://www.lush.co.kr/upload/article/20220223113649L.png" alt="none">
                                <span>바닐라</span>
                                <p>달콤한 향기, 산뜻한 세정과<br>촉촉한 피부에 도움</p>
                            </li>
                            <li>
                                <img src="https://www.lush.co.kr/upload/article/20220223142114L.png" alt="none">
                                <span>페퍼 민트</span>
                                <p>상쾌하고 시원한 향기</p>
                            </li>
                            <li>
                                <img src="https://www.lush.co.kr/upload/article/20220223142213L.png" alt="none">
                                <span>꿀</span>
                                <p>촉촉한 피부에 도움</p>
                            </li>
                        </ul>
                        <div class="all-ingre">
                            <p><span>대표성분</span>팥, 바닐라, 페퍼 민트, 꿀</p>
                            <p>
                                <span>전 성분 표기</span>
                                꿀, 카올린, 정제수, 텔크, 글리세린, 팥가루, 헥토라이트, 달맞이꽃씨,<br>
                                향료, 페퍼민트오일, 바닐라열매오일, 만수국아재비꽃오일, 리모넨, 클로로필린-카퍼컴플렉스
                            </p>
                        </div>
                    </div>
                    <div class="product-qna">
                        <h3>Q & A</h3>
                        <ul>
                            <li>
                                <p>구매한 제품의 색이 이미지와 달라요!</p>
                                <p>
                                    제품에 담긴 신선한 원료는 수확 시기에 따라 수분감, 당도, 산도 등이 달라<br>
                                    동일한 제품이라도 질감이나 색상이 다를 수 있답니다!
                                </p>
                            </li>
                            <li>
                                <p>뚜껑을 열었는데 물이 고여있어요.</p>
                                <p>
                                    촉촉함을 가득 머금은 프레쉬 페이스 마스크의 표면에 수분이 고일 수 있습니다!<br>
                                    사용 전, 깨끗한 스페츌러와 같은 도구로 골고루 섞어 사용해주세요!
                                </p>
                            </li>
                            <li>
                                <p>사용기한을 알고 싶어요!</p>
                                <p>
                                    자연에서 얻은 건강한 원재료를 듬뿍 담고 있는 페이스 & 보디 마스크는<br>
                                    제조일로부터 4개월 동안 사용하실 수 있습니다.<br>
                                    제품의 라벨에 제조년/월/일이 표기되어 있습니다.<br>
                                    디지털 매장의 경우, 입/출고가 빈번하여 제조일자와 사용기한의 표기가 어렵습니다.<br>
                                    고객센터로 문의하시면 현재 판매되는 제품의 제조 일자와 사용기한을 안내해 드릴게요!
                                </p>
                            </li>
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
                            <li>
                                <div class="review-top flex">
                                    <span class="user">
                                        <img src="https://www.lush.co.kr/upload/badge/607/badgeImageOn/20221006112048L.png" alt="icon">
                                        <span>류*현</span>
                                    </span>
                                    <img src="https://www.lush.co.kr/content/renewal/pc/images/ico/stars5.svg" alt="stars">
                                    <span class="date">2022-11-18</span>
                                </div>
                                <div class="review-bottom flex">
                                    <p>팩을 하고나니까 피부가 환해졌어요!</p>
                                    <div class="review-side"><img src="https://www.lush.co.kr/upload/review/97/519c945dff.jpeg" alt="none"></div>
                                </div>
                            </li>
                            <li>
                                <div class="review-top flex">
                                    <span class="user">
                                        <img src="https://www.lush.co.kr/upload/badge/607/badgeImageOn/20221006112048L.png" alt="icon">
                                        <span>류*현</span>
                                    </span>
                                    <img src="https://www.lush.co.kr/content/renewal/pc/images/ico/stars5.svg" alt="stars">
                                    <span class="date">2022-11-18</span>
                                </div>
                                <div class="review-bottom flex">
                                    <p>팩을 하고나니까 피부가 환해졌어요!</p>
                                    <div class="review-side"><img src="https://www.lush.co.kr/upload/review/97/519c945dff.jpeg" alt="none"></div>
                                </div>
                            </li>
                            <li>
                                <div class="review-top flex">
                                    <span class="user">
                                        <img src="https://www.lush.co.kr/upload/badge/607/badgeImageOn/20221006112048L.png" alt="icon">
                                        <span>류*현</span>
                                    </span>
                                    <img src="https://www.lush.co.kr/content/renewal/pc/images/ico/stars5.svg" alt="stars">
                                    <span class="date">2022-11-18</span>
                                </div>
                                <div class="review-bottom flex">
                                    <p>팩을 하고나니까 피부가 환해졌어요!</p>
                                    <div class="review-side"><img src="https://www.lush.co.kr/upload/review/97/519c945dff.jpeg" alt="none"></div>
                                </div>
                            </li>
                            <li>
                                <div class="review-top flex">
                                    <span class="user">
                                        <img src="https://www.lush.co.kr/upload/badge/607/badgeImageOn/20221006112048L.png" alt="icon">
                                        <span>류*현</span>
                                    </span>
                                    <img src="https://www.lush.co.kr/content/renewal/pc/images/ico/stars5.svg" alt="stars">
                                    <span class="date">2022-11-18</span>
                                </div>
                                <div class="review-bottom flex">
                                    <p>팩을 하고나니까 피부가 환해졌어요!</p>
                                    <div class="review-side"><img src="https://www.lush.co.kr/upload/review/97/519c945dff.jpeg" alt="none"></div>
                                </div>
                            </li>
                            <li>
                                <div class="review-top flex">
                                    <span class="user">
                                        <img src="https://www.lush.co.kr/upload/badge/607/badgeImageOn/20221006112048L.png" alt="icon">
                                        <span>류*현</span>
                                    </span>
                                    <img src="https://www.lush.co.kr/content/renewal/pc/images/ico/stars5.svg" alt="stars">
                                    <span class="date">2022-11-18</span>
                                </div>
                                <div class="review-bottom flex">
                                    <p>팩을 하고나니까 피부가 환해졌어요!</p>
                                    <div class="review-side"><img src="https://www.lush.co.kr/upload/review/97/519c945dff.jpeg" alt="none"></div>
                                </div>
                            </li>
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
            <div class="detail-view on">
                <div class="scription-wrap">
                    <ul>
                        <li class="flex">
                            <span>용량/중량</span>
                            <p>125g, 315g</p>
                        </li>
                        <li class="flex">
                            <span>제품 주요 사양</span>
                            <p>모든 피부용</p>
                        </li>
                        <li class="flex">
                            <span>사용 기한</span>
                            <p>이 제품의 최적의 사용 기한은 제조일자로부터 4개월입니다. 당사의 쇼핑몰에서는 제조일자가 가장 빠른 상품부터 출고되고 있습니다. 입출고가 빈번하여 온라인상에 상세 제조일자 기재가 어려운 점 양해 바랍니다. 수령하신 상품에 부착된 라벨을 통하여 제조일자 년/월/일의 순으로 기재되어 개별 확인이 가능하며, 글로벌 가이드에 맞추어 최소 1개월 이상 사용 가능한 제품으로 출고되는 점 참고 부탁드립니다. 추가 문의는 고객센터 1644-2357로 문의하시면 상세히 안내드리겠습니다.</p>
                        </li>
                        <li class="flex">
                            <span>사용 방법</span>
                            <p>깨끗이 세안한 얼굴에 토너를 뿌려 피부결을 정돈시켜 준 후 민감한 눈가와 입가를 제외한 얼굴, 앞가슴과 등에 골고루 발라주세요. 10분 정도 경과 후 미온수로 헹궈냅니다. 신선한 원재료에서 배어 나온 수분이 제품 표면에 고일 수 있습니다. 이는 자연스러운 현상으로 팩과 섞어서 사용해주세요.</p>
                        </li>
                        <li class="flex">
                            <span>제조국</span>
                            <p>한국</p>
                        </li>
                        <li class="flex">
                            <span>주요 성분</span>
                            <p>상세페이지 참조</p>
                        </li>
                        <li class="flex">
                            <span>식품의약품안전청<br>심사 필 유무</span>
                            <p>식품의약품안전처 심사 대상 아님</p>
                        </li>
                        <li class="flex">
                            <span>사용 상 주의사항</span>
                            <p>1. 화장품 사용 시 또는 직사광선에 의하여 사용부위가 붉은 반점, 부어오름, 가려움증 등의 이상 증상이나 부작용 우려 등이 있는 경우 전문의 등과 상담할 것 2. 상처가 있는 부위 등에는 사용을 자제할 것 3. 보관 및 취급상의 주의사항 가) 어린이의 손이 닿지 않는 곳에 보관할 것 나) 직사광선을 피해서 보관할 것 4. 알갱이가 눈에 들어갔을 때에는 물로 씻어내고 이상이 있는 경우에는 전문의와 상담할 것. 5. 눈 주위를 피하여 사용할 것. *냉장보관해주세요 *본 제품은 재 판매가 불가능한 제품 특성상 교환 및 환불이 되지 않습니다.  *5~9월 및 일부 계절에 아이스 팩을 함께 동봉하며, 기온에 따라 동봉 여부는 달라질 수 있습니다</p>
                        </li>
                        <li class="flex">
                            <span>품질 보증 기준</span>
                            <p>공정거래위원회 고시 소비자분쟁해결기준에 의거 교환 또는 보상 받을 수 있습니다</p>
                        </li>
                        <li class="flex">
                            <span>소비자 상담 전화번호</span>
                            <p>1644-2357</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <?php require_once("../component/footer.php")?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script>
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
            const price = 22000;

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
    </script>
</body>
</html>