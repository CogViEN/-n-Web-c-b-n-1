<?php require '../check_admin_login.php'; ?>
    <?php
        require '../menu.php'; 
        require '../connect.php';

        $sql = "select sum(total_price) as sum_total from bill
                where created_at between (select CAST(DATE_FORMAT(NOW() ,'%Y-%m-01') as DATE)) and curdate()
                and status = 1";
        $result = mysqli_query($connect, $sql);
        $total_price_month = mysqli_fetch_array($result);

        $sql = "SELECT sum(quantity) as so_luong from bill_product
        join bill on bill.id = bill_product.order_id
        where bill.status = 1";
        $result = mysqli_query($connect, $sql);
        $count_product = mysqli_fetch_array($result);

        $sql = "SELECT * 
        FROM bill
        WHERE EXTRACT(YEAR FROM created_at) = (SELECT YEAR(CURDATE()))";
        $result = mysqli_query($connect, $sql);
        $count_bill = mysqli_num_rows($result);
    ?>

<style>
    .wrapper-demo {
  height: 7vh;
  color: #423f3b;
  font-weight: 600;
  /*This part is important for centering*/
  /* display: grid; */
  /* place-items: center; */
}

.typing-demo {
  width: 22ch;
  animation: typing 2s steps(22), blink .5s step-end infinite alternate;
  white-space: nowrap;
  overflow: hidden;
  border-right: 3px solid;
  font-family: monospace;
  font-size: 2em;
}

@keyframes typing {
  from {
    width: 0
  }
}
    
@keyframes blink {
  50% {
    border-color: transparent
  }
}

.container {
        position: relative;
        font-family: "Open Sans", sans-serif;
        text-align: center;
        positon: relative;
        margin: 0 auto;
        width: 100%;
    }
    .wrap {
        position: relative;
        display: flex;
        position: relative;
        color: white;
        font-weight: bold;
        width: 50%;
        margin: 0 auto;
    }
    #title {
        color: #fff;
        margin: 30px;
        display: block;
        font-weight: normal;
        font-size: 60px;
    }
    .number_box {
        width: 333px;
        height: 393px;
        background: #444444;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        border-radius: 3px;
        margin: 10px;
        padding: 100px 50px;
        -webkit-box-shadow: 1px 1px 4px 3px rgba(71, 244, 116, 0.4); /* Safari 3-4, iOS 4.0.2 - 4.2, Android 2.3+ */
        -moz-box-shadow: 1px 1px 4px 3px rgba(71, 244, 116, 0.4); /* Firefox 3.5 - 3.6 */
        box-shadow: 1px 1px 4px 3px rgba(71, 244, 116, 0.4); /* Opera 10.5, IE 9, Firefox 4+, Chrome 6+, iOS 5 */
    }
    .count {
        line-height: 100px;
        color: white;
        text-align: center;
        font-size: 80px;
        color: #47f474;
        font-weight: bold;
    }
    /* #talkbubble {
   width: 120px;
   height: 80px;
   background: red;
   position: relative;
   -moz-border-radius:    10px;
   -webkit-border-radius: 10px;
   border-radius:         10px;
  float:left;
  margin:20px;
}
#talkbubble:before {
   content:"";
   position: absolute;
   right: 100%;
   top: 26px;
   width: 0;
   height: 0;
   border-top: 13px solid transparent;
   border-right: 26px solid red;
   border-bottom: 13px solid transparent;
}
*/
    @media (max-width: 800px) {
        #title,
        .count {
            font-size: 32px;
        }
        h2 {
            font-size: 18px;
        }
        .wrap {
            width: 98%;
        }
        .number_box {
            width: auto;
            height: 355px;
            padding: 25px;
            margin-left: 2px;
            line-height: auto;
        }
    }

</style>

<div id="wrapper">
    <div id="page-content-wrapper">
        <div class="container-fluid xyz">
            <div class="row">
                <div class="col-lg-12">
                    <div class="wrapper-demo">
                        <div class="typing-demo">
                            Xin chào <?php echo $_SESSION['name_admin'] ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


      <h1 id="title">Our company in numbers</h1>

      <div class="wrap">
          <div class="number_box">
              <span class="count"><?php echo $total_price_month['sum_total']?></span>
              <h2>Doanh thu tháng này</h2>
          </div>

          <div class="number_box">
              <span class="count"><?php echo $count_product['so_luong'] ?></span>
              <h2>Số sản phẩm đã bán</h2>
          </div>

          <div class="number_box">
              <span class="count"><?php echo $count_bill ?></span>
              <h2>Số hóa đơn trong năm</h2>
          </div>
      </div>
      <script>
  // Reference: http://www.i-visionblog.com/2014/11/jquery-animated-number-counter-from-zero-to-value-jquery-animation.html 
$('.count').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 4000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});
</script>


