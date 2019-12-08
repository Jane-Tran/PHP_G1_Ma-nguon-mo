<?php 
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["pCode"]) && isset($_POST["qty"])){
        $pCode = $_POST["pCode"];
        $qty = $_POST["qty"];
        if(isset($_SESSION["cart"])){
            $cart = $_SESSION["cart"];
            //echo "<pre>";
            //print_r( $cart);
            if(array_key_exists($pCode,$cart)){
                if($qty){
                    $cart[$pCode] = array(
                        "pName" => $cart[$pCode]["pName"],
                        "image" => $cart[$pCode]["image"],
                        "price" => $cart[$pCode]["price"],
                        "quantity" => $qty 
                    );
                }else{
                    unset( $cart[$pCode]);
                }
            }
            $_SESSION["cart"] = $cart;
        }
      // echo $pCode."-".$qty;
    }

}

?>