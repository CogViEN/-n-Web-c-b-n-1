
    <?php
        require '../connect.php';
        $month_year = $_GET['month'];
        $date = DateTime::createFromFormat("Y-m", $month_year);
        $month = $date->format("m");
        $year = $date->format("Y");
        $sql = "SELECT
        *
        FROM bill
        WHERE EXTRACT(MONTH FROM created_at) = '$month'
        and EXTRACT(YEAR FROM created_at) = '$year'";
        $result = mysqli_query($connect, $sql);

        $arr = [];
        $i = 0;
        foreach ($result as $each) {
            $arr[$i]['id'] = $each['id'];
            $arr[$i]['name_receiver'] = $each['name_receiver'];
            $arr[$i]['phone_receiver'] = $each['phone_receiver'];
            $arr[$i]['address_receiver'] = $each['address_receiver'];
            $arr[$i]['status'] = $each['status'];
            $arr[$i]['created_at'] = $each['created_at'];
            $arr[$i]['total_price'] = $each['total_price'];
            $i++;
        }
        echo json_encode($arr);
       
    