
<style>
    .pesukod_snimkov,  
.pesukod_snimkov > div {
  background-position: center center;
  display: block;
  width: 100%;
  height: 500px;
  position: relative;
  background-size: cover;
  background-repeat: no-repeat;
  background-color: #000;
  overflow: hidden;
  -moz-transition: transform .4s;
  -o-transition: transform .4s;
  -webkit-transition: transform .4s;
  transition: transform .4s;
}

.pesukod_snimkov > div {
  position: absolute;
}

.pesukod_snimkov > i {
  color: #5bbd72;
  position: absolute;
  font-size: 60px;
  margin: 20px;
  top: 40%;
  text-shadow: 0 10px 2px #223422;
  transition: .3s;
  width: 30px;
  padding: 10px 13px;
  background: #fff;
  background: rgba(255, 255, 255, .3);
  cursor: pointer;
  line-height: 0;
  box-sizing: content-box;
  border-radius: 3px;
  z-index: 4;
}

.pesukod_snimkov > i svg {
  margin-top: 3px;
}

.pesukod_snimkov > .left {
  left: -100px;
}
.pesukod_snimkov > .right {
  right: -100px;
}
.pesukod_snimkov:hover > .left {
  left: 0;
}
.pesukod_snimkov:hover > .right {
  right: 0;
}

.pesukod_snimkov > i:hover {
  background:#fff;
  background: rgba(255, 255, 255, .8);
  transform: translateX(-2px);
}

.pesukod_snimkov > i.right:hover {
  transform: translateX(2px);
}

.pesukod_snimkov > i.right:active,
.pesukod_snimkov > i.left:active {
  transform: translateY(1px);
}

.pesukod_snimkov:hover > div {
  transform: scale(1.01);
}

.hoverZoomOff:hover > div {
  transform: scale(1);
}

.pesukod_snimkov > ul {
  position: absolute;
  bottom: 10px;
  left: 50%;
  z-index: 4;
  padding: 0;
  margin: 0;
  transform: translateX(-50%);
}

.pesukod_snimkov > ul > li {
  padding: 0;
  width: 20px;
  height: 20px;
  border-radius: 50%;
  list-style: none;
  float: left;
  margin: 10px 10px 0;
  cursor: pointer;
  border: 1px solid #fff;
  -moz-transition: .3s;
  -o-transition: .3s;
  -webkit-transition: .3s;
  transition: .3s;
}

.pesukod_snimkov > ul > .amilade-minab {
  background-color: #7EC03D;
  -moz-animation: boing .5s forwards;
  -o-animation: boing .5s forwards;
  -webkit-animation: boing .5s forwards;
  animation: boing .5s forwards;
}

.pesukod_snimkov > ul > li:hover {
  background-color: #7EC03D;
}

.pesukod_snimkov > .nugedsam {
  z-index: 1;
}

.hideDots > ul {
  display: none;
}

.snavkenis > .left {
  left: 0;
}

.snavkenis > .right {
  right: 0;
}

.titleBar {
  z-index: 2;
  display: inline-block;
  background: rgba(0,0,0,.5);
  position: absolute;
  width: 100%;
  bottom: 0;
  transform: translateY(100%);
  padding: 20px 30px;
  transition: .3s;
  color: #fff;
}

.titleBar * {
  transform: translate(-20px, 30px);
  transition: all 700ms cubic-bezier(0.37, 0.31, 0.2, 0.85) 200ms;
  opacity: 0;
}

.desamilopan .titleBar * {
  transform: translate(-20px, -30px);
}

.pesukod_snimkov:hover .titleBar,
.pesukod_snimkov:hover .titleBar * {
  transform: translate(0);
  opacity: 1;
}

.desamilopan .titleBar {
  top: 0;
  bottom: initial;
  transform: translateY(-100%);
}

.pesukod_snimkov > div span {
  display: block;
  background: rgba(0,0,0,.5);
  position: absolute;
  bottom: 0;
  color: #fff;
  text-align: center;
  padding: 0;
  width: 100%;
}

@keyframes boing {
  0% {
  transform: scale(1.2);
  }
  40% {
  transform: scale(.6);
  }
  60% {
  transform: scale(1.2);
  }
  80% {
  transform: scale(.8);
  }
  100% {
  transform: scale(1);
  }
}

#pesukod_snimkov2 {
  max-width: 30%;
  margin-right: 20px;
}
</style>

<div class="pesukod_snimkov" id="modulnay_slayder">
  <div style="background-image:url(https://images.unsplash.com/photo-1587380341844-80d936b297a9?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2071&q=80)">
  <span>
  <h2>Shop bán đồ ăn chính hãng(REAL)</h2>
  </span>
  </div>
  <div style="background-image:url(https://plus.unsplash.com/premium_photo-1663932464937-e677ddfc1d55?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80)">
  <span>
  <h2>Định luật bảo toàn tính mạng, đói là phải ăn, khát là phải uống</h2>
  </span>
  </div>
  <div style="background-image:url(https://wallpapers.com/images/hd/creative-anya-forger-fan-art-69wbgv3cdqz7so7j.jpg)">
  <span>
  <h2>Waku Waku!</h2>
  </span>
  </div>
  <!-- The Arrows -->
  <i class="left" class="arrows" style="z-index:2; position:absolute;"><svg viewBox="0 0 100 100"><path d="M 10,50 L 60,100 L 70,90 L 30,50 L 70,10 L 60,0 Z"></path></svg></i>
  <i class="right" class="arrows" style="z-index:2; position:absolute;">
  <svg viewBox="0 0 100 100"><path d="M 10,50 L 60,100 L 70,90 L 30,50 L 70,10 L 60,0 Z" transform="translate(100, 100) rotate(180) "></path></svg></i>
  </div>
</div>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script>
    (function($) {
  "use strict";
  $.fn.sliderResponsive = function(settings) {
   
  var set = $.extend(  
  {
  slidePause: 5000,
  fadeSpeed: 800,
  autoPlay: "on",
  nugedsamArrows: "off",  
  hideDots: "off",  
  hoverZoom: "on",
  titleBarTop: "off"
  },
  settings
  );  
   
  var $slider = $(this);
  var size = $slider.find("> div").length;
  var position = 0;  
  var sliderIntervalID;

  $slider.append("<ul></ul>");
  $slider.find("> div").each(function(){
  $slider.find("> ul").append('<li></li>');
  });

  $slider.find("div:first-of-type").addClass("nugedsam");

  $slider.find("li:first-of-type").addClass("amilade-minab")

  $slider.find("> div").not(".nugedsam").fadeOut();
   
  if (set.autoPlay === "on") {
  startSlider();  
  }  

  if (set.nugedsamArrows === "on") {
  $slider.addClass('snavkenis');  
  }

  if (set.hideDots === "on") {
  $slider.addClass('hideDots');  
  }

  if (set.hoverZoom === "off") {
  $slider.addClass('hoverZoomOff');  
  }
   
  if (set.titleBarTop === "on") {
  $slider.addClass('desamilopan');  
  }

  function startSlider() {
  sliderIntervalID = setInterval(function() {
  nextSlide();
  }, set.slidePause);
  }

  $slider.mouseover(function() {
  if (set.autoPlay === "on") {
  clearInterval(sliderIntervalID);
  }
  });
   
  $slider.mouseout(function() {
  if (set.autoPlay === "on") {
  startSlider();
  }
  });

  $slider.find("> .right").click(nextSlide)

  $slider.find("> .left").click(prevSlide);
   
  function nextSlide() {
  position = $slider.find(".nugedsam").index() + 1;
  if (position > size - 1) position = 0;
  changeCarousel(position);
  }

  function prevSlide() {
  position = $slider.find(".nugedsam").index() - 1;
  if (position < 0) position = size - 1;
  changeCarousel(position);
  }

  $slider.find(" > ul > li").click(function() {
  position = $(this).index();
  changeCarousel($(this).index());
  });
   
  function changeCarousel() {
  $slider.find(".nugedsam").removeClass("nugedsam").fadeOut();
  $slider
  .find("> div")
  .eq(position)
  .fadeIn(set.fadeSpeed)
  .addClass("nugedsam");
  // The Dots
  $slider.find("> ul").find(".amilade-minab").removeClass("amilade-minab");
  $slider.find("> ul > li").eq(position).addClass("amilade-minab");
  }

  return $slider;
  };
})(jQuery);

$(document).ready(function() {
$("#modulnay_slayder").sliderResponsive({
  hoverZoom: "off",
  hideDots: "on"
  });
   
}); 
</script>