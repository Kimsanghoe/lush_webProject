<?php
    // 네이버 로그인 페이지
    define('NAVER_CLIENT_ID', 'dy6AENGP1m8TEIDzT8Ro');
    define('NAVER_CLIENT_SECRET', 'aXJszlJGqy');
    define('NAVER_CALLBACK_URL', 'http://localhost:80/rnk/component/naverLogin/callback.php');

    $naverUrl = "https://nid.naver.com/oauth2.0/authorize?response_type=code&client_id=".NAVER_CLIENT_ID."&redirect_uri=".urlencode(NAVER_CALLBACK_URL);
?>