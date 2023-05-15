<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        #tong{
            width: 100%;
            height: 700px;
            background: white;
        }
        #tren{
            width: 100%;
            height: 20%;
            background: pink;
        }
        #giua{
            width: 100%;
            height: 70%;
            background: red;
        }
        
        
    </style>
</head>
<body>
    <div id="tong">
        <?php require 'menu.php' ?>
        <?php require 'id.php' ?> 
        <?php require 'suggest_product_same_manufacuture.php' ?>
        <?php require 'footer.php' ?>
    </div>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> -->
    <script src="notify.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.btn-add-to-cart').click(function () { 
                let id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    url: "add_to_cart.php",
                    data: {id},
                    // dataType: "dataType",
                    success: function (data) {
                        if(data == 1){
                            $.notify("Đã thêm vào giỏ hàng thành công", "success");
                        }
                        else{
                            alert(data);
                        }
                    } 
                });
            });
           
        });
    </script>
</body>
</html>