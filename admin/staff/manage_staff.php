<?php require '../check_super_admin_login.php'; ?>

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

    <?php
        require '../connect.php';

        // phan trang
        $trang = 1;
        if(isset($_GET['trang'])){
            $trang = $_GET['trang'];    
        }

        $tim_kiem = "";
        if(isset($_GET['tim_kiem'])){
            $tim_kiem = $_GET['tim_kiem']; 
        }

        $sql_so_bai_dang = "select count(*) from admin
        where id
        like '%$tim_kiem%' and level = 0";

        $mang_so_bai_dang = mysqli_query($connect,$sql_so_bai_dang);
        $ket_qua_so_bai_dang = mysqli_fetch_array($mang_so_bai_dang);
        $so_tin_tuc = $ket_qua_so_bai_dang['count(*)'];
        $so_tin_tuc_tren_1_trang = 4;
        $so_trang = ceil($so_tin_tuc / $so_tin_tuc_tren_1_trang);
        $bo_qua = $so_tin_tuc_tren_1_trang * ($trang - 1);

        $sql = "select * from admin
                where id like '%$tim_kiem%' and level = 0
                limit $so_tin_tuc_tren_1_trang offset $bo_qua";
        $result = mysqli_query($connect, $sql);
     ?>
    
    <?php require '../menu.php' ?>

    <div id="wrapper">
        <div id="page-content-wrapper">
            <div class="container-fluid xyz">
                <div class="row">
                <h1>Quản lí nhân viên</h1>
                        <table border="1" width="100%">
                            <caption>
                                <form action="">
                                    <input type="search" name="tim_kiem" value="<?php echo $tim_kiem?>"
                                    >
                                </form>
                            </caption>
                            <tr>
                                <th>Id</th>
                                <th>Tên tài khoản</th>
                                <th>Email</th>
                                <th>Mật khẩu</th>
                                <th>Xóa</th>
                            </tr>
                            <?php foreach ($result as $each): ?>
                                <tr>
                                    <td><?php echo $each['id'] ?></td>
                                    <td><?php echo $each['name'] ?></td>
                                    <td><?php echo $each['email'] ?></td>
                                    <td>
                                        <?php echo $each['password'] ?>
                                    </td>
                                    <td>
                                        <button class="btn-delete" data-id='<?php echo $each['id'] ?>'>Xóa</button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </table>
                        <div style="text-align: center;">
                            <!-- in ra trang kế tiếp -->
                            <?php for($i = 1; $i <= $so_trang; $i++){ ?>
                                <a href="?trang=<?php echo $i ?> & tim_kiem=<?php echo $tim_kiem?>">
                                    <?php echo $i ?>
                                </a>
                            <?php }?>
                        </div>
                </div>
            </div>
        </div>
    </div>

                       
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> -->
<script src="../../notify.min.js"></script>
<script>
    $(document).ready(function () {
        $('.btn-delete').click(function () { 
            let btn = $(this);
                let id = btn.data('id');                
                $.ajax({
                    type: "GET",
                    url: "delete_staff.php",
                    data: {id},
                    success: function (response) {
                        btn.parents('tr').remove();
                        $.notify("Đã xóa nhân viên thành công", "info");
                    }
                });     
        });
    });
</script>