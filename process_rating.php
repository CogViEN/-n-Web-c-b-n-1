<?php
    
        $comment = $_GET['comment'];
        $star = $_GET['rating'];
        session_start();
        $id = $_SESSION['id'];
        $product_id = $_GET['id'];
        require 'admin/connect.php';
        $sql = "select count(*) from ratings where customer_id = '$id' and product_id = '$product_id'";
        $result = mysqli_query($connect, $sql);
        $count = mysqli_fetch_array($result);
        if($count['count(*)'] == 0){
            $sql = "insert into ratings(customer_id, vote_star, comment, product_id)
            values('$id', '$star', '$comment', '$product_id')";
            echo 1;
        }
        else{
            $sql = "update ratings set 
                    vote_star = '$star' ,
                    comment = '$comment'
                    where customer_id = '$id' and product_id = '$product_id'";
            echo 0;
        }
       
        mysqli_query($connect, $sql);
    
    
    