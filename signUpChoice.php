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
    <link rel="stylesheet" href="style/signUpChoice.css">
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
            <h1>회원가입</h1>
        </div>
        <div class="join-btn">
            <a href="./signUpForm.php" class="black-btn">홈페이지 회원가입</a>
            <a href="#" class="naver-btn">네이버 아이디 회원가입</a>
            <a href="#" class="kakao-btn">카카오 아이디 회원가입</a>
        </div>
    </section>

    <?php require_once("./component/footer.php") ?>
</body>
</html>