<?php
    require '../connect.php';

    $number = $_POST['number'];
    $password = $_POST['password'];

    $sql = "SELECT max(id) as max_id FROM admin";

    $result = mysqli_query($connect, $sql);
    $result = mysqli_fetch_array($result);
    $max_id = $result['max_id'];

    $number_staff = $number + $max_id;

    for($i = $max_id+1; $i <= $number_staff; $i++){
        $name = "nô lệ tư bản " . $i;
        $email = "admin" . $i . "@gmail.com";
        $sql = "insert into admin(name, email, password) values('$name', '$email', '$password')";
        mysqli_query($connect, $sql);
    }

