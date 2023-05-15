<?php
    $name_receiver = $_POST['name_receiver'];
    $phone_receiver = $_POST['phone_receiver'];
    $address_receiver = $_POST['address_receiver'];

    require 'admin/connect.php';
    session_start();

    $cart = $_SESSION['cart'];

    $total_price = 0;
    foreach($cart as $id => $each){
        $total_price += $each['quantity'] * $each['price'];
    }
    if($total_price == 0){
        header('location: index.php');
        exit;
    }
    $customer_id = $_SESSION['id'];
    $status = 0; // mới đặt

    $sql = "insert into bill(customer_id, name_receiver,
     phone_receiver, address_receiver, status,
    total_price) values('$customer_id', '$name_receiver',
    '$phone_receiver',' $address_receiver', '$status',
     '$total_price')";
     mysqli_query($connect, $sql);

     $sql = "select max(id) from bill where customer_id='$customer_id'";
     $result = mysqli_query($connect,$sql);
     $order_id = mysqli_fetch_array($result)['max(id)'];

     foreach($cart as $product_id => $each){
        $quantity = $each['quantity'];
        $sql = "insert into bill_product(order_id, product_id,
         quantity) values('$order_id', '$product_id','$quantity')";
         mysqli_query($connect, $sql);
     }

     mysqli_close($connect);
     unset($_SESSION['cart']);

     header('location: index.php');