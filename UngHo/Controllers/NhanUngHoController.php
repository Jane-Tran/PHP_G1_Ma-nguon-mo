 <?php
 include_once("../Models/NhanUngHo.php");
if(isset($_REQUEST["xoaNhanUngHo"])){
    $MaDNUH = $_REQUEST["delMaDotNhanUngHo"];
    NhanUnngHo::deleteNhanUngHo($MaDNUH);
    header("location:../nhanungho.php");
    echo $MaDNUH;
}



