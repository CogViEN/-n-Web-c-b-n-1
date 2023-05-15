<?php
    session_start();
    
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        body, h1, ul {
            margin: 0;
            padding: 0;
        }  
        #tong{
            width: 100%;
            height: 501px;
        }
        #tren{
            position: -webkit-sticky;
            position: sticky;
            top: 0;
            display: flex;
            justify-content: space-around;
            width: 100%;
            height: 8%;
            background: pink;
        }
        #giua{
            width: 100%;
            height: 88%;
            background-color: #85FFBD;
             background-image: linear-gradient(45deg, #85FFBD 0%, #FFFB7D 100%)
        }
        #duoi{
            width: 100%;
            height: 32%;
            background: white;
        }
    </style>
</head>
<body>
    <div id="tong">
        <?php require 'menu.php' ?>
        <?php require 'hero.php' ?>
        <?php require 'products.php' ?>
        <?php require 'top_product_rating.php' ?>
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