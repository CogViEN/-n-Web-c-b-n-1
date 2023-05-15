<?php require '../check_admin_login.php'; ?>

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
        require '../menu.php';
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

        $sql_so_bai_dang = "select count(*) from products
        where name
        like '%$tim_kiem%'";

        $mang_so_bai_dang = mysqli_query($connect,$sql_so_bai_dang);
        $ket_qua_so_bai_dang = mysqli_fetch_array($mang_so_bai_dang);
        $so_tin_tuc = $ket_qua_so_bai_dang['count(*)'];
        $so_tin_tuc_tren_1_trang = 4;
        $so_trang = ceil($so_tin_tuc / $so_tin_tuc_tren_1_trang);
        $bo_qua = $so_tin_tuc_tren_1_trang * ($trang - 1);

        $sql = "select products.*,
                manufactures.name as manufactures_name
                from products
                join manufactures on products.manufactures_id = manufactures.id
                where products.name like '%$tim_kiem%'
                limit $so_tin_tuc_tren_1_trang offset $bo_qua";
        $result = mysqli_query($connect, $sql);
     ?>
     <div id="wrapper">
    <div id="page-content-wrapper">
        <div class="container-fluid xyz">
            <div class="row">
                <div class="col-lg-12">
                        <h3>Quản lí sản phẩm</h3>
                        <a href="form_insert.php" id="add">Thêm sản phẩm</a>
                        <table border="1" width="100%">
                            <caption>
                                <form action="">
                                    <input type="search" name="tim_kiem" value="<?php echo $tim_kiem?>"
                                    >
                                </form>
                            </caption>
                            <tr>
                                <th>Mã</th>
                                <th>Tên</th>
                                <th>Ảnh</th>
                                <th>Giá</th>
                                <th>Tên nhà sản xuất</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                            <?php foreach ($result as $each): ?>
                                <tr>
                                    <td><?php echo $each['id'] ?></td>
                                    <td><?php echo $each['name'] ?></td>
                                    <td>
                                        <img src="photos/<?php echo $each['image'] ?>"
                                            height="100">
                                    </td>
                                    <td><?php echo $each['price'] ?></td>
                                    <td>
                                        <?php echo $each['manufactures_name'] ?>
                                    </td>
                                    <td>
                                        <a href="form_update.php?id=<?php echo $each['id'] ?>">Sửa</a>
                                    </td>
                                    <td>
                                        <a href="process_delete.php?id=<?php echo $each['id'] ?>">Xóa</a>
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
</div>
