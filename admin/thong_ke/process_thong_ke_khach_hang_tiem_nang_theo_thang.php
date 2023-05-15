<?php
        require '../connect.php';
        $month_year = $_GET['month'];
        $date = DateTime::createFromFormat("Y-m", $month_year);
        $month = $date->format("m");
        $year = $date->format("Y");

        $sql = "SELECT
        email,
        name,
        phone_number,
        SUM(total_price)as total_paid
        FROM customers LEFT JOIN bill on bill.customer_id = customers.id
        WHERE bill.status = 1
        and EXTRACT(MONTH FROM created_at) = $month
        and EXTRACT(YEAR FROM created_at) = $year 
        GROUP BY customers.id
        ORDER BY total_paid DESC";
        $result = mysqli_query($connect, $sql);

        $arr = [];
        $i = 0;
        foreach ($result as $each) {
            $arr[$i]['name'] = $each['name'];
            $arr[$i]['email'] = $each['email'];
            $arr[$i]['phone_number'] = $each['phone_number'];
            $arr[$i]['total_paid'] = $each['total_paid'];
            $i++;
        }
        echo json_encode($arr);
    