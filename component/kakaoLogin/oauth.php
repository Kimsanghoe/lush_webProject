<?php
    session_start();
    // KAKAO LOGIN
    $returnCode = $_GET["code"]; // 서버로 부터 토큰을 발급받을 수 있는 코드를 받아옵니다
    $restAPIKey = "1f201ee9cc39bdcb2981f950499cc7a2"; // REST API KEY
    $callbacURI = urlencode("http://localhost/rnk/component/kakaoLogin/oauth.php"); // Call Back URL
    
    // define('KAKAO_CLIENT_ID', '1f201ee9cc39bdcb2981f950499cc7a2');
    // define('KAKAO_CLIENT_SECRET', 'ciKSh5ih3VNflHURlSecc9O5JzwLjshT'); // 필수 아님
    // define('KAKAO_CALLBACK_URL', 'http://localhost/rnk/component/kakaoLogin/oauth.php'); // 콜백URL

    // $kakao_curl = "https://kauth.kakao.com/oauth/token?grant_type=authorization_code&client_id=".KAKAO_CLIENT_ID."&redirect_uri=".urlencode(KAKAO_CALLBACK_URL)."&code=".$_GET['code'];
    $getTokenUrl = "https://kauth.kakao.com/oauth/token?grant_type=authorization_code&client_id=".$restAPIKey."&redirect_uri=".$callbacURI."&code=".$returnCode;

    if ($_GET["code"]) {
        //사용자 토큰 받기
        // $code   = $_GET["code"]; 
        // $params = sprintf('grant_type=authorization_code&client_id=%s&redirect_uri=%s&code=%s', KAKAO_CLIENT_ID, KAKAO_CALLBACK_URL, $code); 

        // $TOKEN_API_URL = "https://kauth.kakao.com/oauth/token"; 
        // $opts = array(
        //     CURLOPT_URL => $TOKEN_API_URL, 
        //     CURLOPT_SSL_VERIFYPEER => false, 
        //     CURLOPT_SSLVERSION => 1, // TLS
        //     CURLOPT_POST => true, 
        //     CURLOPT_POSTFIELDS => $params, 
        //     CURLOPT_RETURNTRANSFER => true, 
        //     CURLOPT_HEADER => false 
        // );

        $isPost = false;
        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL, $getTokenUrl);
        curl_setopt($curlSession, CURLOPT_POST, $isPost);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt_array($curlSession, $opts); 
        
        $headers = array();
        $accessTokenJson = curl_exec($curlSession); 
        $status_code = curl_getinfo($curlSession, CURLINFO_HTTP_CODE);
        curl_close($curlSession);

        $responseArr = json_decode($accessTokenJson, true);
        // echo(json_encode($responseArr));
        // $_SESSION['kakao_access_token'] = $responseArr['access_token'];
        // $_SESSION['kakao_refresh_token'] = $responseArr['refresh_token'];
        // $_SESSION['kakao_refresh_token_expires_in'] = $responseArr['refresh_token_expires_in'];
        $header = "Bearer ".$responseArr['access_token'];

        //사용자 정보 가저오기
        $USER_API_URL= "https://kapi.kakao.com/v2/user/me"; 
        // $opts = array(
        //     CURLOPT_URL => $USER_API_URL,
        //     CURLOPT_SSL_VERIFYPEER => false,
        //     CURLOPT_SSLVERSION => 1,
        //     CURLOPT_POST => true,
        //     CURLOPT_POSTFIELDS => false,
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_HTTPHEADER => array(
        //         "Authorization: Bearer " . $responseArr['access_token']
        //     )
        // );

        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL, $USER_API_URL);
        curl_setopt($curlSession, CURLOPT_POST, $isPost);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt_array($curlSession, $opts);
        
        $headers = array();
        $headers[] = "Authorization: ".$header;
        curl_setopt($curlSession, CURLOPT_HTTPHEADER, $headers);

        $accessUserJson = curl_exec($curlSession);
        $status_code = curl_getinfo($curlSession, CURLINFO_HTTP_CODE); 
        curl_close($curlSession);

        $me_responseArr = json_decode($accessUserJson, true);
        // echo(json_encode($me_responseArr));

        if ($me_responseArr['id']) {
            include "../../php/db_connect.php";

            $mb_email = $me_responseArr['kakao_account']['email'];
            $regist = "kakao";

            $sql = $PDO->prepare("SELECT * FROM customerinfo WHERE uEmail = :uEmail AND regist = :regist");
            $sql->bindParam(':uEmail', $mb_email);
            $sql->bindParam(':regist', $regist, PDO::PARAM_STR);
            $sql->execute();
            $row = $sql->fetch();

            // 회원가입 DB에서 회원이 있으면(이미 가입되어 있다면) 토큰을 업데이트 하고 로그인함
            if ($row["no"] ?? "") {
                // 멤버 DB에 토큰값 업데이트 $responseArr['access_token']
                // 로그인
                $_SESSION["userId"] = $row["uEmail"];
                $_SESSION["userName"] = $row["uNick"];
                $_SESSION["kakao_regist"] = "kakao_regist";
                echo("<meta http-equiv='refresh' content='0;URL=../../mainPage.php'>");

                exit;
            } else {
                // 회원정보가 없다면 회원가입
                // 회원아이디 $mb_uid
                // properties 항목은 카카오 회원이 설정한 경우만 넘겨 받습니다.
                $mb_nickname = $me_responseArr['properties']['nickname']; // 닉네임
                //$mb_profile_image = $me_responseArr['properties']['profile_image']; // 프로필 이미지
                //$mb_thumbnail_image = $me_responseArr['properties']['thumbnail_image']; // 프로필 이미지

                $mb_email = $me_responseArr['kakao_account']['email']; // 이메일
                //$mb_gender = $me_responseArr['kakao_account']['gender']; // 성별 female/male
                //$mb_age = $me_responseArr['kakao_account']['age_range']; // 연령대
                //$mb_birthday = $me_responseArr['kakao_account']['birthday']; // 생일
                $emptyData = "";

                // 멤버 DB에 토큰과 회원정보를 넣고 로그인
                $sql = $PDO->prepare("INSERT INTO customerinfo (uID, uPW, uNAME, uNick, uEmail, uPhoneNum, uAddress, redate, regist) VALUE (:uID, :uPW, :uNAME, :uNick, :uEmail, :uPhoneNum, :uAddress, now(), :regist);");
                $sql->bindParam(':uID', $emptyData, PDO::PARAM_STR);
                $sql->bindParam(':uPW', $emptyData, PDO::PARAM_STR);
                $sql->bindParam(':uNAME', $mb_nickname);
                $sql->bindParam(':uNick', $mb_nickname);
                $sql->bindParam(':uEmail', $mb_email);
                $sql->bindParam(':uPhoneNum', $emptyData, PDO::PARAM_STR);
                $sql->bindParam(':uAddress', $emptyData, PDO::PARAM_STR);
                $sql->bindParam(':regist', $regist, PDO::PARAM_STR);

                $sql->execute();

                $_SESSION["userId"] = $me_responseArr['kakao_account']['email'];
                $_SESSION["userName"] = $me_responseArr['properties']['nickname'];
                $_SESSION["kakao_regist"] = "kakao_regist";
                echo("<meta http-equiv='refresh' content='0;URL=../../mainPage.php'>");

                exit;
            }

        } else {
            // 회원정보를 가져오지 못했습니다.
        }
    }
?>