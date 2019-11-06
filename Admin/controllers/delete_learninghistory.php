<?php
$dataFile = file("../resource/learninghistory.txt");
//Vị trí cần xóa
$identity =$_GET["iddelete"];
if ($_SERVER['REQUEST_METHOD']=='GET') {
    if(!empty($dataFile)){
        //Loại bỏ dòng cần xóa trong mảng tạm
        array_splice($dataFile,(int)$_GET["iddelete"]-1,1);

        //điều chỉnh id theo thứ tự tăng dần
        foreach($dataFile as $key => $value){
            //Bắt đầu điều chỉnh từ vị trí xóa 
            if($key>=(int)$_GET["iddelete"]-1){
                //Thay id trong chuỗi theo đúng giá trị tăng dần
                $dataFile[$key]=substr_replace($dataFile[$key],(string)$identity,0,(int)strpos( $dataFile[$key],"#"));
                $identity++;
            }              
        }
        //Ghi đè lại file
        file_put_contents("../resource/learninghistory.txt",$dataFile);
        header("location:../view/QuaTrinhHocTap.php");
    }else header("location:../view/QuaTrinhHocTap.php");   
}
?>