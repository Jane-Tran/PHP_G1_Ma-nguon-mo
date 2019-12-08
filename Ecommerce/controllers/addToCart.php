<?php
session_start();
include_once("../models/product.php");

if ($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST["pCode"])) {
    $pCode = $_POST["pCode"];
    $pDetail = Product::GetProductByCode($pCode);
    if(!empty($_SESSION["cart"])){
        $cart = $_SESSION["cart"];
        if(array_key_exists($pCode,$cart)){
            $cart[$pCode] = array(
                "pName" => $pDetail->pName,
                "image" => $pDetail->image,
                "price" => $pDetail->price,
                "quantity" => (int)$cart[$pCode]["quantity"]+1,
            );
        }else{
            $cart[$pCode] = array(
                "pName" => $pDetail->pName,
                "image" => $pDetail->image,
                "price" => $pDetail->price,
                "quantity" => 1
            );
        }
    }else{
        $cart[$pCode] = array(
            "pName" => $pDetail->pName,
            "image" => $pDetail->image,
            "price" => $pDetail->price,
            "quantity" => 1
        );
    }
    $_SESSION["cart"] = $cart;
   //header("location:../views/product-detail.php?pCode=$pCode");
}else{
    header("localhost:../views/index.php");
}

$total  =0;
foreach($cart as $value){
    $total += $value["quantity"]*$value["price"];
}
//unset($_SESSION["cart"]);
print_r(count($_SESSION["cart"])."-".$total);
die();