<?php
    try{
        session_start();
        // unset($_SESSION['cart']); // biến SESSION['cart'] thành mảng
        if(empty($_GET['id'])){
            throw new Exception("Không tồn tại id");
        }
        $id = $_GET['id'];
    
        if(empty($_SESSION['cart'][$id])){
           require 'admin/connect.php';
           $sql = "select * from products
                   where id='$id'";
            $result = mysqli_query($connect, $sql);
            $each = mysqli_fetch_array($result);
            $_SESSION['cart'][$id]['name'] = $each['name'];
            $_SESSION['cart'][$id]['image'] = $each['image'];
            $_SESSION['cart'][$id]['price'] = $each['price'];
            $_SESSION['cart'][$id]['quantity'] = 1;
        }
        else{
            $_SESSION['cart'][$id]['quantity']++;
        }
        echo 1;
    }
    catch(Throwable $e){
        echo $e->getMessage();
    }
   

    // echo json_encode($_SESSION['cart']);
    