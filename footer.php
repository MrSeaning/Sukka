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

 <script crossorigin="anonymous" src="https://lib.baomitu.com/jquery/3.5.1/jquery.min.js"></script>
 <script src="<?php $this->options->themeUrl("assets/js/viewimage.min.js") ?>"></script>
 <script crossorigin="anonymous" src="https://lib.baomitu.com/jquery.lazyload/1.9.1/jquery.lazyload.min.js"></script>
 <script src="<?php $this->options->themeUrl("assets/js/main.min.js") ?>"></script>
 <?php if ($this->is('post')) : ?>
     <script>
         //文章目录功能js实现
         let hs = document.querySelectorAll("#post h2,#post h3");
         if (hs.length > 0) {
             for (let i of hs) {
                 i.id = i.innerText;
                 if (i.tagName.toLocaleLowerCase() == "h2") {
                     // 添加组装好的li标签
                     let oLi = document.createElement("li");
                     let a = document.createElement("a");
                     oLi.append(a);
                     a.href = "#" + i.innerText;
                     a.innerHTML = i.innerText;
                     a.className = "menu_a";
                     oLi.className = "toc-li";
                     document.querySelector("#catalog").append(oLi);
                 } else {
                     let li = document.querySelectorAll(".toc-li");
                     // 首先在判断最后一个标签有没有ul标签
                     let obj = li[li.length - 1].querySelectorAll("ul");
                     if (obj.length) {
                         // 就把ul标签取出来，然后把li标签放进去
                         let obj_ul = document.querySelectorAll(".toc-ul")
                         let oli = AddLi(i)
                         obj_ul[obj_ul.length - 1].append(oli);
                     } else {
                         // 没有ul标签,创建一个ul标签
                         let obj_ul = document.createElement("ul");
                         obj_ul.className = "toc-ul";
                         // 然后再ul标签中添加li标签
                         let oLi = document.createElement("li");
                         let a = document.createElement("a");
                         oLi.append(a);
                         a.href = "#" + i.innerText;
                         a.innerHTML = i.innerText;
                         a.className = "menu_a";
                         obj_ul.append(oLi);
                         // 把这个ul标签放道第一级最后一个li标签中
                         let obj_li = document.querySelectorAll(".toc-li");
                         obj_li[obj_li.length - 1].append(obj_ul);
                     }
                 }
             }
         } else {
             $("#toc").hide(); //没有目录 隐藏边栏
         }
     </script>
 <?php endif; ?>

 </body>

 </html>