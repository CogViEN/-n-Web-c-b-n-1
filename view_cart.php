<meta charset="UTF-8" />

<link
    rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
/>
<link rel="stylesheet" href="css_view_cart.css"/>

<?php
        session_start();
        $count_product = 0;
        if(isset($_SESSION['cart'])){
            $cart = $_SESSION['cart']; 
            $count_product = count($_SESSION['cart']);
        }
        
        $total = 0;
    ?>
    <?php require 'menu.php' ?>
    <style>
    #tren{
        height: 7%
    }
</style>
<div class="container mt-5 p-3 rounded cart">
    <div class="row no-gutters">
        <div class="col-md-8">
            <div class="product-details mr-2">
                <hr />
                <h6 class="mb-0">Giỏ hàng</h6>
                <div class="d-flex justify-content-between">
                    <span>Bạn có <?php echo $count_product  ?> sản phẩm</span>
                </div>
                <?php 
                    if(isset($_SESSION['cart'])){
                        foreach ($cart as $id => $each): 
                 ?>
                 <!-- Sản phẩm -->
                <div class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded" id="rt">
                    <div class="d-flex flex-row">
                        <img
                            class="rounded"
                            src="admin/products/photos/<?php echo $each['image'] ?>"
                            width="40"
                        />
                        <div class="ml-2">
                            <span class="font-weight-bold d-block"><?php echo $each['name'] ?></span>
                            <span class="span-price" style="font-weight:400"><?php echo $each['price'] ?></span>
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center">
                        <!-- tăng -->
                        <button 
                            class="btn-update-quantity"
                            data-id='<?php echo $id ?>'
                            data-type='1'
                        >
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                          </svg>
                        </button>
                        <span class="span-quantity"><?php echo $each['quantity'] ?></span>
                        <!-- Giảm -->
                        <button
                            class="btn-update-quantity"
                            data-id='<?php echo $id ?>'
                            data-type='0'
                        >
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z"/>
                          </svg>
                        </button>
                        <span class="span-sum" style="margin-left: 52px; margin-right: 19px; font-weight: 700">
                            <?php
                                $sum = $each['quantity'] *  $each['price']; 
                                $total += $sum;
                                echo $sum;
                            ?>
                        </span>
                        <!-- Xóa sản phẩm -->
                        <button class="btn-delete" data-id='<?php echo $id ?>' 
                            style=" color: #859f38;
                            background-color:transparent;
                            text-decoration: none;
                            border: none;
                            outline: 0 !important;"
                        >
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                          </svg>
                        </button>
                    </div>
                </div>
                <?php endforeach ?>
             <?php } ?>
            </div>
        </div>
        <?php
        $id = $_SESSION['id'];
        require 'admin/connect.php';
        $sql = "select * from customers where id = '$id'";
        $result = mysqli_query($connect, $sql);
        $each = mysqli_fetch_array($result);
        ?>
        <div class="col-md-4">
            <form class="payment-info"  action="process_checkout.php" method="post">
                <div class="d-flex justify-content-between align-items-center">
                    <span>Thông tin vận đơn hàng</span
                    ><img
                        class="rounded"
                        src="https://i.imgur.com/WU501C8.jpg"
                        width="30"
                    />
                </div>
                <div>
                    <label class="credit-card-label">Tên người nhận</label
                    ><input
                        name="name_receiver"
                        type="text"
                        class="form-control credit-inputs"
                        placeholder="Name"
                        value="<?php echo $each['name'] ?>"
                    />
                </div>
                <div>
                    <label class="credit-card-label">SDT người nhận</label
                    ><input
                        name="phone_receiver"
                        type="text"
                        class="form-control credit-inputs"
                        placeholder="0000 0000 0000 0000"
                        value="<?php echo $each['phone_number'] ?>"
                    />
                </div>
                <div>
                    <label class="credit-card-label">Địa chỉ người nhận</label
                    ><input
                        name="address_receiver"
                        type="text"
                        class="form-control credit-inputs"
                        placeholder="Name"
                        value="<?php echo $each['address'] ?>"
                    />
                </div>
                <hr class="line" />
                <div class="d-flex justify-content-between information">
                    <span style="font-size: 24px;">Tổng tiền</span><span id="span-total" style="font-size: 26px;"><?php echo $total ?></span>
                </div>
                <button
                    class="btn btn-primary btn-block d-flex justify-content-between mt-3"
                    type="submit"
                >
                    <span>Thanh toán<i class="fa fa-long-arrow-right ml-1"></i
                    ></span>
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Jquery process -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> -->
    <script type="text/javascript">
        $(document).ready(function () {
            $(".btn-update-quantity").click(function () { 
                let btn = $(this);
                let id = btn.data('id');                
                let type = parseInt(btn.data('type'));     
                $.ajax({
                    type: "GET",
                    url: "update_quantity_in_cart.php",
                    data: {id, type},
                    success: function (response) {
                        let parent_tr = btn.parents('#rt');
                        let price = parent_tr.find('.span-price').text();
                        let quantity = parent_tr.find('.span-quantity').text();
                        if(type == 1){
                            quantity++;
                        }
                        else{
                            quantity--;
                        }
                        if(quantity === 0){
                            parent_tr.remove();
                        }
                        else{
                            parent_tr.find('.span-quantity').text(quantity);
                            let sum = price * quantity;
                            parent_tr.find('.span-sum').text(sum);
                        }
                        getTotal();
                       
                    }
                });       
            });
            $(".btn-delete").click(function () { 
                let btn = $(this);
                let id = btn.data('id');                
                $.ajax({
                    type: "GET",
                    url: "delete_from_cart.php",
                    data: {id},
                    success: function (response) {
                        btn.parents('#rt').remove();
                        getTotal();
                        
                    }
                });       
            });
        });
        function getTotal(){
                        let total = 0;
                        $('.span-sum').each(function () {
                            total += parseFloat($(this).text());
                        });
                        $('#span-total').text(total);   
                        $('#span-total').val(total);
        }
    </script>