<?php
    $id = $_GET['id'];
    $status = $_GET['status'];
    require '../connect.php';
    $sql = "update bill set status = '$status' where id = '$id'";
    mysqli_query($connect, $sql);