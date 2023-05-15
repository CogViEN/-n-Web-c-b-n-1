<?php
    require '../check_super_admin_login.php'; 
    $name = $_POST['name'];
    $address = $_POST['address'];
    $image = $_POST['image'];

    require '../connect.php';
    

    if(empty($name) || empty($address) || empty($image)){
        header('location:form_insert.php?error=Chưa nhập đầy đủ thông tin');
        exit;
    }

    $sql = "insert into manufactures(name,address,image)
            values('$name','$address','$image')";

    try {
           mysqli_query($connect, $sql);
           header('location:index.php?success=Thêm thành công');
           mysqli_close($connect);
        } catch (mysqli_sql_exception $e) {
            header('location:form_insert.php?error=Tên sản phẩm bị trùng');
    }

    
    
    
