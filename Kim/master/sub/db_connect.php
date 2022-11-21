<?php
    $host = 'localhost';
    $database = 'rnkDB';
    $user = 'root';
    $password = '';

    try {
        $PDO = new PDO("mysql:host={$host};dbname={$database}",$user,$password);
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $PDO->exec("set names utf8");
    } catch(PDOException $e) {
        die('연결 실패 : '.$e->getMessage());
    }

    function errMsg($msg) {
        echo "
        <script>
            window.alert('$msg');
            history.back(1);
        </script>";

        exit;
    }
?>