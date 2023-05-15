<?php
   require '../connect.php';
   $last_date = $_GET['last_date'];
   $sql = "SELECT
   products.id as 'ma_san_pham',
   products.name as 'ten_san_pham',
   DATE_FORMAT(created_at, '%d-%m') as 'ngay',
   sum(quantity) as 'so_san_pham_ban_duoc'
   from bill
   JOIN bill_product on bill.id = bill_product.order_id
   JOIN products ON products.id = bill_product.product_id
   where created_at between '$last_date' and curdate()
   GROUP BY products.id,DATE_FORMAT(created_at, '%d-%m')";

    $result = mysqli_query($connect, $sql);

    // arrX
    $arr = [];
    foreach ($result as $each) {
        $ma_san_pham = $each['ma_san_pham'];
        if(empty($arr[$ma_san_pham])){
            $arr[$ma_san_pham] = [
                'name' => $each['ten_san_pham'],
                'y' => (int)$each['so_san_pham_ban_duoc'],
                'drilldown' => (int)$each['ma_san_pham'],
            ];
        }
        else{
            $arr[$ma_san_pham]['y'] += $each['so_san_pham_ban_duoc'];
        }
        
    }

    // arrY
    $arr2 = [];
    foreach($arr as $ma_san_pham => $each){
        $arr2[$ma_san_pham] = [
            'name' => $each['name'],
            'id' => $ma_san_pham,
        ];
        $arr2[$ma_san_pham]['data'] = [];

         // lấy ra các ngày từ ngày bắt đầu dến ngày hiên tại
         $start_date = new DateTime($last_date);
         $end_date = new DateTime(); // Lấy ngày hiện tại
         while ($start_date <= $end_date) {
             $arr2[$ma_san_pham]['data'][$start_date->format('d-m')] = [
                $start_date->format('d-m'),
                0
            ];
            $start_date->modify('+1 day');
         }
    }
    foreach ($result as $each){
        $ma_san_pham = $each['ma_san_pham'];
        $key = $each['ngay'];
        $arr2[$ma_san_pham]['data'][$key] = [
            $key,
            (float)$each['so_san_pham_ban_duoc']
        ];
    }

    $object = json_encode([$arr, $arr2]);
    echo $object;
    