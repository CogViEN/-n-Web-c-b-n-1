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
        require '../menu.php';
        require '../connect.php';

        $id = $_GET['id'];
        $sql = "select * from manufactures where id='$id'";
        $each = mysqli_query($connect,$sql);
        $res = mysqli_fetch_array($each);
        
     ?>
    <form action="process_update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        Tên
        <input type="text" name="name" value="<?php echo $res['name']?>">
        <br>
        Địa chỉ
        <textarea name="address"><?php echo $res['address']?></textarea>
        <br>
        Ảnh
        <input type="text" name="image" value="<?php echo $res['image']?>">
        <br>
        <button>Sửa</button>
    </form>
</body>
</html>