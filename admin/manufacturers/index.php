<?php require '../check_super_admin_login.php'; ?>
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
        require '../menu.php'; 
        require '../connect.php'; 
        $sql = "select * from manufactures";
        $each = mysqli_query($connect,$sql);

    ?>

    
    <div id="wrapper">
    <div id="page-content-wrapper">
        <div class="container-fluid xyz">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Quản lí nhà sản xuất</h1>
                    <a href="form_insert.php?check=true" id="add">Thêm nhà sản xuất</a>
                    <table border='1' width="100%">
                        <tr>
                            <th>Mã</th>
                            <th>Tên nhà sản xuất</th>
                            <th>Địa chỉ</th>
                            <th>Ảnh</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                        <?php foreach($each as $x) : ?>
                        <tr>
                            
                            <td> <?php echo $x['id'] ?></td>
                            <td> <?php echo $x['name'] ?></td>
                            <td> <?php echo $x['address'] ?></td>
                            <td>
                                <img height="100" src="<?php echo $x['image'] ?>" alt="">  
                            </td>
                            <td>
                                <a href="form_update.php?id=<?php echo $x['id'] ?>">Sửa</a>
                            </td>
                            <td>
                                <a href="process_delete.php?id=<?php echo $x['id'] ?>">Xóa</a>
                            </td>
                        </tr>
                        <?php endforeach ?> 
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>