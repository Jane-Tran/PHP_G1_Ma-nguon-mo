<?php 
class Cart {
    
    var $pCode;
    var $pName;
    var $categories;
    var $image;
    var $price;
    var $info;

    function __construct($_pCode, $_pName, $_categories, $_image, $_price, $_info)
    {
        $this->pCode = $_pCode;
        $this->pName = $_pName;
        $this->categories = $_categories;
        $this->image = $_image;
        $this->price = $_price;
        $this->info = $_info;
        
    }

    //Hàm kết nối MySQL, đóng kết nối sau mỗi lần sử dụng !
    static function connect()
    {
        $con = new mysqli("localhost","root","","ecommerce");
        $con->set_charset("utf-8");
        if($con->connect_error) die("Kết nối thất bại --> ".$con->connect_error);
        return $con;

    }

    //Hàm lấy danh sách toàn bộ sản phẩm 
    static function GetListProductsFromDB(){
        $con = Product::connect();
        $sql = "SELECT * FROM products ";
        $result = $con->query($sql);
        $listp = array();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                 array_push($listp, new Product(
                     $row["pCode"],
                     $row["pName"],
                     $row["categories"],
                     $row["image"],
                     $row["price"],
                     $row["info"]
                 ));   
            }
        }
        $con->close();
        return $listp;
    }

    //Hàm lấy các loại mặt hàng hiện có 
    static function GetListCategoriesFromDB(){
        $con = Product::connect();
        $sql = "SELECT DISTINCT categories FROM products ";
        $result = $con->query($sql);
        $listc = array();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                 array_push($listp, $row["categories"] );
            }
        }
        $con->close();
        return $listc;
    }
}

?>