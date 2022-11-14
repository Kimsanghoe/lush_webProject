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
    <link rel="stylesheet" href="style/loginPage.css">
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

        if(isset($_COOKIE["userId"])) {
            $uid = $_COOKIE["userId"];
            $uidSaveCheck = "checked";
        } else {
            $uid = "";
            $uidSaveCheck = "";
        }
    ?>

    <section id="section" class="container">
        <div class="login-title">
            <h1>로그인</h1>
        </div>
        <div class="login-wrap flex center">
            <form id="loginForm" action="./php/member.php?mode=login" method="POST">
                <input type="text" name="login_uid" placeholder="아이디" value="<?=$uid?>" autocomplete="off">
                <input type="password" name="login_upw" placeholder="비밀번호">
                <div class="checkbox-wrap flex">
                    <input type="checkbox" id="save_uid" name="uidSaveCheck" <?=$uidSaveCheck?>>
                    <label for="save_uid">아이디 저장</label>
                </div>
                <input type="submit" class="submit-btn black-btn" value="로그인">
                <ul class="login_opt flex center">
                    <li><a href="signUpChoice.php">회원가입</a></li>
                    <li><a href="#">아이디 찾기</a></li>
                    <li><a href="#">비밀번호 찾기</a></li>
                </ul>
                <div class="sns-btns">
                    <?php require_once("./component/naverLogin/naverlogin.php") ?>
                    <a href="<?=$naverUrl?>" class="naver-btn">네이버 아이디로 로그인</a>
                    <?php require_once("./component/kakaoLogin/kakaologin.php") ?>
                    <a href="<?=$kakao_apiURL?>" class="kakao-btn">카카오 아이디로 로그인</a>
                </div>
            </form>
        </div>
    </section>

    <?php require_once("./component/footer.php") ?>
</body>
</html>