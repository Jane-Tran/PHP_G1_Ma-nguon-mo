<?php 
include_once("../Models/DotUngHo.php");
if(isset($_REQUEST["themDotUngHo"])){
    $MaDVUH =  $_REQUEST["nguoiungho"];
    $NgayUngHo = $_REQUEST["ngayungho"];
    $HinhThuc = $_REQUEST["hinhthuc"];
    $SoLuong = $_REQUEST["soluong"];
    $DonVi = $_REQUEST["donvi"];
    DotUngHo::createUngHo($MaDVUH, $NgayUngHo, $HinhThuc,$SoLuong, $DonVi);
    header("location:../dotungho.php");
}
if(isset($_REQUEST["suaDotUngHo"])){
    $MaDotUngHo = $_REQUEST["madotungho"];
    $MaDVUH =  $_REQUEST["nguoiungho"];
    $NgayUngHo = $_REQUEST["ngayungho"];
    $HinhThuc = $_REQUEST["hinhthuc"];
    $SoLuong = $_REQUEST["soluong"];
    $DonVi = $_REQUEST["donvi"];
    DotUngHo::editUngHo($MaDotUngHo, $MaDVUH, $NgayUngHo, $HinhThuc,$SoLuong, $DonVi);
    header("location:../dotungho.php");
}

