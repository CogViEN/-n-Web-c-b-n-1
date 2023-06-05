<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Raleway:300,400,700');

        *{
            margin: 0;
            padding: 0;
            outline: none;
            box-sizing: border-box;
            font-family: 'Raleway', sans-serif;
        }

        body{ 
        background: linear-gradient(to right, #d6d6d6,#ffffff);
        perspective: 600px;
        }

        .cont{
        position: relative;
        width: 28%;
        height: 600px;
        margin: 50px auto;
        transition: all 0.4s linear;
        }

        /* .cont:hover{
        transform: rotateX(45deg) rotateY(10deg) rotateZ(-60deg)
        } */

        .main-box{ 
        width: 100%;
        height: 82%;
        text-align: center;
        background-repeat: no-repeat;
        background-size: 100% 100%;
        background-image:  url('http://image.ibb.co/b4nBFk/pexels_photo1.jpg');
        box-shadow: 0px 20px 50px 0px #000000;
        }

        .create {
        position: relative;
        width: 100%;
        height: 100%;
        padding: 18px 15px;
        background: rgba(19, 20, 27, 0.72);
        }

        h2, #number, .email, #pass{ 
        display: block;
        }

        h2{ 
        text-align: center;
        color: #f7f3f2;
        font-weight: 400;
        font-size: 22px;
        margin-top: 20px;
        margin-bottom: 35%;
        }

        #number, .email, #pass{
        width: 85%;
        height: 45px;
        border: none;
        color: white;
        margin: auto;
        padding-left: 40px;
        font-size: 18px;
        font-weight: 500;
        border-radius: 25px;
        margin-bottom: 0;
        background: rgba(158, 158, 158, 0.49);
        }

        input::placeholder{
        color: #fff;
        font-size: 16px;
        font-weight: 100;
        transition: all 0.4s ease;
        }

        input:focus::placeholder{
        opacity:0;
        }

        .fa {
        color: #67c5e7;
        font-size: 20px;
        position: relative;
        left: -36%;
        top: 33px;
        }

        .login{
        color: #fff;
        cursor: pointer;
        width: 85%;
        height: 50px;
        border: none;
        font-size: 18px;
        font-weight: 500;
        margin-top: 20%;
        background: #67c5e7;
        border-radius: 25px;
        transition: background 0.4s ease;
        }

        button.login:hover {
        background: #2196F3;
        }

        @media only screen and (min-width : 280px) {
        .cont{ width: 90% }
        }

        @media only screen and (min-width : 480px) {
        .cont{ width: 60% }
        }

        @media only screen and (min-width : 768px) {
        .cont{ width: 40% }
        }

        @media only screen and (min-width : 992px) {
        .cont{ width: 30% }
        }``
    </style>
</head>
<body>
    <?php require '../check_super_admin_login.php' ?>
    <div class="cont">
        <div class="main-box">
            <div class="create">
                    <h2>CREATE ACCOUNT</h2>
                    <i class="fa fa-fw fa-user-o" aria-hidden="true"></i>
                    <input type="number"
                        id="number"
                        placeholder="Số lượng nhân viên muốn tạo"
                        min = 1
                        max = 10
                    />

                    <i class="fa fa-fw fa-lock" aria-hidden="true"></i>
                    <input type="password" 
                        id="pass"
                        placeholder="Mật khẩu cho tất cả"
                    />

                    <button class="login">Create Account</button>
            </div>
        </div> 
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="../../notify.min.js"></script>
    <script src="https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.login').click(function () { 
                let number = document.getElementById("number").value;
                let password = document.getElementById("pass").value;
                if(check()){
                    $.ajax({
                        type: "POST",
                        url: "process_create_account_staff.php",
                        data: {number, password},
                        // dataType: "dataType",
                        success: function (response) {
                            setTimeout(function() {
                                        swal({
                                            title: "Wow!",
                                            text: "Bạn đã thêm nhân viên thành công!",
                                            type: "success"
                                        }, function() {
                                            window.location = "../root/index.php";
                                        });
                                    }, 500);
                        }
                    });
                }
                
            });
        });

        function check() {
            let isCheck = true;
            let number = document.getElementById("number").value;
            let password = document.getElementById("pass").value;

            if(number.length === 0){
                isCheck = false;
                $.notify("Không được để trống số lượng!", "error");
            }
            if(password.length === 0){
                isCheck = false;
                $.notify("Không được để trống mặt khẩu!", "error");
            }
            return isCheck;
        }
    </script>
</body>
</html>