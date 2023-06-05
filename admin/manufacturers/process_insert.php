<?php
    require '../check_super_admin_login.php'; 
    $name = $_POST['name'];
    $address = $_POST['address'];
    $image = $_POST['image'];

    require '../connect.php';
    

   

    $sql = "insert into manufactures(name,address,image)
            values('$name','$address','$image')";

    try {
           mysqli_query($connect, $sql);
            echo 1;
        } catch (mysqli_sql_exception $e) {
           echo 0;
    }

    
    
    
