<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width,initial-scale=1,viewport-fit=cover" name="viewport">
    <meta content="on" http-equiv="x-dns-prefetch-control">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="windows-Target" contect="_top">
    <meta name="robots" content="all">
    <meta name="format-detection" content="telephone=no">
    <link crossorigin="" href="https://cdn.jsdelivr.net" rel="preconnect">
    <link rel="icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <title>
        <?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?>
    </title>

    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/main.css'); ?>">
    <!--[if lt IE 9]>
    <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->
    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header('rss1=&rss2=&atom=&generator=&template=&pingback=&xmlrpc=&wlw=&commentReply='); ?>

    <?php if (!$this->is('post') && !$this->is("page", "about")) : ?>
        <style>
            @media screen and (min-width:768px) {
                .main-col {
                    width: 66.666666%;
                }
            }

            @media screen and (min-width:1280px) {
                .main-col {
                    width: 50%;
                }
            }
        </style>
    <?php endif; ?>

</head>

<body>
    <!--[if lt IE 8]>
    <div class="browsehappy" role="dialog"><?php _e('当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="http://browsehappy.com/">升级你的浏览器</a>'); ?>.</div>
    <![endif]-->
    <!--导航s-->
    <nav class="navbar" role="navigation">
        <div class="navbar-container">
            <div class="navbar-brand"><a class="navbar-item" href="/">
                    <img src="<?php $this->options->themeUrl('assets/img/tx.jpg'); ?>" class="navbar-logo" />
                    <span>Mr.Seaning</span> </a></div>
            <div class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item" href="/">首页</a>
                    <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                    <?php while ($pages->next()) : ?>
                        <a class="navbar-item" href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a>

                    <?php endwhile; ?>
                </div>
                <div class="navbar-end">
                    <!-- <a aria-label="订阅 Atom RSS" class="navbar-item" href="/atom.xml"><i id="i-rss"></i></a> -->
                    <a aria-label="搜索" class="navbar-item" id="search-btn"><i id="i-search"></i></a>
                    <a aria-label="切换暗色模式" class="navbar-item" id="dark-mode-btn"><i id="i-dark"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <!--导航e-->