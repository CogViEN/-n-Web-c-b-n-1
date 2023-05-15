<?php 
session_start();
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone_number = $_POST['phone_number'];
$address = $_POST['address'];


require 'admin/connect.php';
$sql = "select count(*) from customers
        where email = '$email'";
$result = mysqli_query($connect, $sql);
$number_rows = mysqli_fetch_array($result)['count(*)'];

if($number_rows == 1){
    echo '<h1>Trùng email rồi.Bạn chăc chứ, are you sure!</h1>';  
    header( "Refresh:2; url=sign_up.php", true, 303);
    exit;
}

$sql = "insert into customers(name,email,password,phone_number,address)
        values('$name','$email','$password','$phone_number','$address')";      
mysqli_query($connect, $sql);

// SESSION
$sql = "select id from customers where email='$email'";
$result = mysqli_query($connect, $sql);
$id = mysqli_fetch_array($result)['id'];
$_SESSION['name'] = $name;
$_SESSION['id'] = $id;

echo '<h1>Đăng ký thành công</h1>';
// header('location:index.php');
// header( "Refresh:2; url=index.php", true, 303);

header("location: process_mail.php?mess=1&mail=$email");

mysqli_close($connect);
