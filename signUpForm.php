<?php
    // session_start();
    // require_once("./php/check_id.php");
    require("./php/db_connect.php");
?>

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
    <link rel="stylesheet" href="style/signUpForm.css">
    <link rel="icon" type="image/png" sizes="192x192"  href="images/ico/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/ico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="images/ico/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/ico/favicon-16x16.png">
    <title>R & K</title>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(e) {
            $(".checkID").on("keyup", function() {
                var self = $(this);
                var uid;

                if(self.attr("id") === "uid") {
                    uid = self.val();
                }

                $.post(
                    "./php/check_id.php",
                    {_id : uid},
                    function(data) {
                        console.log(data);
                        if(data == 1) {
                            self.parent().find("#uid").css({'border':'none', 'outline':'none', 'box-shadow':'0 0 0 2px #FF6600'});
                            self.parent().parent().find("#id_check > p").html("<font color='#FF6600'>아이디를 입력해주세요.</font>");
                        } else if(data == 2) {
                            self.parent().find("#uid").css({'border':'none', 'outline':'none', 'box-shadow':'0 0 0 2px #FF6600'});
                            self.parent().parent().find("#id_check > p").html("<font color='#FF6600'>이미 존재하는 아이디입니다.</font>");
                        } else if(data == 3) {
                            self.parent().find("#uid").css({'border':'none', 'outline':'none', 'box-shadow':'0 0 0 2px #FF6600'});
                            self.parent().parent().find("#id_check > p").html("<font color='#FF6600'>아이디는 영문자 또는 숫자로<br>6자리 이상 입력해주세요.</font>");
                        } else if(data == 4) {
                            self.parent().find("#uid").css({'border':'none', 'outline':'none', 'box-shadow':'0 0 0 2px #0821F8'});
                            self.parent().parent().find("#id_check > p").html("<font color='#0821F8'>사용 가능한 아이디입니다.</font>");
                        }
                    }
                )
            });

            $(".checkPW").on("keyup", function() {
                var self = $(this);

                let upw = $('#upw').val();
                let upwCheck = $('#upwCheck').val();

                if(upw != "" || upwCheck != "") {
                    if(upw == upwCheck) {
                        self.parent().find("#upwCheck").css({'border':'none', 'outline':'none', 'box-shadow':'0 0 0 2px #0821F8'});
                        self.parent().parent().find("#pw_check > p").html("<font color='#0821F8'>패스워드가 일치합니다.</font>");
                    } else {
                        self.parent().find("#upwCheck").css({'border':'none', 'outline':'none', 'box-shadow':'0 0 0 2px #FF6600'});
                        self.parent().parent().find("#pw_check > p").html("<font color='#FF6600'>패스워드가 일치하지 않습니다.</font>");
                    }
                }
            });
        });
    </script>
</head>
<body>
    <?php require_once("./component/header.php") ?>

    <section id="section" class="container">
        <div class="join-title">
            <h2>회원가입</h2>
            <div class="join-subtitle">
                <ul class="flex center">
                    <li class="on">정보입력</li>
                    <li>가입완료</li>
                </ul>
            </div>
        </div>
        <div class="join-form">
            <div class="form-title flex">
                <h2>기본 정보</h2>
                <p><span>*</span> 표시는 반드시 입력하셔야 하는 항목입니다.</p>
            </div>
            
            <form name="member-form" method="post" action="./php/member.php?mode=register" class="form-content" autocomplete="off">
                <div class="form-row flex">
                    <div class="flexin-1">
                        <p class="form-content-title"><span>*</span> 아이디</p>
                    </div>
                    <div class="flexin-4">
                        <input class="form-content-text checkID" type="text" name="_id" id="uid" placeholder="영문자 혹은 숫자로 6자리 이상">
                    </div>
                    <div class="flexin-1" id="id_check">
                        <p style="float:right;text-align:right;font-size:12px;"></p>
                    </div>
                </div>
                <div class="form-row flex">
                    <div class="flexin-1">
                        <p class="form-content-title"><span>*</span> 비밀번호</p>
                    </div>
                    <div class="flexin-5">
                        <input class="form-content-text" type="password" name="_pw" id="upw" placeholder="영문 또는 영문 및 숫자 4자리 이상">
                    </div>
                </div>
                <div class="form-row flex">
                    <div class="flexin-1">
                        <p class="form-content-title"><span>*</span> 비밀번호 확인</p>
                    </div>
                    <div class="row-item2 flexin-4">
                        <input class="form-content-text checkPW" type="password" name="_pw_confirm" id="upwCheck">
                    </div>
                    <div class="flexin-1" id="pw_check">
                        <p style="float:right;text-align:right;font-size:12px;"></p>
                    </div>
                </div>
                <div class="form-row flex">
                    <div class="row-item1 flexin-1">
                        <p class="form-content-title"><span>*</span> 이름</p>
                    </div>
                    <div class="row-item2 flexin-5">
                        <input class="form-content-text" type="text" name="_name">
                    </div>
                </div>
                <div class="form-row flex">
                    <div class="flexin-1">
                        <p class="form-content-title">닉네임</p>
                    </div>
                    <div class="flexin-5">
                        <input class="form-content-text" type="text" name="_nick">
                    </div>
                </div>
                <div class="form-row flex">
                    <div class="flexin-1">
                        <p class="form-content-title"><span>*</span> 이메일</p>
                    </div>
                    <div class="flexin-4">
                        <input class="form-content-text" type="text" name="_email">
                    </div>
                    <div class="flexin-1">
                        <select class="form-content-select" name="_emailTail">
                            <option value="">직접입력</option>
                            <option value="@naver.com">@naver.com</option>
                            <option value="@daum.net">@daum.net</option>
                            <option value="@nate.com">@nate.com</option>
                            <option value="@gmail.com">@gmail.com</option>
                        </select>
                    </div>
                </div>
                <div class="form-row flex">
                    <div class="flexin-1">
                        <p class="form-content-title"><span>*</span> 휴대전화</p>
                    </div>
                    <div class="flexin-5">
                        <input class="form-content-text" type="text" name="_phone" placeholder="- 를 포함하여 입력해주세요. (ex. 010-1234-5678)">
                    </div>
                </div>
                <div class="form-row flex">
                    <div class="flexin-1">
                        <p class="form-content-title"><span>*</span> 주소</p>
                    </div>
                    <div class="flexin-1">
                        <input class="form-content-text" type="text" name="_zip">
                    </div>
                    <div class="flexin-1">
                        <input class="form-content-btn" type="button" value="우편번호 검색" onclick="optionZipSearch()">
                    </div>
                    <div class="flexin-3"></div>
                </div>
                <div class="form-row flex">
                    <div class="flexin-1"></div>
                    <div class="flexin-5">
                        <input class="form-content-text" type="text" name="_addr1" readonly>
                    </div>
                </div>
                <div class="form-row flex">
                    <div class="flexin-1"></div>
                    <div class="flexin-5">
                        <input class="form-content-text" type="text" name="_addr2">
                    </div>
                </div>
                <div class="form-row flex center">
                    <input class="form-submit-btn" type="submit" name="submit_btn" value="회원가입">
                </div>
            </form>
        </div>
    </section>

    <?php require_once("./component/footer.php") ?>

    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>

    <script>
        function checkid() {
            var id = document.getElementById('uid').value;
            window.open("./php/check_id.php?_id=" + id, "IDcheck", "left=50, top=50, width=300, height=10, scrollbars=no, resizeable=no");
        }

        function optionZipSearch() {
            new daum.Postcode({
                oncomplete: function(data) {
                    $('[name=_zip]').val(data.zonecode); // 우편번호 (5자리)
                    $('[name=_addr1]').val(data.address); // 기본 주소
                    $('[name=_addr2]').val(data.buildingName); // 건물명
                }
            }).open();
        }
    </script>
</body>
</html>