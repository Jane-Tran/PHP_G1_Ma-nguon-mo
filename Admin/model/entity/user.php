<?php
    class User{
        var $userName;
        var $password;
        var $fullName;
        function __construct( $userName, $password, $fullName)
        {
            $this ->userName =$userName;
            $this ->password =$password;
            $this ->fullName =$fullName;
        }
        static function authentication($userName,$pv){
            if($userName == "huytran" && $pv == "123")
                return new User($userName,$pv,"HUYTRAN");
            return null;
        }
    }
?>