<?php
class Users
{
    var $idUser;
    var $firstName;
    var $lastName;
    var $email;
    var $password;
    var $admin;

    function __construct($_idUser, $_firstName, $_lastName, $_email, $_password, $_admin)
    {
        $this->idUser = $_idUser;
        $this->firstName = $_firstName;
        $this->lastName = $_lastName;
        $this->email = $_email;
        $this->password = $_password;
        $this->admin = $_admin;
    }

    //Hàm kết nối MySQL, đóng kết nối sau mỗi lần sử dụng !
    static function connect()
    {
        $con = new mysqli("localhost", "root", "", "cms");
        $con->set_charset("utf-8");
        if ($con->connect_error) die("Kết nối thất bại --> " . $con->connect_error);
        return $con;
    }

    //Hàm xác thực tài khoản nguời dùng 
    static function authentication($email, $pw)
    {
        $con = Users::connect();
        $sql = "SELECT * FROM users WHERE email='$email' AND password='$pw'";
        $result = $con->query($sql);
        if ($result->num_rows >= 1) {
            $row = $result->fetch_assoc();
            $u = new Users(
                $row["idUser"],
                $row["fisrtName"],
                $row["lastName"],
                $row["email"],
                $row["password"],
                $row["admin"]
            );
            return $u;
        }
        $con->close();
    }
}
