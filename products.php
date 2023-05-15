<style type="text/css">
    @import url("https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;600;700&display=swap");

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

h1{
    position: absolute;
    margin-left: 15px;
}

body {
  font-family: "Noto Sans", sans-serif;
  background-color: #f2f2f2;
  background-color: #444;
}

.section-products {
  height: 137vh;
  padding: 50px 0;
  overflow: auto;
}
.section-products .container {
  padding-left: 15px;
  padding-right: 15px;
  max-width: 800px;
  margin: 0 auto;
}

.section-products .list-products {
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
}

.section-products .product {
  width: 32%;
  background-color: #fff;
  border-radius: 2px;
  overflow: hidden;
  margin-top: 30px;
  transition: box-shadow 0.2s linear;
}
.section-products .product:hover {
  box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
}
.section-products .product .top {
  position: relative;
  overflow: hidden;
}
.section-products .product .top::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.2);
  opacity: 0;
  transition: opacity 0.2s linear;
}
.section-products .product:hover .top::before {
  opacity: 1;
  z-index: 2;
}

.section-products .product .img-product {
  max-width: 100%;
  display: block;
  transition: transform 0.2s ease-in;
}
.section-products .product:hover .img-product {
  transform: scale(1.2) translateX(15px);
}

.section-products .product .btn {
  position: absolute;
  left: 5px;
  top: -40px;
  background-color: #fff;
  height: 35px;
  width: 35px;
  text-align: center;
  line-height: 40px;
  color: #333;
  transition: top 0.2s linear;
  z-index: 3;
}
.section-products .product .btn:hover {
  color: lightsalmon;
}
.section-products .product:hover .btn-view {
  transition-delay: 0.1s;
  top: 5px;
}
.section-products .product:hover .btn-add-to-cart {
  transition-delay: 0.2s;
  top: 45px;
}
.section-products .product:hover .btn-buy {
  transition-delay: 0.3s;
  top: 85px;
}
.section-products .product .btn .icon {
  font-size: 16px;
  margin-top: 10px;
}

.section-products .product .bottom {
  text-align: center;
  padding: 10px 5px;
}
.section-products .product .product-name {
  font-size: 20px;
  color: #555;
}
.section-products .product .product-price {
  margin-top: 7px;
}
.section-products .product .product-price span {
  font-size: 16px;
}

@media only screen and (max-width: 400px) {
  .section-products {
    height: auto;
  }
  .section-products .container {
    max-width: 300px;
  }
  .section-products .list-products {
    display: block;
  }
  .section-products .list-products .product {
    width: 100%;
  }
}

button {
  all: unset;
  cursor: pointer;
}
    .so_luong_trang{
       text-align: center;
       color: black;
    }

    .so_luong_trang a{
        color:  #fff199;
        font-size: 21px;
    }
</style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<?php
    require 'admin/connect.php';
    $sql = "select * from products";
    $result = mysqli_query($connect, $sql);

    // phân trang
    $trang = 1;
    if(isset($_GET['trang'])){
        $trang = $_GET['trang'];    
    }


    $sql_so_san_pham = "select count(*) from products";

    $mang_so_san_pham = mysqli_query($connect,$sql_so_san_pham);
    $ket_qua_so_san_pham = mysqli_fetch_array($mang_so_san_pham);
    $so_san_pham = $ket_qua_so_san_pham['count(*)'];
    $so_san_pham_tren_1_trang = 6;
    $so_trang = ceil($so_san_pham / $so_san_pham_tren_1_trang);
    $bo_qua = $so_san_pham_tren_1_trang * ($trang - 1);

    // sql query
    $sql = "select * from products
    limit $so_san_pham_tren_1_trang offset $bo_qua";
    $result = mysqli_query($connect, $sql);
?>
<div id="giua">
    <section class="section-products">
        <h1 style="">Sản phẩm</h1>
        <div class="container">
            <div class="list-products">
    <?php foreach ($result as $each) : ?>
        <div class="product">
          <div class="top">
            <img src="admin/products/photos/<?php echo $each['image'] ?>" alt="product" class="img-product">
            <a href="product.php?id=<?php echo $each['id'] ?>" class="btn btn-view"><i class="fas fa-eye icon"></i></a>
            <?php if(!empty($_SESSION['id'])) { ?>
                <button
                 class="btn btn-add-to-cart"
                  data-id='<?php echo $each['id'] ?>'>
                  <i class="fa fa-shopping-cart"></i></button>
            <?php } ?>
          </div>
          <div class="bottom">
            <h3 class="product-name" style="color:#ffb37b;"><?php echo $each['name'] ?></h3>
            <h4 class="product-price" style="font-weight:500;">$ <span><?php echo $each['price'] ?></span></h4>
          </div>
        </div>
    <?php endforeach ?>
            </div>
      </div>
  </section>
</div>
<!-- Số lượng trang -->
<div class="so_luong_trang">
<?php for($i = 1; $i <= $so_trang; $i++){ ?>
            <?php if($trang == $i) { ?>
              <a href="?trang=<?php echo $i ?>" style="color: #247ad1ff; text-decoration: none;">
                  <?php echo $i ?>
              </a>
            <?php } else { ?>
              <a href="?trang=<?php echo $i ?>" style="color: #7035d4db; text-decoration: none;">
                  <?php echo $i ?>
              </a>
            <?php } ?>
        <?php }?>
</div>