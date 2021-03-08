<?php

/**
 * 标签云
 *
 * @package custom
 */
?>
<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

<style>
    .tagscloud a {
        text-decoration: none;
        padding: 1rem;
        line-height: 2;
        white-space: nowrap;
        transition: .2s;
        opacity: .8;
    }

    .tagscloud a:hover {
        transition: .5s;
        opacity: 1;
    }
</style>
<div class="container">
    <div class="cols">
        <main class="main-col">

            <div class="c-card tagscloud">

                <?php $this->widget('Widget_Metas_Tag_Cloud')->to($tags); ?>
                <?php if ($tags->have()) : ?>

                    <?php while ($tags->next()) : ?>
                        <a href="<?php $tags->permalink(); ?>" style="<?php echo randTags() ?>"><?php $tags->name(); ?></a>

                    <?php endwhile; ?>
                <?php else : ?>
                    <?php _e('没有任何标签'); ?>
                <?php endif; ?>

            </div>
        </main>
        <?php $this->need('sidebar.php'); ?>
    </div>
</div>
<!--主体e-->
<?php $this->need('footer.php'); ?>