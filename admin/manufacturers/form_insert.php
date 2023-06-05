<?php require '../check_super_admin_login.php'; ?>
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
    <h1>Thêm nhà sản xuất</h1>
    <?php $check = $_GET['check'] ?>
    
        Tên
        <input type="text" name="name" id="name">
        <span id="error_name"></span>
        <br>
        Địa chỉ
        <textarea name="address" id="address"></textarea>
        <span id="error_address"></span>
        <br>
        Ảnh
        <input type="text" name="image" id="image">
        <span id="error_image"></span>
        <br>
        <button id="btn">Thêm</button>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="../../notify.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#btn').click(function () { 
                let name = document.getElementById("name").value;
                let address = document.getElementById("address").value;
                let image = document.getElementById("image").value;
                
                if(check()){
                    $.ajax({
                        type: "POST",
                        url: "process_insert.php",
                        data: {name, address, image},
                        // dataType: "dataType",
                        success: function (response) {
                            if(response == 1){
                                window.location.assign("index.php")
                            }
                            else{
                                $.notify("Tên sản phẩm bị trùng!", "error");
                            }
                        }
                    });
                }

            });
        });

        function check() {
            let isCheck = true;

            let name = document.getElementById("name").value;
            let address = document.getElementById("address").value;
            let image = document.getElementById("image").value;

            if(name.length === 0){
                isCheck = false;
                document.getElementById("error_name").innerHTML = "Không được để trống tên nhà sản xuất";
            }
            else{
                document.getElementById("error_name").innerHTML = "";
            }

            if(address.length === 0){
                isCheck = false;
                document.getElementById("error_address").innerHTML = "Không được để trống địa chỉ";
            }
            else{
                document.getElementById("error_address").innerHTML = "";
            }

            if(image.length === 0){
                isCheck = false;
                document.getElementById("error_image").innerHTML = "Chưa thêm ảnh sản phẩm";
            }
            else{
                if(!(/(http(s?):)([/|.|\w|\s|-])*\.(?:jpg|gif|png)/).test(image)){
                    isCheck = false;
                    document.getElementById("error_image").innerHTML = "Ảnh không đúng định dạng";
                }
                else{
                    document.getElementById("error_image").innerHTML = "";
                }
                
            }

            return isCheck;
        }
    </script>
</body>
</html>