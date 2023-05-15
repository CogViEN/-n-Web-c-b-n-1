<?php
    require '../connect.php';
    $sql = "SELECT 
    products.id,
    products.name,
    ifnull(SUM(quantity), 0) as quantity_sales
    FROM products
    LEFT JOIN bill_product ON bill_product.product_id = products.id
    LEFT JOIN bill on bill.id = bill_product.order_id
    WHERE bill.status = 1 or bill.status IS null
    GROUP BY products.id
    ORDER BY quantity_sales desc";

    $result = mysqli_query($connect, $sql);

    $arr = [];
    $i = 0;
    foreach ($result as $each) {

        $arr[$i][0] = $each['id'];
        $arr[$i][1] = $each['name'];
        $arr[$i][2] = $each['quantity_sales'];
        $i++;
    }

    echo json_encode($arr);