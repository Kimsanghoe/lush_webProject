<?php
    session_start();

    // KAKAO LOGIN
    define('KAKAO_CLIENT_ID', '	1f201ee9cc39bdcb2981f950499cc7a2');
    define('KAKAO_CALLBACK_URL', 'http://localhost/rnk/mainPage.php'); // 콜백URL

    // 카카오 로그인 접근 토큰 요청 예제
    // $kakao_state = md5(microtime() . mt_rand()); // 보안용 값
    // $_SESSION['kakao_state'] = $kakao_state;
    $kakao_apiURL = "https://kauth.kakao.com/oauth/logout?client_id=".KAKAO_CLIENT_ID."&logout_redirect_uri=".urlencode(KAKAO_CALLBACK_URL);
    
    session_unset();
    header("location:{$kakao_apiURL}");
?>