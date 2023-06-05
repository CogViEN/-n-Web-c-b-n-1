<?php
    require '../check_super_admin_login.php'; 
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $image = $_POST['image'];

    require '../connect.php';
    if(empty($id)){
       echo 0;
    }
    else{
        $sql = "SELECT * FROM `manufactures` 
                WHERE name = '$name' and id != '$id'";
        $result = mysqli_query($connect, $sql);
        $row = mysqli_num_rows($result);

        if($row == 1){
            echo 0;
        }
        else{
             $sql = "update manufactures
                set
                name='$name',
                address='$address',
                image='$image'
                where id='$id'";
                mysqli_query($connect, $sql);
                echo 1;
                mysqli_close($connect);
        }

       
    }

    

    
    
    
