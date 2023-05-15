<?php
        require '../connect.php';

        $today = $_GET['today'];
        $date = DateTime::createFromFormat("Y-m-d", $today);
        $day = $date->format("d");
        $month = $date->format("m");
        $year = $date->format("Y");

        $sql = "SELECT
        *
        FROM bill
        WHERE EXTRACT(MONTH FROM created_at) = '$month'
        and EXTRACT(YEAR FROM created_at) = '$year' 
        and EXTRACT(DAY FROM created_at) = '$day'";
        $result = mysqli_query($connect, $sql);
        
        $arr = [];
        $i = 0;
        foreach ($result as $each) {
            $arr[$i]['name_receiver'] = $each['name_receiver'];
            $arr[$i]['phone_receiver'] = $each['phone_receiver'];
            $arr[$i]['address_receiver'] = $each['address_receiver'];
            $arr[$i]['status'] = $each['status'];
            $arr[$i]['created_at'] = $each['created_at'];
            $arr[$i]['total_price'] = $each['total_price'];
            $i++;
        }
        echo json_encode($arr);
        
   


    