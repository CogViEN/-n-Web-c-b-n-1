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
        require 'admin/connect.php';
        $sql = "SELECT 
        EXTRACT(MONTH FROM created_at) AS mth,
        product_id,
        ROUND(AVG(vote_star), 2) AS avg_stars,
        products.name,
        products.price,
        products.image
        FROM ratings
        JOIN products WHERE ratings.product_id = products.id
        GROUP BY 
        EXTRACT(MONTH FROM created_at), 
        product_id
        ORDER BY mth,avg_stars DESC
        limit 4";
        $result = mysqli_query($connect, $sql);
    ?>
    <h1 style="margin-left: 403px; margin-top: 40px;background: -webkit-linear-gradient(#eee, #333);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  position: absolute;
    z-index: 1">Top sản phẩm có đánh giá cao</h1>
    <div class="suggest_card" style="height: 760px; position: sticky;">
    <div class="slider owl-carousel">
            <?php foreach ($result as $each) : ?>
                <div class="card">
                    <div class="img" style="height: 300px">
                        <img src="admin/products/photos/<?php echo $each['image'] ?>" alt="" />
                    </div>
                    <div class="content">
                        <div class="title" style="color: #ffb37b"><?php echo $each['name'] ?></div>
                        <div class="sub-title" style="color:greenyellow;"><?php echo $each['price'] ?>$</div>
                        <p class="suggest-p" style="text-align: center">
                           Được đánh giá  <?php echo $each['avg_stars'] ?>
                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" color="yellow">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                            </svg>
                        </p>
                        <div class="btn">
                            <a href="product.php?id=<?php echo $each['product_id'] ?>">Read more</a>
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