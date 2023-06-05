<?php require '../check_super_admin_login.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require '../connect.php';

        $id = $_GET['id'];
        $sql = "select * from manufactures where id='$id'";
        $each = mysqli_query($connect,$sql);
        $res = mysqli_fetch_array($each);
        
     ?>
    <!-- <form action="process_update.php" method="post"> -->
        <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
        Tên
        <input type="text" name="name" id="name" value="<?php echo $res['name']?>">
        <span id="error_name"></span>
        <br>
        Địa chỉ
        <textarea name="address" id="address"><?php echo $res['address']?></textarea>
        <span id="error_address"></span>
        <br>
        Ảnh
        <input type="text" name="image" id="image" value="<?php echo $res['image']?>">
        <span id="error_image"></span>
        <br>
        <button id="btn">Sửa</button>
    <!-- </form> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="../../notify.min.js"></script>
    <script>
         $(document).ready(function () {
            $('#btn').click(function () { 
                let id = document.getElementById("id").value;
                let name = document.getElementById("name").value;
                let address = document.getElementById("address").value;
                let image = document.getElementById("image").value;
                
                if(check()){
                    $.ajax({
                        type: "POST",
                        url: "process_update.php",
                        data: {id, name, address, image},
                        // dataType: "dataType",
                        success: function (response) {
                            if(response == 1){
                                window.location.assign("index.php")
                            }
                            else{
                                $.notify("Tên sản phẩm bị trùng hoặc hệ thống đang lỗi vui lòng quay lại sau!", "error");
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