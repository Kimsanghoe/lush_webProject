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
    <link rel="stylesheet" href="style/signUpComplete.css">
    <link rel="icon" type="image/png" sizes="192x192"  href="images/ico/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/ico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="images/ico/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/ico/favicon-16x16.png">
    <title>R & K</title>
</head>
<body>
    <?php require_once("./component/header.php") ?>

    <section id="section" class="container">
        <div class="join-title">
            <h2>회원가입</h2>
            <div class="join-subtitle">
                <ul class="flex center">
                    <li>정보입력</li>
                    <li class="on">가입완료</li>
                </ul>
            </div>
        </div>
        <div class="join-complete">
            <h2>환영합니다</h2>
            <p>R&K 회원가입을 축하드립니다.<br/>로그인 후 다양한 서비스를 이용하실 수 있습니다.</p>
            <span>* SNS 계정 연동시 연동하는 계정의 아이디가 아닌, 연동 계정에 등록된 이메일 주소가 R&K 아이디로 등록됩니다.</span>
            <a href="mainPage.php" class="complete-btn">메인으로</a>
        <div/>
    </section>

    <?php require_once("./component/footer.php") ?>
</body>
</html>