<?php
session_start();
if(!isset($_SESSION["user"])){
    header("location:Login.php");
}
include_once("../model/entity/user.php");
include_once("header.php");
include_once("nav.php");
?>
<?php
$_SESSION["favcolor"] = "green";    
$user = $_SESSION["user"];
if(isset($_SESSION["user"])){
    echo "Xin chào, tôi là ".$user;
  var_dump(unserialize($_SESSION["user"]));
   //var_dump($_SESSION["favcolor"]);
}
else 
    header("location:Login.php");
?>

<?php
include_once("footer.php"); 
?>

