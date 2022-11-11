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
            }

            $hashedPw = password_hash($upw, PASSWORD_DEFAULT);

            $sql = $PDO->prepare("INSERT INTO customerinfo (uID, uPW, uNAME, uNick, uEmail, uPhoneNum, uAddress, redate) VALUE (:uID, :uPW, :uNAME, :uNick, :uEmail, :uPhoneNum, :uAddress, now());");
            $sql->bindParam(':uID', $uid);
            $sql->bindParam(':uPW', $hashedPw);
            $sql->bindParam(':uNAME', $uName);
            $sql->bindParam(':uNick', $uNick);
            $sql->bindParam(':uEmail', $uEmail);
            $sql->bindParam(':uPhoneNum', $uPhone);
            $sql->bindParam(':uAddress', $uAddress);

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
            header("location:../mainPage.php");
            break;
    }
?>