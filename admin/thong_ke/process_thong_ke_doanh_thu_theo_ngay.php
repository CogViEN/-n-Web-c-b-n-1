<?php
         require '../connect.php';
         $start_day = $_GET['start_day'];

        // Mảng để lưu trữ ngày và doanh thu theo cấu trúc key - values
        $arr = [];

        // lấy ra các ngày từ ngày bắt đầu dến ngày hiên tại
        $start_date = new DateTime($start_day);
        $end_date = new DateTime(); // Lấy ngày hiện tại
        while ($start_date <= $end_date) {
            $arr[$start_date->format('d-m')] = 0;
            $start_date->modify('+1 day');
        }

        // lấy doanh thu từ các ngày bán được
        $sql = "SELECT
                DATE_FORMAT(created_at, '%d-%m') as 'ngay',
                sum(total_price) as 'doanh_thu'
                FROM bill
                where created_at between '$start_day' and curdate()
                GROUP BY DATE_FORMAT(created_at, '%d-%m')" ;
        $result = mysqli_query($connect, $sql);
        foreach ($result as $each) {
            $arr[$each['ngay']] = (int)$each['doanh_thu'];
        }
        echo json_encode($arr);
        