<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    //Mở kết nối với MySQL
    $conn = new mysqli("localhost", "root", "", "qlsv", "3304");
    $conn->set_charset("utf8");
    if($conn -> connect_error)
        ("Kết nối thất bại!!! Lỗi ->".$conn->connect_error);
    $tunam=$_POST["yearFrom"];
    $dennam=$_POST['yearTo'];
    $tentruong=$_POST['schoolName'];
    $diachitruong=$_POST['schoolAddress'];
    $masinhvien=$_POST['101'] ;  
    $sql = "INSERT INTO `quatrinhhoctap` (`tunam`,`dennam`,`tentruong`,`diachitruong`,`masinhvien`) 
    VALUES ('{$tunam}','{$dennam}','{$tentruong}','{$diachitruong}','{$masinhvien}');";
    $conn->query($sql);
    //Đóng kết nối
    $conn->close();
    var_dump( $_POST["schoolName"]);
    header("location:../view/AjaxQuaTrinhHocTap.php");
}
?>