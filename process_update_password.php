<?php
    $token = $_POST['token'];
    $password = $_POST['password'];
    require 'admin/connect.php';
    $sql = "select count(*) from forgot_password
            where token='$token'";
    $result = mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($result);
    $count = $each['count(*)'];
    if($count == 1){
        $sql = "select customer_id from forgot_password
                where token='$token'";
        $result = mysqli_query($connect, $sql);
        $each = mysqli_fetch_array($result);
        $id = $each['customer_id'];
        $sql = "update customers
                set password = '$password'
                where id = '$id'";
        mysqli_query($connect, $sql);
        echo '<h1> Đã cập nhật mật khẩu thành công <h1>';
        header( "Refresh:2; url=sign_in.php", true, 303);
    }
    else{
        echo 'Mã xác nhận không tồn tại vui lòng check lại email';
    }