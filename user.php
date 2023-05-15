<?php session_start();
if(empty($_SESSION['id'])){
    header('location:sign_in.php?error=Đăng nhập đi bạn');
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Đây là trang người dùng, xin chào bạn
    <?php
        echo $_SESSION['name'];
        echo $_SESSION['id'];
     ?>
     <a href="sign_out.php">
        Đăng xuất khỏi em!
     </a>
</body>
</html>