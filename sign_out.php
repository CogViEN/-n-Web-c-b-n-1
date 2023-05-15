<?php
    session_start();
    unset($_SESSION['id']);
    unset($_SESSION['name']);
    unset($_SESSION['cart']);
    setcookie('remember',null,-1);

    header('location: index.php');
    