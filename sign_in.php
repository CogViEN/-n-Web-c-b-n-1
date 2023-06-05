<?php
    // nếu tồn tại cookie token tức là đã đăng nhập trước đó
    // nên sẽ không cần đăng nhập lại
    if(isset($_COOKIE['remember'])){
        require 'admin/connect.php';
        $token = $_COOKIE['remember'];
        $sql = "select * from customers
                where token='$token'
                limit 1";
        $result = mysqli_query($connect, $sql);
        $number_rows = mysqli_num_rows($result);
        if($number_rows == 1){
            $each = mysqli_fetch_array($result);
            session_start();    
            $_SESSION['id'] = $each['id'];
            $_SESSION['name'] = $each['name'];
        }  
    }
    if(isset($_SESSION['id'])){
        header('location:index.php');
        exit;
    }
    
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        span{
            color: red;
        }
    </style>
</head>
<body>
   
        Email
        <input type="email" name="email" id="mail">
        <span id="error_mail"></span>
        <br>
        Mật khẩu
        <input type="password" name="password" id="password">
        <span id="error_password"></span>
        <br>
        Ghi nhớ đăng nhập
        <input type="checkbox" name="remember">
        <br>
        <button onclick="return check()" id="btn">Đăng nhập</button>
        <br>
        <a href="forgot_password.php">
            Quên mật khẩu
        </a>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="notify.min.js"></script>
<script>
   
    $(document).ready(function () {
        $('#btn').click(function () { 
            let email = document.getElementById("mail").value;
            let password = document.getElementById("password").value;
            if(check()){
                $.ajax({
                    type: "post",
                    url: "process_signin.php",
                    data: {email, password},
                    // dataType: "dataType",
                    success: function (response) {
                        if(response == 1){
                            window.location.assign("index.php")
                        }
                        else{
                            $.notify("Đăng nhập thất bại!", "error");
                        }
                    }
                });
            }
            
        });
    });
 
    function check() {
        let isCheck = true;
        let mail = document.getElementById("mail").value;
        let password = document.getElementById("password").value;
        
        if(mail.length === 0){
            isCheck = false;
            document.getElementById("error_mail").innerHTML = "Không được để trống email";
        }
        else {
            let regex_mail = /^[a-z0-9_]+@[a-z]+\.[a-z]+$/;
            if (!regex_mail.test(mail)) {
                isCheck = false;
                document.getElementById("error_mail").innerHTML = "email không hợp lệ"
            } else {
                document.getElementById("error_mail").innerHTML = "";
            }
        }

        if(password.length === 0){
            isCheck = false;
            document.getElementById("error_password").innerHTML = "Không được để trống password";
        }
        else{
            document.getElementById("error_password").innerHTML = "";
        }
        return isCheck;
    }
</script>
</html>