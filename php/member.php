<?php
    session_start();

    require("db_connect.php");

    switch($_GET['mode']) {
        case 'register':
            $uid = $_POST["_id"] ?? "";
            $upw = $_POST["_pw"] ?? "";
            $upwConfirm = $_POST["_pw_confirm"] ?? "";
            $uName = $_POST["_name"] ?? "";
            $uNick = $_POST["_nick"] ?? "";
            $uEmail = $_POST["_email"].$_POST["_emailTail"] ?? "";
            $uPhone = $_POST["_phone"] ?? "";
            $uAddress = $_POST["_addr1"].' '.$_POST["_addr2"].' ('.$_POST["_zip"].')' ?? "";
            $profile = $_POST["_profile"] ?? "";

            $sql = $PDO->prepare("SELECT * FROM customerinfo WHERE uID=:uID");
            $sql->bindParam(':uID', $uid);
            $sql->execute();
            $count = $sql->rowCount();

            if(!($uid && $upw && $upwConfirm && $uName && $uEmail && $uPhone && $uAddress)) {
                errMsg("* 표시는 반드시 입력하셔야 하는 항목입니다.");
            } elseif($upw != $upwConfirm) {
                errMsg("비밀번호가 일치하지 않습니다.");
            } elseif($count > 0) {
                errMsg("중복된 아이디가 존재합니다.");
            } elseif(!preg_match("/^[a-z]+[a-z0-9]{5,19}$/", $uid)) {
                errMsg("아이디는 영문자 혹은 숫자로 6자리 이상이어야 합니다.");
            } elseif(!preg_match("/^(?=.*[a-zA-z])(?=.*[0-9])(?=.*[$`~!@$!%*#^?&\\(\\)\-_=+]).{8,16}$/", $upw)) {
                errMsg("비밀번호는 8~16자 영문, 숫자, 특수문자를 최소 한가지씩 조합해야 합니다.");
            } elseif(!preg_match("/^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/", $uEmail)) {
                errMsg('이메일은 "rnk1234@rnk.net" 형식으로 작성되어야 합니다.');
            } elseif(!preg_match("/^01(?:0|1|[6-9])-(?:\d{3}|\d{4})-\d{4}$/", $uPhone)) {
                errMsg('휴대전화 번호는 "010-1234-1234" 형식으로 작성되어야 합니다.');
            }

            if($profile) {
                $tempFile = $_FILES['profile']['tmp_name'];
                $fileTypeExt = explode("/", $_FILES['profile']['type']);
                $fileType = $fileTypeExt[0];
                $fileExt = $fileTypeExt[1];
                $extStatus = false;
                switch($fileExt) {
                    case 'jpeg':
                    case 'jpg':
                    case 'gif':
                    case 'bmp':
                    case 'png':
                        $extStatus = true;
                        break;
                    
                    default :
                        errMsg('이미지 전용 확장자(jpg, bmp, gif, png)외에는 사용이 불가능합니다.');
                        break;
                }

                if($fileType == 'image') {
                    if($extStatus) {
                        $resFile = "C:/xampp/htdocs/rnk/images/profile/{$_FILES['profile']['name']}";

                        if($imageUpload = move_uploaded_file($tempFile, $resFile)) {
                            $resFile = substr($resFile, 15);
                        } else {
                            errMsg('파일 업로드에 실패하였습니다.');
                        }
                    } else {
                        errMsg('파일 확장자는 jpg, bmp, gif, png 이어야 합니다.');
                        exit;
                    }
                } else {
                    errMsg('이미지 파일이 아닙니다.');
                    exit;
                }
            }
            
            $hashedPw = password_hash($upw, PASSWORD_DEFAULT);
            $regist = "homepage";

            $sql = $PDO->prepare("INSERT INTO customerinfo (uID, uPW, uNAME, uNick, uEmail, uPhoneNum, uAddress, redate, regist, profile) VALUE (:uID, :uPW, :uNAME, :uNick, :uEmail, :uPhoneNum, :uAddress, now(), :regist, :profile);");
            $sql->bindParam(':uID', $uid);
            $sql->bindParam(':uPW', $hashedPw);
            $sql->bindParam(':uNAME', $uName);
            $sql->bindParam(':uNick', $uNick);
            $sql->bindParam(':uEmail', $uEmail);
            $sql->bindParam(':uPhoneNum', $uPhone);
            $sql->bindParam(':uAddress', $uAddress);
            $sql->bindParam(':regist', $regist, PDO::PARAM_STR);
            $sql->bindParam(':profile', $resFile);

            $sql->execute();

            header("location:../signUpComplete.php");
            break;

        case 'login':
            $uid = $_POST["login_uid"] ?? "";
            $upw = $_POST["login_upw"] ?? "";
            $uidSaveCheck = $_POST["uidSaveCheck"];

            $sql = $PDO->prepare("SELECT * FROM customerinfo WHERE uID = :uID");
            $sql->bindParam(':uID', $uid);
            $sql->execute();
            $row = $sql->fetch();
            
            if(!$uid){
                errMsg("아이디를 입력해주세요.");
            } elseif(!isset($row['uID'])){
                errMsg('존재하지 않는 아이디입니다.');
            } elseif(!$upw){
                errMsg('비밀번호를 입력해주세요.');
            }

            if(!(password_verify($upw, $row['uPW']))) {
                errMsg('비밀번호가 일치하지 않습니다.');
            }

            $_SESSION["userId"] = $row["uID"];
            $_SESSION["userName"] = $row["uNAME"];
            
            if($uidSaveCheck == "on") {
                setcookie("userId", $uid, time()+(60*60*24*30), "/");
            } else {
                setcookie("userId", $uid, time()-(60*60*24*30), "/");
                unset($_COOKIE["userId"]);
            }

            $_SESSION["userId"] = $uid;

            header("location:../mainPage.php");
            break;

        case 'logout':
            session_unset();

            // 네이버 로그아웃
            header("location: http://nid.naver.com/nidlogin.logout");
            
            header("location:../mainPage.php");
            break;
    }
?>