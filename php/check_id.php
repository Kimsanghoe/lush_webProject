<?php
    require("db_connect.php");
    $uid = $_POST['_id'];
    
    $state = 0;

    if($uid != NULL) {
        $sql = $PDO->prepare("SELECT * FROM customerinfo WHERE uID=:uID");
        $sql->bindParam(':uID', $uid);
        $sql->execute();
        $count = $sql->rowCount();

        if($count > 0) {
            echo $state = 2;
            // echo "<font color='#FF6600'>존재하는 아이디입니다.</font>";
        } elseif(!preg_match("/^[a-zA-z0-9]{6,12}$/", $uid)) {
            echo $state = 3;
            // echo "<font color='#FF6600'>아이디는 영문자 또는 숫자로<br>6자리 이상 입력해주세요.</font>";
        } elseif(preg_match("/^[a-zA-z0-9]{6,12}$/", $uid)) {
            echo $state = 4;
            // echo "<font color='#0821F8'>사용 가능한 아이디입니다.</font>";
        }
    } else {
        echo $state = 1;
        // echo "<font color='#FF6600'>아이디를 입력해주세요.</font>";
    }
?>