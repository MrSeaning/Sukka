 <!--底部s-->
 <footer class="footer">
     <div class="footer-container">

         <div>Copyright © 2018 - <span id="copy-year">2021</span> <a class="footer-link" href="/">Mr.Seaning</a><span class="dot"></span>
             <a class="footer-link" href="https://beian.miit.gov.cn/" rel="external nofollow noopener noopenner noreferrer" target="_blank">豫ICP备14029761号-2</a><span class="dot"></span>
             <a href="http://www.beian.gov.cn/" rel="external nofollow noopener noopenner noreferrer" target="_blank" class="footer-link">41010402000003</a>
             <span>耗时<?php timer_stop(1) ?></span>
         </div>
         <div>Powered by <a class="footer-link" href="https://www.typecho.org/" rel="external nofollow noopener noopenner noreferrer" target="_blank">Typecho</a>
             <span class="dot"></span>Designed by&nbsp;<a class="footer-link" href="https://skk.moe" rel="external nofollow noopener noopenner noreferrer" target="_blank">Sukka</a>
         </div>
     </div>
 </footer>
 <!--底部e-->
 <!--Top-->
 <div class="fab"><a aria-label="回到顶部" class="fab-btn" href="#" title="top"><i id="i-up"></i></a></div>

 <script crossorigin="anonymous" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" src="https://lib.baomitu.com/jquery/3.5.1/jquery.min.js"></script>
 <script src="<?php $this->options->themeUrl("assets/js/viewimage.min.js") ?>"></script>
 <script crossorigin="anonymous" integrity="sha384-ovn+ksX00EqrxlV2SLbvnb13K5244CZPrO3v08mAssOuQ1AgGVcEu4k44sdOJPJE" src="https://lib.baomitu.com/jquery.lazyload/1.9.1/jquery.lazyload.min.js"></script>
 <script src="<?php $this->options->themeUrl("assets/js/main.js") ?>"></script>
 <script>
     $("img.thumb-img").lazyload({

         // placeholder,值为某一图片路径.此图片用来占据将要加载的图片的位置,待图片加载时,占位图则会隐藏
         effect: "fadeIn", // 载入使用何种效果
         // effect(特效),值有show(直接显示),fadeIn(淡入),slideDown(下拉)等,常用fadeIn
         threshold: 200 // 提前开始加载

     });
 </script>
 </body>

 </html>