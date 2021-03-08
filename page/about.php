<?php

/**
 * 关于
 *
 * @package custom
 */
?>
<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>


<div class="container">
    <div class="cols">
        <main class="main-col">
            <article class="card">
                <div class="card-image thumb-post">

                    <img alt="<?php $this->title() ?>>" class="thumb-img" crossorigin="" src="https://cdn.jsdelivr.net/gh/MrSeaning/blogImg/blog/about.jpeg">

                </div>
                <header class="post-header">
                    <h2 class="post-title"><?php $this->title() ?></h2>

                </header>

                <section id="post">
                    <?php $this->content(); ?>
                </section>
                <footer class="article-footer"></footer>
            </article>

            <div class="c-card" id="comment">
                <?php //$this->need('comments.php'); 
                ?>
                <div class="comment-loading">评论正在适配中，有事请联系作者邮箱 seaning at seaning dot com</div>
            </div>
        </main>
        <?php $this->need('sidebar.php'); ?>
    </div>
</div>
<!--主体e-->
<?php $this->need('footer.php'); ?>