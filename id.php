<link href="https://fonts.googleapis.com/css?family=Coda:800|Lato:300|Open+Sans" rel="stylesheet">
<style type="text/css">

.card-detail:after {
    content: "";
    display: table;
    clear: both;
}

.card-detail {
  width: 829px;
  background-color: white;
  margin: 60px auto;
  padding: 10px;
}

#img-product {
  width: 80%;
}

#name-product {
  margin: 0;
}

.item {
  float: left;
  width: 50%;
  box-sizing: border-box;
  padding: 0px 10px;
}

#name-product {
  font-size: 2.5rem;
  font-family: 'Coda';
  text-align: center;
  color: #2e3849;
}


#content-product {
  font-family: 'Open Sans';
  color: #8f9491;
  font-size: 20px;
}

.open {
  font-family: 'Open Sans';
  color: #8f9491;
  font-size: 0.8rem;
}

#price1 {
  display: block;
  font-family: 'Lato';
  text-align: center;
  font-size: 1.4rem;
  font-weight: bold;
}


#content-product {
  margin-top: 5px;
}

.stock {
  font-family: 'Lato';
  font-weight: bold;
  color: #2e3849;
}

.btn-add-to-cart {
  background-color: #38e4ae;
  border: 0;
  color: white;
  padding: 6px;
}
.btn-add-to-cart:hover{
  cursor: pointer;
  opacity: 0.5;
}
</style>


<?php
    $id = $_GET['id'];
    require 'admin/connect.php';
    $sql = "select * from products where id=$id";
    $result = mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($result);
    $id_manufactures = $each['manufactures_id'];
    $truy_van_manufactures = "select * from manufactures
                    where id=$id_manufactures";
    $kq = mysqli_query($connect, $truy_van_manufactures);
    $ket_qua = mysqli_fetch_array($kq);
?>

    
    <div class="card-detail">
        <div class="item">
            <div class="text">
            <h1 id="name-product"><?php echo $each['name'] ?></h1>
            <span id="price1">$ <?php echo $each['price'] ?></span>
            <img id="img-product" src="admin/products/photos/<?php echo $each['image'] ?>">
            </div>
        </div>
        <div class="item">

            <p id="content-product"><?php echo $each['description'] ?></p>
            <div class="stock"><?php echo $ket_qua['name']?></div><br>
            <?php if(!empty($_SESSION['id'])) { ?>
                <button
                    data-id='<?php echo $each['id'] ?>'
                    class='btn-add-to-cart'
                >
                    Thêm vào giỏ hàng
                </button>
                <?php require 'rating.php' ?>
            <?php } ?>
        </div>
    </div>
    
