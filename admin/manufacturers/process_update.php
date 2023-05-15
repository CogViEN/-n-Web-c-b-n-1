<?php
    require '../check_super_admin_login.php'; 
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $image = $_POST['image'];

    require '../connect.php';
    if(empty($id)){
        header('location:index.php?');
        exit;
    }
    if(empty($name) || empty($address) || empty($image)){
        header("location:form_update.php?error=Chưa nhập đầy đủ thông tin & id=$id");
        exit;
    }

    $sql = "update manufactures
            set
            name='$name',
            address='$address',
            image='$image'
            where id='$id'";
    mysqli_query($connect, $sql);
    header('location:index.php?success=Sửa thành công');
    mysqli_close($connect);

    
    
    
