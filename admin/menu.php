<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <style>
         

.nav-pills > li > a {
   border-radius: 0;
}

#wrapper {
   padding-left: 0;
   -webkit-transition: all 0.5s ease;
   -moz-transition: all 0.5s ease;
   -o-transition: all 0.5s ease;
   transition: all 0.5s ease;
   overflow: hidden;
}

#wrapper.toggled {
   padding-left: 250px;
   overflow: hidden;
}

#sidebar-wrapper {
   
   z-index: 1000;
   position: absolute;
   left: 250px;
   width: 0;
   height: 100%;
   margin-left: -250px;
   overflow-y: auto;
   background: #000;
   -webkit-transition: all 0.5s ease;
   -moz-transition: all 0.5s ease;
   -o-transition: all 0.5s ease;
   transition: all 0.5s ease;
}

#wrapper.toggled #sidebar-wrapper {
   width: 250px;
   
}

#page-content-wrapper {
   position: absolute;
   padding: 15px;
   width: 100%;
   overflow-x: hidden;
}

.xyz {
   min-width: 360px;
}

#wrapper.toggled #page-content-wrapper {
   position: relative;
   margin-right: 0px;
}

.fixed-brand {
   width: auto;
}
/* Sidebar Styles */

.sidebar-nav {
   position: absolute;
   top: 0;
   width: 250px;
   margin: 0;
   padding: 0;
   list-style: none;
   margin-top: 2px;
}

.sidebar-nav li {
   text-indent: 15px;
   line-height: 40px;
}

.sidebar-nav li a {
   display: block;
   text-decoration: none;
   color: #999999;
}

.sidebar-nav li a:hover {
   text-decoration: none;
   color: #fff;
   background: rgba(255, 255, 255, 0.2);
   border-left: red 2px solid;
}

.sidebar-nav li a:active,
.sidebar-nav li a:focus {
   text-decoration: none;
}

.sidebar-nav > .sidebar-brand {
   height: 65px;
   font-size: 18px;
   line-height: 60px;
}

.sidebar-nav > .sidebar-brand a {
   color: #999999;
}

.sidebar-nav > .sidebar-brand a:hover {
   color: #fff;
   background: none;
}

.no-margin {
   margin: 0;
}

@media (min-width: 768px) {
   #wrapper {
      padding-left: 250px;
   }
   .fixed-brand {
      width: 250px;
   }
   #wrapper.toggled {
      padding-left: 0;
   }
   #sidebar-wrapper {
      width: 250px;
      height: 723px;
   }
   #wrapper.toggled #sidebar-wrapper {
      width: 250px;
   }
   #wrapper.toggled-2 #sidebar-wrapper {
      width: 50px;
   }
   #wrapper.toggled-2 #sidebar-wrapper:hover {
      width: 250px;
   }
   #page-content-wrapper {
      padding: 20px;
      position: relative;
      -webkit-transition: all 0.5s ease;
      -moz-transition: all 0.5s ease;
      -o-transition: all 0.5s ease;
      transition: all 0.5s ease;
   }
   #wrapper.toggled #page-content-wrapper {
      position: relative;
      margin-right: 0;
      padding-left: 250px;
   }
   #wrapper.toggled-2 #page-content-wrapper {
      position: relative;
      margin-right: 0;
      margin-left: -200px;
      -webkit-transition: all 0.5s ease;
      -moz-transition: all 0.5s ease;
      -o-transition: all 0.5s ease;
      transition: all 0.5s ease;
      width: auto;
   }
}

    </style>
    <meta charset="UTF-8">
 </head>
 
 <body>
  
    <div id="wrapper">
       <!-- Sidebar -->
       <div id="sidebar-wrapper">
          <ul class="sidebar-nav nav-pills nav-stacked" id="menu">
             <li>
                <a href="../root"><span class="fa-stack fa-lg pull-left"><i class="fa fa-cloud-download fa-stack-1x "></i></span>Trang chủ</a>
             </li>
             <li>
                <a href="../products"> <span class="fa-stack fa-lg pull-left"><i class="fa fa-cart-plus fa-stack-1x "></i></span>Sản phẩm</a>
             </li>
             <li>
                <a href="../manufacturers"><span class="fa-stack fa-lg pull-left"><i class="fa fa-youtube-play fa-stack-1x "></i></span>Nhà sản xuất</a>
             </li>
             <li>
                <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>Thống kê</a>
                <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                   <li><a href="../thong_ke/thong_ke_khach_hang_tiem_nang_theo_thang.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>khách hàng tiềm năng theo tháng</a></li>
                   <li><a href="../thong_ke/thong_ke_doanh_thu.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>doanh thu</a></li>
                   <li><a href="../thong_ke/thong_ke_san_pham.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>sản phẩm đã bán</a></li>
                   <li><a href="../thong_ke/thong_ke_san_pham_ban_chay_va_khong_chay.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>sản phẩm bán chạy và không bán chạy</a></li>
                </ul>
             </li>
             <li>
                <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-wrench fa-stack-1x "></i></span>Đơn hàng</a>
                <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                   <li><a href="../orders"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>Duyệt đơn</a></li>
                   <li><a href="../thong_ke/xem_don_theo_ngay.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>Xem đơn theo ngày</a></li>
                   <li><a href="../thong_ke/xem_don_theo_thang.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>Xem đơn theo tháng</a></li>
                </ul>
             </li>
          </ul>
       </div>
       <!-- /#sidebar-wrapper -->
       <!-- Page Content -->
       
       <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script>
        $("#menu-toggle").click(function(e) {
   e.preventDefault();
   $("#wrapper").toggleClass("toggled");
});
$("#menu-toggle-2").click(function(e) {
   e.preventDefault();
   $("#wrapper").toggleClass("toggled-2");
   $('#menu ul').hide();
});

function initMenu() {
   $('#menu ul').hide();
   $('#menu ul').children('.current').parent().show();
   //$('#menu ul:first').show();
   $('#menu li a').click(
      function() {
         var checkElement = $(this).next();
         if ((checkElement.is('ul')) && (checkElement.is(':visible'))) {
            return false;
         }
         if ((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
            $('#menu ul:visible').slideUp('normal');
            checkElement.slideDown('normal');
            return false;
         }
      }
   );
}
$(document).ready(function() {
   initMenu();
});
    </script>
 </body>
 
 </html>