<?php require '../check_admin_login.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/themes/github.css">
    <link rel="stylesheet" href="bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css">
    <style>
        span{
            color: red;
        }
    </style>
</head>
<body>
     <?php
        require '../connect.php';
        $sql = "select * from manufactures";
        $result_manufactures = mysqli_query($connect, $sql);
     ?>
     <h1>Thêm sản phẩm</h1>
     <form action="process_insert.php" method="post" enctype="multipart/form-data">
        Tên
        <input type="text" name="name" id="name">
        <span id="error_name"></span>
        <br>
        Ảnh
        <input type="file" name="image" id="image">
        <span id="error_image"></span>
        <br>
        Giá
        <input type="number" name="price" id="price" min="1">
        <span id="error_price"></span>
        <br>
        Mô tả
        <textarea name="description" id="description"></textarea>
        <span id="error_description"></span>
        <br>
        Nhà sản xuất
        <select name="manufactures_id" id="manufactures_id">
            <?php foreach ($result_manufactures as $each): ?>
                <option value="<?php echo $each['id']?>">
                    <?php echo $each['name']?>
                </option>
            <?php endforeach ?>
        </select>
        <br>
        Thể loại
        <input type="text" name="type_names" id="type">
        <span id="error_type"></span>
        <br>
        <button onclick="return check()">Thêm</button>
     </form>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
     <script src="bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.js"></script>
     <script src="typehead.bundle.js"></script>
     <script>

       function check() {
            let isCheck = true;
            let name = document.getElementById("name").value;
            let image = document.getElementById("image").value;
            let price = document.getElementById("price").value;
            let description = document.getElementById("description").value;
            let type = document.getElementById("type").value;

            if(name.length === 0){
                isCheck = false;
                document.getElementById("error_name").innerHTML = "Không được để trống tên sản phẩm";
            }
            else{
                document.getElementById("error_name").innerHTML = "";
            }

            if(image.length === 0){
                isCheck = false;
                document.getElementById("error_image").innerHTML = "Chưa thêm ảnh sản phẩm";
            }
            else{
                if(!(/\.(gif|jpe?g|tiff?|png|webp|bmp)$/i).test(image)){
                    isCheck = false;
                    document.getElementById("error_image").innerHTML = "Ảnh không đúng định dạng";
                }
                else{
                    document.getElementById("error_image").innerHTML = "";
                }
                
            }

            if(price.length === 0){
                isCheck = false;
                document.getElementById("error_price").innerHTML = "Không được để trống giá sản phẩm";
            }
            else{
                document.getElementById("error_price").innerHTML = "";
            }

            if(description.length === 0){
                isCheck = false;
                document.getElementById("error_description").innerHTML = "Không được để trống mô tả sản phẩm";
            }
            else{
                document.getElementById("error_description").innerHTML = "";
            }
           
            if(type.length === 0){
                isCheck = false;
                document.getElementById("error_type").innerHTML = "Không được để trống mô tả sản phẩm";
            }
            else{
                document.getElementById("error_type").innerHTML = "";
            }
            return isCheck;
       }

        $(document).ready(function () {
            $("form").keypress(function (event) { 
                if(event.keyCode == 13){
                    event.preventDefault();
                }
            });
            var types = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
                remote: {
                    url: 'list_type.php?q=%QUERY',
                    wildcard: '%QUERY'
                }
            });
          

            $('#type').tagsinput({
                typeaheadjs: {
                    displayKey: 'name',
                    valueKey: 'name',
                    source: types
                },
                freeInput: true,
                
            });
        });
     </script>
</body>
</html>