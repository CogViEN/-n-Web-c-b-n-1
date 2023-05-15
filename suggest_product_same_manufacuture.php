<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        />
        <link rel="stylesheet" href="css_slider_suggest.css" />
</head>
<body>
    <?php
        $id_product = $_GET['id'];
        $sql = "SELECT * from products
        where manufactures_id = (SELECT manufactures_id from products where id = '$id_product') and id != '$id_product'";
        $result = mysqli_query($connect, $sql);
    ?>
    <div class="suggest_card">
        <h1>Có thể bạn sẽ thích</h1>
    <div class="slider owl-carousel">
            <?php foreach ($result as $each) : ?>
                <div class="card">
                    <div class="img">
                        <img src="admin/products/photos/<?php echo $each['image'] ?>" alt="" />
                    </div>
                    <div class="content">
                        <div class="title"><?php echo $each['name'] ?></div>
                        <div class="sub-title" style="color:greenyellow;"><?php echo $each['price'] ?>$</div>
                        <p class="suggest-p">
                            <?php echo $each['description'] ?>
                        </p>
                        <div class="btn">
                            <a href="product.php?id=<?php echo $each['id'] ?>">Read more</a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
        <script>
            $(".slider").owlCarousel({
                loop: true,
                autoplay: true,
                autoplayTimeout: 2000, //2000ms = 2s;
                autoplayHoverPause: true,
            });
        </script>
</body>
</html>