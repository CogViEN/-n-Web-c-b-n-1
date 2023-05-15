<?php
    $email = $_POST['email'];
    $password = $_POST['password'];
    require 'connect.php';

    $sql = "select * from admin
            where email = '$email' and password = '$password'";
    $result = mysqli_query($connect, $sql);
    if(mysqli_num_rows($result) === 1){
        $each = mysqli_fetch_array($result);
        session_start();

        $_SESSION['id_admin'] = $each['id'];
        $_SESSION['level'] = $each['level'];
        $_SESSION['name_admin'] = $each['name'];

       echo 1;
    }
    else{
        echo 0;
    }
    
    