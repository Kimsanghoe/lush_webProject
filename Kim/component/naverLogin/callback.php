<?php
    session_start();

    // 네이버 로그인 콜백 처리
    define('NAVER_CLIENT_ID', 'dy6AENGP1m8TEIDzT8Ro');
    define('NAVER_CLIENT_SECRET', 'aXJszlJGqy');
    define('NAVER_CALLBACK_URL', 'http://localhost:80/rnk/mainPage.php');

    $naver_curl = "https://nid.naver.com/oauth2.0/token?grant_type=authorization_code&client_id=".NAVER_CLIENT_ID."&client_secret=".NAVER_CLIENT_SECRET."&redirect_uri=".urlencode(NAVER_CALLBACK_URL)."&code=".$_GET['code'];

    // 토큰 값 가져오기
    $is_post = false;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $naver_curl);
    curl_setopt($ch, CURLOPT_POST, $is_post); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 

    $response = curl_exec($ch);
    $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
    curl_close ($ch);

    if($status_code == 200){ 
        $responseArr = json_decode($response, true);

        // 토큰값으로 네이버 회원정보 가져오기 
        $headers = array('Content-Type: application/json', sprintf('Authorization: Bearer %s', $responseArr['access_token']) ); 
        $is_post = false; 
        $me_ch = curl_init(); 
        curl_setopt($me_ch, CURLOPT_URL, "https://openapi.naver.com/v1/nid/me"); 
        curl_setopt($me_ch, CURLOPT_POST, $is_post); 
        curl_setopt($me_ch, CURLOPT_HTTPHEADER, $headers); 
        curl_setopt($me_ch, CURLOPT_RETURNTRANSFER, true); 
        $res = curl_exec ($me_ch); 
        curl_close ($me_ch); 
        $res_data = json_decode($res , true);
        
        $regist = "naver";

        if($res_data['response']['id']) {
            include "../../php/db_connect.php";

            $sql = $PDO->prepare("SELECT * FROM customerinfo WHERE uEmail = :uEmail AND regist = :regist");
            $sql->bindParam(':uEmail', $res_data['response']['email']);
            $sql->bindParam(':regist', $regist, PDO::PARAM_STR);
            $sql->execute();
            $row = $sql->fetch();

            if($row["no"] ?? "") {
                $_SESSION["userId"] = $row["uID"];
                $_SESSION["userName"] = $row["uNAME"];
                echo("<meta http-equiv='refresh' content='0;URL=../../mainPage.php'>");

                exit;
            } else {
                $emptyData = "";

                $sql = $PDO->prepare("INSERT INTO customerinfo (uID, uPW, uNAME, uNick, uEmail, uPhoneNum, uAddress, redate, regist) VALUE (:uID, :uPW, :uNAME, :uNick, :uEmail, :uPhoneNum, :uAddress, now(), :regist);");
                $sql->bindParam(':uID', $res_data['response']['id']);
                $sql->bindParam(':uPW', $emptyData, PDO::PARAM_STR);
                $sql->bindParam(':uNAME', $res_data['response']['name']);
                $sql->bindParam(':uNick', $res_data['response']['nickname']);
                $sql->bindParam(':uEmail', $res_data['response']['email']);
                $sql->bindParam(':uPhoneNum', $res_data['response']['mobile']);
                $sql->bindParam(':uAddress', $emptyData, PDO::PARAM_STR);
                $sql->bindParam(':regist', $regist, PDO::PARAM_STR);

                $sql->execute();

                $_SESSION["userId"] = $res_data ['response']['email'];
                $_SESSION["userName"] = $res_data ['response']['name'];
                echo("<meta http-equiv='refresh' content='0;URL=../../mainPage.php'>");

                exit; 
            }

        }
    }
?>