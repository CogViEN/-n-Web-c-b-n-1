<?php require '../check_admin_login.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
         }
         table td, table th {
            border: 1px solid #ddd;
            padding: 8px;
         }

        table tr:nth-child(even){background-color: #f2f2f2;}

        table tr:hover {background-color: #ddd;}

        table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>
<body>
    <?php 
        require '../connect.php';
        require '../menu.php';
        $trang = 1;
        if(isset($_GET['trang'])){
            $trang = $_GET['trang'];    
        }

        $sql_so_bai_dang = "select count(*) from bill";

        $mang_so_bai_dang = mysqli_query($connect,$sql_so_bai_dang);
        $ket_qua_so_bai_dang = mysqli_fetch_array($mang_so_bai_dang);
        $so_tin_tuc = $ket_qua_so_bai_dang['count(*)'];
        $so_tin_tuc_tren_1_trang = 4;
        $so_trang = ceil($so_tin_tuc / $so_tin_tuc_tren_1_trang);
        $bo_qua = $so_tin_tuc_tren_1_trang * ($trang - 1);

        $sql = "select bill.*,
                customers.name,
                customers.phone_number,
                customers.address
                from bill
                join customers
                on customers.id = bill.customer_id
                order by bill.id DESC
                limit $so_tin_tuc_tren_1_trang offset $bo_qua";
        $result = mysqli_query($connect, $sql); 
    ?>
    <div id="wrapper">
        <div id="page-content-wrapper">
            <div class="container-fluid xyz">
                <div class="row">
                    <div class="col-lg-12">
                    <h1>Duyệt đơn hàng</h1>
                    <table border="1" width="100%">
                            <tr>
                                <th>Mã</th>
                                <th>Thời gian</th>
                                <th>Thông tin người nhận</th>
                                <th>Thông tin người đặt</th>
                                <th>Trạng thái</th>
                                <th>Tổng tiền</th>
                                <th>Xem</th>
                                <th>Sửa</th>
                            </tr>
                            <?php foreach ($result as $each): ?>
                                <tr>
                                    <td><?php echo $each['id'] ?></td>
                                    <td><?php echo $each['created_at'] ?></td>
                                    <td>
                                        <?php echo $each['name_receiver'] ?><br>
                                        <?php echo $each['phone_receiver'] ?><br>
                                        <?php echo $each['address_receiver'] ?>
                                    </td>
                                    <td>
                                        <?php echo $each['name'] ?><br>
                                        <?php echo $each['phone_number'] ?><br>
                                        <?php echo $each['address'] ?>
                                    </td>
                                    <td class="status">
                                        <?php
                                            if($each['status'] == 0){
                                                echo "Mới đặt";
                                            } 
                                            else if($each['status'] == 1){
                                                echo "Đã duyệt";
                                            }
                                            else if($each['status'] == 2){
                                                echo "Đã hủy";
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $each['total_price'] ?></td>
                                    <td>
                                        <a href="detail.php?id=<?php echo $each['id']?>">Xem</a>
                                    </td>
                                    <td>
                                        <?php if($each['status'] == 0){ ?>
                                            <button 
                                                class="btn-update"
                                                data-id='<?php echo $each['id'] ?>'
                                                data-type='1'
                                            >
                                            Duyệt
                                            </button>
                                            <br>
                                            <br>
                                            <button 
                                                class="btn-update"
                                                data-id='<?php echo $each['id'] ?>'
                                                data-type='2'
                                            >
                                            Hủy
                                            </button>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                    </table>
                    <div style="text-align: center">
                            <!-- in ra trang kế tiếp -->
                            <?php for($i = 1; $i <= $so_trang; $i++){ ?>
                                <a href="?trang=<?php echo $i ?>">
                                    <?php echo $i ?>
                                </a>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.btn-update').click(function () { 
                let btn = $(this);
                let id = btn.data('id');                
                let status = parseInt(btn.data('type'));     
                $.ajax({
                    type: "GET",
                    url: "update.php",
                    data: {id, status},
                    // dataType: "dataType",
                    success: function (response) {
                        var dom = btn.parents('tr');
                        btn.parents('td').remove();
                        if(status == 1){
                            $('.status',dom).text('Đã duyệt');
                        }
                        else $('.status',dom).text('Đã hủy');
                    }
                });
                
            });
        });
    </script>
</body>
</html>