; !(function () {
    'use strict'


    var init = function () {
        //深色模式
        var use_dark_mode = window.localStorage.getItem("use-dark-mode");
        if (use_dark_mode) {
            $("html").addClass("dark");
        }

        $("#dark-mode-btn").on("click", function () {

            var use_dark_mode = window.localStorage.getItem("use-dark-mode");
            if (use_dark_mode) {
                $("html").removeClass("dark");
                window.localStorage.removeItem("use-dark-mode");
            } else {
                $("html").addClass("dark");
                window.localStorage.setItem("use-dark-mode", "true");
            }
        })
        //搜索
        $("#search-btn").on("click", function () {
            alert("功能适配中");
        })
        //打赏
        $("#donation-btn").on("click", function () {
            alert("功能适配中");
        })
        //图片灯箱
        jQuery.viewImage({
            'target': '#post img', //需要使用ViewImage的图片
            //'exclude': '.exclude img',    //要排除的图片
            'delay': 300                //延迟时间
        });
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
    };

    $(function () {
        init();
    })
})();



