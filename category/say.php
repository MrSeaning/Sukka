<?php

/**
 * 归档
 *
 * @package custom
 */
?>
<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

<style>
    .thumb {
        object-fit: cover;
        width: 100%;
        height: 100%;
    }

    .timeline {
        display: flex;
        flex-direction: column;
        margin-top: 1.5rem;
    }

    .timeline .tag {
        align-items: center;
        background-color: var(--tag);
        border-radius: 4px;
        color: var(--t);
        display: inline-flex;
        font-size: 0.75rem;
        height: 2em;
        justify-content: center;
        padding: 0 0.75em;
        white-space: nowrap;
    }

    .timeline .timeline-header {
        width: 4em;
        min-width: 4em;
        max-width: 8em;
        word-wrap: normal;
        text-align: center;
        background-color: #3273dc;
        color: #fff;
        font-size: 0.9em;
        box-sizing: border-box;
    }

    .timeline .timeline-item {
        display: flex;
        display: -webkit-flex;
        position: relative;
        margin-left: 2em;
        padding-bottom: 1em;
    }

    .timeline .timeline-item::before {
        content: "";
        background-color: #dbdbdb;
        display: block;
        width: 1px;
        height: 100%;
        position: absolute;
        top: 0;
    }

    .timeline .timeline-item:last-child::before {
        height: 1.5rem;
    }

    .timeline .timeline-item .timeline-marker {
        position: absolute;
        background: #dbdbdb;
        border: 1px solid #dbdbdb;
        border-radius: 100%;
        content: "";
        display: block;
        height: 12px;
        -webkit-transform: translateX(-50%);
        transform: translateX(-50%);
        top: 1.2rem;
        width: 12px;
    }

    .timeline-content {
        margin-top: 1em;
        padding-left: 1em;
        width: 100%
    }

    .timeline-content .c-card {
        margin-top: 0;
    }

    .timeline .widget-title {
        font-size: 1rem;
        line-height: 1.5;
    }

    .timeline .image {
        height: 3.5rem;
        width: 5.83rem;
    }

    .timeline .media-right {
        flex-basis: auto;
        flex-grow: 0;
        flex-shrink: 0;
        margin-left: 1rem;
    }

    .media {
        align-items: flex-start;
        display: flex;
        text-align: left;
    }

    .media-content {
        -ms-flex-preferred-size: auto;
        flex-basis: auto;
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
        -ms-flex-negative: 1;
        flex-shrink: 1;
        text-align: left
    }

    .image {
        display: block;
        position: relative;
    }

    @media screen and (max-width:767px) {
        .media-content {
            overflow-x: auto
        }
    }
</style>



<div class="container">
    <div class="cols">
        <main class="main-col">
            <?php if ($this->have()) : ?>
                <?php while ($this->next()) : ?>
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-marker"></div>
                            <div class="timeline-content">
                                <div class="c-card">
                                    <article class="media">
                                        <div class="media-content small"><time>2020-12-25</time>
                                            <p class="widget-title"><?php $this->content(); ?></p>
                                        </div>

                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <div class="card">
                    <article class="card-content">
                        别看啦，这里啥都没有，换个试试！！！！
                    </article>
                </div>
            <?php endif ?>
        </main>
        <?php $this->need('sidebar.php'); ?>
    </div>
</div>
<!--主体e-->
<?php $this->need('footer.php'); ?>