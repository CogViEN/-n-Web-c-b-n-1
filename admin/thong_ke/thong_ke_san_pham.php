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
        min-width: 310px;
        max-width: 800px;
        margin: 1em auto;
        }

        #container {
        height: 400px;
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
    <?php require '../menu.php' ?>
    <div id="wrapper">
        <div id="page-content-wrapper">
            <div class="container-fluid xyz">
                <div class="row">
                    <div class="col-lg-12">
                    <h1 style="text-align: center">Xem sản phẩm bán được từ ngày hôm nay trờ về trước</h1>
                    <input type="date" id="date" min='2023-03-01' max='<?php  echo date('Y-m-d'); ?>'><button id="btnLastDate">Nhập</button>
                    <figure class="highcharts-figure">
                        <div id="container"></div>
                    </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        
        $(document).ready(function () {
            $('#btnLastDate').click(function () { 
                let last_date = $('#date').val();
                if(last_date !== ""){
                        $.ajax({
                        type: "get",
                        url: "process_thong_ke_san_pham.php",
                        data: {last_date},
                        dataType: "json",
                        success: function (response) {
                            const arr = Object.values(response[0]);
                            const arrDetail = [];
                            Object.values(response[1]).forEach((each) =>{
                                each.data = Object.values(each.data);
                                arrDetail.push(each);
                            })
                            setTimeout(function() {getChart(arr, arrDetail)}, 2000);
                        }
                    });   
                }
            });
        });

        function getChart(arr, arrDetail){
            Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            align: 'left',
            text: 'Số sản phẩm bán được'
        },
        accessibility: {
            announceNewData: {
            enabled: true
            }
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
            text: 'Số lượng sản phẩm'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:f} sản phẩm'
            }
            }
        },
        series: [
            {
            name: 'Danh sách sản phẩm',
            colorByPoint: true,
            data: arr
            }
        ],
        drilldown: {
            series: arrDetail
        }
        });
        }
    </script>
</body>
</html>