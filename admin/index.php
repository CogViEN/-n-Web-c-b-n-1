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
        <h1>Đăng nhập</h1>
        Email
        <input type="email" name="email" id="mail">
        <span id="error_mail"></span>
        <br>
        Mật khẩu
        <input type="password" name="password" id="password">
        <span id="error_password"></span>
        <br>
        <button onclick="return check()" id="btn">Đăng nhập</button>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="../notify.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#btn').click(function () { 
                let email = document.getElementById("mail").value;
                let password = document.getElementById("password").value;
                if(check()){
                    $.ajax({
                        type: "POST",
                        url: "process_login.php",
                        data: {email, password},
                        success: function (response) {
                            if(response == 1){
                                window.location.assign("root/index.php")
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
</body>
</html>