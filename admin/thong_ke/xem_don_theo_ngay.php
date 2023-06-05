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
        <?php require '../menu.php';  ?>
        <div id="wrapper">
            <div id="page-content-wrapper">
                <div class="container-fluid xyz">
                    <div class="row">
                        <div class="col-lg-12">
                        <h1>Xem đơn theo ngày</h1>
                    <input  type="date" id="date" min='2023-03-01' max='<?php  echo date('Y-m-d'); ?>'>
                    <button id="btnLastDate">Nhập</button>
                    <table id="myTable">
                        <tr>
                            <th>Mã đơn</th>
                            <th>Tên khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Tình trạng đơn</th>
                            <th>Đặt vào lúc</th>
                            <th>Tổng tiền</th>
                         </tr>
                        
                            <tr></tr>
                        
            
                    </table>
                        </div>
                    </div>
                </div>
            </div>
         </div>
                    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#btnLastDate').click(function () { 
                $('._row').remove();
                let today = $('#date').val();
                let id = [];
                let name_receiver = [];
                let phone_receiver = [];
                let address_receiver = [];
                let status = [];
                let created_at = [];
                let total_price = [];
                if(today !== ""){
                        $.ajax({
                        type: "get",
                        url: "process_xem_don_theo_ngay.php",
                        data: {today},
                        dataType: "json",
                        success: function (response) {
                            response.forEach(function(v) {
                                id.push(v.id);
                                name_receiver.push(v.name_receiver);
                                phone_receiver.push(v.phone_receiver);
                                address_receiver.push(v.address_receiver);
                                status.push(v.status);
                                created_at.push(v.created_at);
                                total_price.push(v.total_price);
                            });
                            insertTable(id,name_receiver, phone_receiver, address_receiver, status, created_at, total_price);
                        }
                    });   
                }
            });
        });
        function insertTable(id,name_receiver, phone_receiver, address_receiver, status, created_at, total_price) {
            for (let index = 0; index < status.length; index++) {
                if(status[index] == 2){
                    status[index] = "Đã hủy"
                    markup = '<tr class="_row">'
                            + '<td>' + id[index] + '</td>'
                            + '<td>' + name_receiver[index] + '</td>'
                            + '<td>' + phone_receiver[index] + '</td>'
                            + '<td>' + address_receiver[index] + '</td>'
                            + '<td >' + status[index] + '</td>'
                            + '<td>' + created_at[index] + '</td>'
                            + '<td>' + total_price[index] + '</td>'
                            + '</tr>';   
                }
                else{
                    if(status[index] == 0) status[index] = "Mới đặt";
                    else status[index] = "Đã duyệt";
                    markup = '<tr class="_row">'
                            + '<td>' + id[index] + '</td>'
                            + '<td>' + name_receiver[index] + '</td>'
                            + '<td>' + phone_receiver[index] + '</td>'
                            + '<td>' + address_receiver[index] + '</td>'
                            + '<td>' + status[index] + '</td>'
                            + '<td>' + created_at[index] + '</td>'
                            + '<td>' + total_price[index] + '</td>'
                            + '</tr>';
                           
                }
                $('#myTable tr:last').after(markup);
            }
        }
    </script>
</body>
</html>