<?php 
 session_start();
    $conn = new mysqli("localhost","root","","cms");
    $conn->set_charset("utf8");
    if($conn -> connect_error)
        die("Kết nối thất bại!!! Lỗi ->".$conn->connect_error);
    if(isset($_POST["login"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        if(isset($_POST["remember"])){
            // tao cookie
            setcookie("username",$username);
            setcookie("password",$password);
        }else{
            setcookie("username", "", time()-3600);
            setcookie("password", "", time()-3600);
        }
        $sql= "SELECT * FROM manager WHERE userName='$username' AND `password`='$password'";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            $row = $result->fetch_row();
            $_SESSION["login"]=$row;
            // echo "<pre>";
            // print_r($row);
            // echo "</pre>";
            // die();
            header("location:admin.php");
        }else{
            echo "<script type='text/javascript'>alert('Từ chối truy cập ');</script>";
        }
    }
    $username = "" ;
    $password = "" ;
    $check = false;
    if(isset($_COOKIE["username"]) && isset($_COOKIE["password"]) ){
        $username = $_COOKIE["username"];
        $password = $_COOKIE["password"];
        $check = true;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="img/duckling.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/style-login.css">
    <title>Login</title>
</head>

<body>
    <form  method="post">
        <img src="img/duckling.png" alt="">
        <h2>Login</h2>
        <div class="form-group">
            <input type="text" class="form-control " 
            placeholder="Uses Name" name="username" value="<?php echo $username ?>">
        </div>
        <div class="form-group">
            <input type="password" class="form-control "  
            placeholder="Password" name="password" value="<?php echo $password ?>">
        </div>
        <div class="form-group">
            <div class="custom-control custom-checkbox small">
                <input <?php echo ($check)?"checked": "";?> type="checkbox" class="custom-control-input" id="customCheck" value="1" name="remember"> 
                <label class="custom-control-label " for="customCheck">Remember Me</label>
            </div>
        </div>
        <button type="submit" name="login">Log in</button>
    </form>
</body>

</html>