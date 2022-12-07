<?php
    require("./db_connect.php");

    session_start();

    $p_code = $_REQUEST["p"];
    $p_codes = explode(",", $p_code);

    foreach($p_codes as $value) {
        $PDO->exec("DELETE FROM basket WHERE p_code = $value");
    }

    header("Location:../cart.php");
?>