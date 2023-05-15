<?php require '../check_admin_login.php'; ?>
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
        $id = $_GET['id'];
        require '../connect.php';
        $sql = "select * from manufactures";
        $truy_van = "select * from products where id='$id'";
        $result = mysqli_query($connect, $sql);
        $ket_qua = mysqli_query($connect, $truy_van);
        $each = mysqli_fetch_array($ket_qua);
     ?>
     <form action="process_update.php?" method="post" enctype="multipart/form-data">
        Tên
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <input type="text" name="name" value="<?php echo $each['name'] ?>">
        <br>
        Ảnh cũ
        <img src="photos/<?php echo $each['image'] ?>" alt="" height="100">
        <input type="hidden" name="image_old" value="<?php echo $each['image'] ?>">
        <br>
        Đổi Ảnh mới
        <input type="file" name="image_new">
        <br>
        Giá
        <input type="number" name="price" value="<?php echo $each['price'] ?>">
        <br>
        Mô tả
        <textarea name="description"><?php echo $each['description'] ?></textarea>
        <br>
        Nhà sản xuất
        <select name="manufactures_id">
            <?php foreach ($result as $manufacture): ?>
                <option
                 value="<?php echo $manufacture['id']?>"
                 <?php if($each['manufactures_id'] == $manufacture['id']){ ?>
                    selected
                <?php } ?>
                >
                    <?php echo $manufacture['name']?>
                </option>
            <?php endforeach ?>
        </select>
        <br>
        <button>Sủa</button>
     </form>
</body>
</html>