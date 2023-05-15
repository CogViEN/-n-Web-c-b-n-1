<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .highcharts-figure,
        .highcharts-data-table table {
        min-width: 360px;
        max-width: 800px;
        margin: 1em auto;
        }

        .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
        }

        .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
        }

        .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
        padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
        background: #f1f7ff;
        }
    </style>
</head>
<body>
    <?php require '../menu.php';  ?>
    <div id="wrapper">
        <div id="page-content-wrapper">
            <h1 style="text-align: center; font-size: 25px">Xem doanh thu từ ngày hôm nay trờ về trước</h1>
            <input type="date" id="date" min='2023-03-01' max='<?php  echo date('Y-m-d'); ?>'><button id="btnLastDate">Nhập</button>
            <figure class="highcharts-figure">
                <div id="container"></div>
            </figure>
        </div>
    </div>
    
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#btnLastDate').click(function () { 
                let start_day = $('#date').val();
                if(start_day !== ""){
                        $.ajax({
                        type: "get",
                        url: "process_thong_ke_doanh_thu_theo_ngay.php",
                        data: {start_day},
                        dataType: "json",
                        success: function (response) {
                            const arrX =  Object.keys(response);
                            const arrY =  Object.values(response);
                            getChart(arrX, arrY, start_day);
                        }
                    });   
                }
            });
        });
        function getChart(arrX, arrY, start_day){
            Highcharts.chart('container', {
        title: {
        text: 'Thống kê doanh thu từ ngày ' + start_day + "đến nay" ,
        align: 'left'
        },

       

        xAxis: {
           categories: arrX
        },

        legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
        },

        plotOptions: {
        series: {
            label: {
            connectorAllowed: false
            },

        }
        },

        series: [{
        name: 'Doanh thu',
        data: arrY
        }],

        responsive: {
        rules: [{
            condition: {
            maxWidth: 500
            },
            chartOptions: {
            legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'bottom'
            }
            }
        }]
        }

        });
        }
    </script>
</body>
</html>