<?php
    session_start();
    // KAKAO LOGIN
    $returnCode = $_GET["code"]; // 서버로 부터 토큰을 발급받을 수 있는 코드를 받아옵니다
    $restAPIKey = "1f201ee9cc39bdcb2981f950499cc7a2"; // REST API KEY
    $callbacURI = urlencode("http://localhost/rnk/component/kakaoLogin/oauth.php"); // Call Back URL

    $getTokenUrl = "https://kauth.kakao.com/oauth/token?grant_type=authorization_code&client_id=".$restAPIKey."&redirect_uri=".$callbacURI."&code=".$returnCode;

    if ($_GET["code"]) {
        $isPost = false;
        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL, $getTokenUrl);
        curl_setopt($curlSession, CURLOPT_POST, $isPost);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
        
        $headers = array();
        $accessTokenJson = curl_exec($curlSession); 
        $status_code = curl_getinfo($curlSession, CURLINFO_HTTP_CODE);
        curl_close($curlSession);

        $responseArr = json_decode($accessTokenJson, true);
        $header = "Bearer ".$responseArr['access_token'];

        //사용자 정보 가저오기
        $USER_API_URL= "https://kapi.kakao.com/v2/user/me";

        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL, $USER_API_URL);
        curl_setopt($curlSession, CURLOPT_POST, $isPost);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
        
        $headers = array();
        $headers[] = "Authorization: ".$header;
        curl_setopt($curlSession, CURLOPT_HTTPHEADER, $headers);

        $accessUserJson = curl_exec($curlSession);
        $status_code = curl_getinfo($curlSession, CURLINFO_HTTP_CODE); 
        curl_close($curlSession);

        $me_responseArr = json_decode($accessUserJson, true);

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
                $mb_thumbnail_image = $me_responseArr['properties']['thumbnail_image']; // 프로필 이미지
                $mb_email = $me_responseArr['kakao_account']['email']; // 이메일
                $emptyData = "";

                // 멤버 DB에 토큰과 회원정보를 넣고 로그인
                $sql = $PDO->prepare("INSERT INTO customerinfo (uID, uPW, uNAME, uNick, uEmail, uPhoneNum, uAddress, redate, regist, profile) VALUE (:uID, :uPW, :uNAME, :uNick, :uEmail, :uPhoneNum, :uAddress, now(), :regist, :profile);");
                $sql->bindParam(':uID', $mb_email);
                $sql->bindParam(':uPW', $emptyData, PDO::PARAM_STR);
                $sql->bindParam(':uNAME', $mb_nickname);
                $sql->bindParam(':uNick', $mb_nickname);
                $sql->bindParam(':uEmail', $mb_email);
                $sql->bindParam(':uPhoneNum', $emptyData, PDO::PARAM_STR);
                $sql->bindParam(':uAddress', $emptyData, PDO::PARAM_STR);
                $sql->bindParam(':regist', $regist, PDO::PARAM_STR);
                $sql->bindParam(':profile', $mb_thumbnail_image);

                $sql->execute();

                $_SESSION["userId"] = $me_responseArr['kakao_account']['email'];
                $_SESSION["userName"] = $me_responseArr['properties']['nickname'];
                $_SESSION["kakao_regist"] = "kakao_regist";
                echo("<meta http-equiv='refresh' content='0;URL=../../mainPage.php'>");

                exit;
            }

        } else {
            // 회원정보를 가져오지 못했습니다.
            errMsg("회원정보를 가져오지 못했습니다.");
        }
    }
?>