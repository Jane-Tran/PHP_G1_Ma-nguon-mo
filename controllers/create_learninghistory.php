<?php
include_once("../model/entity/learningHistory.php");
$id = LearningHistory::getLastId();
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $fp = fopen("../resource/learninghistory.txt", "a+");
    fwrite($fp,  implode("#", array($id, $_POST["yearFrom"],  $_POST["yearTo"], $_POST["schoolName"], $_POST["schoolAddress"], "101"))."\n" );
    fclose($fp);
    header("location:../view/QuaTrinhHocTap.php");
}

?>

