; !(function () {
    'use strict'

    var init = function () {
        //深色模式
        var use_dark_mode = window.localStorage.getItem("use-dark-mode");
        if (use_dark_mode) {
            document.querySelector("html").setAttribute("class", "dark");
        }
        document.querySelector("#dark-mode-btn").addEventListener("click", function () {
            var use_dark_mode = window.localStorage.getItem("use-dark-mode");
            if (use_dark_mode) {
                document.querySelector("html").className = "";
                window.localStorage.removeItem("use-dark-mode");
            } else {
                document.querySelector("html").className = "dark";
                window.localStorage.setItem("use-dark-mode", "true");
            }
        }) //搜索
        document.querySelector("#search-btn").addEventListener("click", function () {
            alert("功能适配中")
        })
        //打赏
        let donationBtn = document.querySelector("#donation-btn");
        if (donationBtn) {
            donationBtn.addEventListener("click", function () {
                alert("功能适配中")
            })
        }
        //图片灯箱
        jQuery.viewImage({
            'target': '#post img', //需要使用ViewImage的图片
            //'exclude': '.exclude img',    //要排除的图片
            'delay': 300                //延迟时间
        });


        window.onscroll = function () {
            if (document.documentElement.scrollTop >= 100) {
                document.querySelector(".fab").style.cssText = "display:block";
            } else
                document.querySelector(".fab").style.cssText = "display:none";
        }
        //返回顶部
        $(".fab").on("click", function (event) {
            event.preventDefault();
            $("html, body").animate(
                {
                    scrollTop: $("html").offset().top,
                },
                500
            );
            return false;
        });
        //目录平滑滚动
        $("a.menu_a").click(function () {
            $("html, body").animate({
                scrollTop: $($(this).attr("href")).offset().top
            }, {
                duration: 500,
                easing: "swing"
            });
            return false;
        });
        //图片懒加载
        $("img.thumb-img").lazyload({
            // placeholder,值为某一图片路径.此图片用来占据将要加载的图片的位置,待图片加载时,占位图则会隐藏
            effect: "fadeIn", // 载入使用何种效果
            // effect(特效),值有show(直接显示),fadeIn(淡入),slideDown(下拉)等,常用fadeIn
            threshold: 200 // 提前开始加载
        });
    };
    $(function () {
        init();
    })
})();



