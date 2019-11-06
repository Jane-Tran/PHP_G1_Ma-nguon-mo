<?php
include_once("../model/entity/learningHistory.php");
$dataFile = LearningHistory::getListFromFile('101');
$arr = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($dataFile as $key => $value) {
        //Tìm dòng có id cần Update
        if ($value->id == $_POST["idForUpdate"]) {
            //Kiểm tra dữ liệu nếu trùng thì thoát vòng lặp và ko cần Update
            if (
                $value->yearFrom == $_POST["yearFromUpdate"]
                && $value->yearTo == $_POST["yearToUpdate"]
                && $value->schoolName == $_POST["schoolNameUpdate"]
                && $value->schoolAddress == $_POST["schoolAddressUpdate"]
            ) header("location:../view/QuaTrinhHocTap.php");
            else{
                //Lưu thay đổi
                $value->yearFrom      = $_POST["yearFromUpdate"];
                $value->yearTo        = $_POST["yearToUpdate"];
                $value->schoolName    = $_POST["schoolNameUpdate"];
                $value->schoolAddress = $_POST["schoolAddressUpdate"];
                //Chuyển mảng Object thành mảng String
                foreach($dataFile as $key =>$value){
                   array_push($arr, implode("#", array($value->id, $value->yearFrom, $value->yearTo, $value->schoolName, $value->schoolAddress, "101"))."\n");
                }
                //Ghi đè toàn bộ nội dung vào lại file
                file_put_contents("../resource/learninghistory.txt",$arr);
                echo "<script>alert('Cập nhật thành công !');</script>";
                header("location:../view/QuaTrinhHocTap.php");
                                
            }                
            break;
        }     
    }
}
