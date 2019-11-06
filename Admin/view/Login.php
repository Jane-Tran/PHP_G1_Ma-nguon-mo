<?php
    session_start();
    include_once("../model/entity/user.php");
    if(isset($_SESSION["user"]))
        header("location:index.php");
    $information = $userName=$pw=$user= "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userName = $_REQUEST["userName"];
        $pw = $_REQUEST["password"];
        $user = User::authentication($userName,$pw);
        if($user==null){
            $information = "Tên đăng nhập hoặc mật  khẩu ko đúng !";
        }else{
            header("location:index.php");
            $_SESSION["user"] = serialize($user);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <title>Document</title> 
    <style>
        .container{
            width: 400px;
            height: 600px;
            padding-top: 100px;
            border-style: inset;  
        }
    </style>
</head>


<body>
    <div class="  container" >
    <!-- Default form login -->
    <form method="POST" class="text-center border border-light p-5" action="#!">

        <p class="h4 mb-4">Sign in</p>

        <!-- User Name -->
        <input type="text" id="user Name" name="userName"class="form-control mb-4" placeholder="Use Name">

        <!-- Password -->
        <input type="password" id="password" name="password"class="form-control mb-4" placeholder="Password">

        <div class="d-flex justify-content-around">
            <div>
                <!-- Remember me -->
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                    <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
                </div>
            </div>
            
        </div>

        <!-- Sign in button -->
        <button class="btn btn-info btn-block my-4" type="submit">Sign in</button>
        <?php if(strlen($information)!=0) {?>
            <div class="alert alert-danger">
            <?php echo $information ?>
            </div>
        <?php } ?>

        

        

    </form>
    <!-- Default form login -->
    </div>
</body>

</html>