<style>
   

    

    #table_statis_4 {
        width: 938px;
        border-collapse: collapse;
    }

    table td, table th {
            border: 1px solid #ddd;
            padding: 8px;
         }

        table tr:nth-child(even){background-color: #f2f2f2;}

        table tr:hover {background-color: #ddd;}

    td,
    tr,
    tbody,
    th {
        padding: 15px 0;
        text-align: center;
    }

    

    label {
        padding: 0 30px;
    }

    .header_table {
        width: 938px;
        color: white;
        text-align: center;
        padding: 15px 0;
        background: #131417;
        box-shadow: 0 0 5px rgb(0 0 0 / 20%);
    }

    .header_table i {
        cursor: pointer;
        width: 20px;
        height: 20px;
        padding: 2px;
        text-align: center;
        align-items: center;
        border-radius: 50px;
        transition: 0.2s ease-out;
    }

    .header_table i:hover {
        color: #131417;
        background: #0ff090;
    }

    
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<?php require '../menu.php' ?>
<div id="wrapper">
    <div id="page-content-wrapper">
        <div class="container-fluid xyz">
            <div class="row">
                <div class="col-lg-12">
                    
                        <table id="table_statis_4">
                            <div class="header_table">
                                <i class="fas fa-chevron-left"></i>
                                <label class="pages">TABLE</label>
                                <i class="fas fa-chevron-right"></i>
                            </div>
                            <tr style="background-color: #04AA6D; color: white;">
                                <td>Mã sản phẩm</td>
                                <td>Tên sản phẩm</td>
                                <td>Số lượng đã bán</td>
                            </tr>
                            <tbody class="pagination_table">
                            </tbody>
                        </table>
                        
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        var storage = [];
        $.ajax({
            url: "process_thong_ke_san_pham_ban_chay_va_khong_chay.php",
            dataType: "json",
            success: function (response) {
                storage = Object.values(response);
                var page = 0;
                var maxRow = 5;
                createDash(storage, page, maxRow)
                $(".fa-chevron-right").click((e) => {
                        e.preventDefault();

                        if (page < storage.length / maxRow && page <= maxRow) {
                            page++;
                            createDash(storage, page, maxRow)
                        } else {
                        }

                        e.stopImmediatePropagation();
                    });

                    $(".fa-chevron-left").click((e) => {
                        e.preventDefault();

                        if (page > 0) {
                            page--;
                            createDash(storage, page, maxRow)
                        } else {
                        }

                        e.stopImmediatePropagation();
                    });

            }
        });
    });
    function createDash(storage, page, maxRow) {
            $(".pagination_table > tr").remove();

            for (
                var i = page * maxRow;
                i < storage.length && i < (page + 1) * maxRow;
                i++
            ) {
                $(".pagination_table").append(
                    "<tr>" +
                        "<td>" +
                        storage[i][0] +
                        "</td>" +
                        "<td>" +
                        storage[i][1] +
                        "</td>" +
                        "<td>" +
                        storage[i][2] +
                        "</td>" +
                    "</tr>"
                );
            }
            $(".pages").text(
                "Page " +
                    (page + 1) +
                    " of " +
                    Math.ceil(storage.length / maxRow)
            );
        }
</script>
