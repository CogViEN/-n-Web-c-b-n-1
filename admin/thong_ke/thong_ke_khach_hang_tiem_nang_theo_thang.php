<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            margin: auto;
            width: 50%;
            border-style: none;
            border-spacing: 0;
            border-collapse: collapse;
            text-align: center;
            padding: 12px;
            border: 2px solid rgb(71, 71, 71);
            cursor: pointer;
        }
        tr th {
            background-color: rgb(92, 92, 92);
            padding: 10px;
            color: white;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }
        .mobname {
            background-color: greenyellow;
            color: black;
        }
        h1 {
            text-align: center;
        }
        tr td {
            padding: 9px;
            font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS",
                sans-serif;
        }
        .row {
            background-color: rgb(143, 3, 3);
            color: white;
        }

        .tabdata {
            background-color: rgb(226, 225, 225);
        }
    </style>
</head>
<body>
    <?php require '../menu.php' ?>
    
    <div id="wrapper">
     <div id="page-content-wrapper">
            <h1>Thống kê khách hàng tiềm năng theo tháng</h1>
            <input type="month" id="date" min='2023-03' max='<?php  echo date('Y-m'); ?>'>
            <button id="btnLastDate">Nhập</button>
            <table id="myTable">
                    <tr>
                        <th>Tên khách hàng</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Tổng tiền khách đã mua</th>
                    </tr>
                        <tr></tr>
                    
            </table>
        </div>
    </div>

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#btnLastDate').click(function () { 
                $('.tabdata').remove();
                let month = $('#date').val();
                let name = [];
                let email = [];
                let phone_number = [];
                let total_paid = [];
                if(month !== ""){
                        $.ajax({
                        type: "get",
                        url: "process_thong_ke_khach_hang_tiem_nang_theo_thang.php",
                        data: {month},
                        dataType: "json",
                        success: function (response) {
                            response.forEach(function(v) {
                                name.push(v.name);
                                email.push(v.email);
                                phone_number.push(v.phone_number);
                                total_paid.push(v.total_paid);
                            });
                            insertTable(name, email, phone_number, total_paid);
                        }
                    });   
                }
            });
        });
        function insertTable(name, email, phone_number, total_paid) {
            for (let index = 0; index < name.length; index++) {
                    markup = '<tr class="tabdata">'
                            + '<td>' + name[index] + '</td>'
                            + '<td>' + email[index] + '</td>'
                            + '<td>' + phone_number[index] + '</td>'
                            + '<td>' + total_paid[index] + '</td>'
                            + '</tr>';
                    $('#myTable tr:last').after(markup);
            }
        }
    </script>
</body>
</html>