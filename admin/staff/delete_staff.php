<?php
    $id = $_GET['id'];

    require '../connect.php';

    $sql = "delete from admin where id='$id'";
    mysqli_query($connect, $sql);