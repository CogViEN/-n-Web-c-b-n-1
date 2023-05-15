<?php require '../check_admin_login.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
         }
         table td, table th {
            border: 1px solid #ddd;
            padding: 8px;
         }

        table tr:nth-child(even){background-color: #f2f2f2;}

        table tr:hover {background-color: #ddd;}

        table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>
<body>
    <?php 
        $order_id = $_GET['id'];
        require '../connect.php';
        $sql = "select *
                 from bill_product
                 join products on products.id = bill_product.product_id
                 where order_id = '$order_id'";
        $result = mysqli_query($connect, $sql); 
        $sum = 0;
    ?>
   <table border="1" width="100%">
        <tr>
            <th>Ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
        </tr>
        <?php foreach ($result as $each): ?>
            <tr>
                <td><img height="100" src="../products/photos/<?php echo $each['image'] ?>"></td>
                <td><?php echo $each['name'] ?></td>
                <td><?php echo $each['price'] ?></td>
                <td>
                    
                    <?php echo $each['quantity'] ?>
                   
                </td>
                <td>
                    <?php
                        echo $each['quantity']*$each['price'];
                        $sum += $each['quantity']*$each['price'];
                    ?>
                 </td>
            </tr>
        <?php endforeach ?>
   </table>
   <h1>Tổng tiền đơn này là: <?php echo $sum ?></h1>
</body>
</html>