<?php 
include("../Models/LoaiChungChi.php");
if(isset($_REQUEST["addCC"])){
    $Ten = $_REQUEST["TenCC"];
    LoaiChungChi::createCC($Ten);
    header("location:../quanly.php");
}
if(isset($_REQUEST["xoaCC"])){
    $ma = $_REQUEST["delMaDotNhanUngHo"];
    LoaiChungChi::deleteCC($ma);
    header("location:../quanly.php");
}
if(isset($_REQUEST["suaCC"])){
    $ma = $_REQUEST["eMaCC"];
    $ten = $_REQUEST["eTenCC"];
    LoaiChungChi::editCC($ten,$ma);
    header("location:../quanly.php");
}
