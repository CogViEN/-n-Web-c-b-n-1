<?php
    require '../check_admin_login.php'; 
    $name = $_POST['name'];
    $image = $_FILES['image'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $manufactures_id = $_POST['manufactures_id'];
    $type_names = explode(',', $_POST['type_names']);

    $folder = 'photos/';

    $file_extension = explode('.', $image['name'])[1];
    $file_name = time() . '.' . $file_extension;
    $path_file = $folder . $file_name;

    move_uploaded_file($image["tmp_name"], $path_file);

    require '../connect.php';
    $sql = "insert into products(name,image,price,description,
            manufactures_id) values('$name','$file_name','$price',
            '$description','$manufactures_id')"; 
    mysqli_query($connect, $sql);

    $product_id = mysqli_insert_id($connect); // get id product after inserted
    foreach ($type_names as $type_name) {
        $sql = "select * from type where name = '$type_name'";
        $result = mysqli_query($connect, $sql);
        $type = mysqli_fetch_array($result);
        if(empty($type)){
                $sql = "insert into type(name) values('$type_name')";
                mysqli_query($connect, $sql);
                $type_id = mysqli_insert_id($connect);
        }
        else{
                $type_id = $type['id'];
        }

        $sql = "insert into product_type values('$product_id','$type_id')"; 
        mysqli_query($connect, $sql);
    }
    header('location: index.php');
    // $mysqli_close($connect);