<link
            rel="stylesheet"
            href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css"
        />
<style type="text/css">
        
        #tren{
            position: -webkit-sticky;
            position: fixed;
            top: 0;
            display: flex;
            justify-content: space-around;
            width: 100%;
            height: 8%;
            background: #eaf6f6;
            z-index: 1;
        }
        ul{
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        li a, .read-detail {
            font-size: 22px;
            background: 
                linear-gradient(to right, rgba(100, 200, 200, 1), rgba(100, 200, 200, 1)),
                linear-gradient(to right, rgba(255, 0, 0, 1), rgba(255, 0, 180, 1), rgba(0, 100, 200, 1));
            background-size: 100% 0.1em, 0 0.1em;
            background-position: 100% 100%, 0 100%;
            background-repeat: no-repeat;
            transition: background-size 400ms;
            color: #007bff;
        }

        li a:hover,
        li a:focus,
        .read-detail:hover,
        .read-detail:focus {
            background-size: 0 0.1em, 100% 0.1em;
        }
</style>
<ul id="tren"> 
    <li>
        <a href="index.php">
            Trang chủ
        </a>
    </li>
    <li>
        <?php require 'search_form.php' ?>
    </li>
    <?php if(empty($_SESSION['id'])){ ?>
        <li>
            <a href="sign_in.php">
                Đăng nhập
            </a>
        </li>
        <li>
           <a href="sign_up.php">
                Đăng ký
           </a>
        </li>
    <?php }  else {?>
    Chào <?php echo $_SESSION['name'] ?>
     <li>
        <a href="sign_out.php">
            Đăng xuất
        </a>
     </li>
     <li>
        <a href="view_cart.php">
            Xem giỏ hàng
        </a>
     </li>
     <?php } ?>          
</ul>
