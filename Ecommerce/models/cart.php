<?php 
class Cart {
    
    var $pCode;
    var $pName;
    var $image;
    var $price;
    var $quantity =1;
    

    function __construct($_pCode, $_pName, $_image, $_price, $_quantity)
    {
        $this->pCode = $_pCode;
        $this->pName = $_pName;
        $this->image = $_image;
        $this->price = $_price;
        $this->quantity = $_quantity;
        
    }

   
}

?>