<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == 'GET') {
    $list = array();
    $pCode = $_GET["pCode"];
    array_push($list, $pCode);
    var_dump($pCode);
    var_dump($list);
    $_SESSION["cart"] = $list;
    var_dump($_SESSION["cart"]);
}
//unset($_SESSION["cart"]);
