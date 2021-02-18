<?php
//github 图床地址：https://cdn.jsdelivr.net/gh/MrSeaning/blogImg/图片路径

//页面加载时间
function timer_start()
{
    global $timestart;
    $mtime = explode(' ', microtime());
    $timestart = $mtime[1] + $mtime[0];
    return true;
}
timer_start();
function timer_stop($display = 0, $precision = 3)
{
    global $timestart, $timeend;
    $mtime = explode(' ', microtime());
    $timeend = $mtime[1] + $mtime[0];
    $timetotal = $timeend - $timestart;
    $r = number_format($timetotal, $precision);
    if ($display)
        echo $r;
    return $r;
}

//标签云
function randTags()
{
    $fs = array("1.13rem", "1rem", "1.25rem", "1.38rem", "1.63rem", "1.88rem", "2rem"); //标签文字大小
    $color = array("#5d677d", "#6a7387", "#848c9b", "#778091"); //标签颜色

    $i = mt_rand(0, 6);
    $j = mt_rand(0, 3);

    $style = "font-size:" . $fs[$i] . ";color:" . $color[$j] . ";";
    return $style;
}

//特色图设置
if ($_SERVER['SCRIPT_NAME'] == "/admin/write-post.php") {
    function themeFields($layout)
    {
        $img = new Typecho_Widget_Helper_Form_Element_Text('img', NULL, NULL, _t('文章特色图'), _t('在这里填入一个图片URL地址'));
        $layout->addItem($img);
    }
}

/* 判断文章写完的日期超过30天给出提示 */
function timeZoneold($from)
{
    $now = new Typecho_Date(Typecho_Date::gmtTime());
    return $now->timeStamp - $from > 720 * 60 * 60 ? true : false;
}

//统计文章字数
function art_count($cid)
{
    $db = Typecho_Db::get();
    $rs = $db->fetchRow($db->select('table.contents.text')->from('table.contents')->where('table.contents.cid=?', $cid)->order('table.contents.cid', Typecho_Db::SORT_ASC)->limit(1));
    return mb_strlen($rs['text'], 'UTF-8');
}

//Typecho调用自定义字段值显示特色图，无图显示随机图
function thumbside($article)
{
    if (!isset($article->fields->img) && $article->fields->img != "") {
        return $article->fields->img;
    } else {
        $rand_num = 42;
        return 'https://cdn.jsdelivr.net/gh/MrSeaning/blogImg/randimg/' . mt_rand(1, $rand_num) . ".jpg";
    }
}

//文章阅读时间统计
function art_time($cid)
{
    $text_word = art_count($cid);
    return ceil($text_word / 400);
}

/**
 * 显示下一篇
 *
 * @access public
 * @param string $default 如果没有下一篇,显示的默认文字
 * @return void
 */
function theNext($widget, $default = NULL)
{
    $db = Typecho_Db::get();
    $sql = $db->select()->from('table.contents')
        ->where('table.contents.created > ?', $widget->created)
        ->where('table.contents.status = ?', 'publish')
        ->where('table.contents.type = ?', $widget->type)
        ->where('table.contents.password IS NULL')
        ->order('table.contents.created', Typecho_Db::SORT_ASC)
        ->limit(1);
    $content = $db->fetchRow($sql);

    if ($content) {
        $content = $widget->filter($content);
        $link = '<a class="nav-link" href="' . $content['permalink'] . '" title="' . $content['title'] . '">';
        $link .= '<div class="nav-title">' . $content['title'] . '</div><i class="i-forward"></i></a>';
        echo $link;
    } else {
        echo $default;
    }
}

/**
 * 显示上一篇
 *
 * @access public
 * @param string $default 如果没有下一篇,显示的默认文字
 * @return void
 */
function thePrev($widget, $default = NULL)
{
    $db = Typecho_Db::get();
    $sql = $db->select()->from('table.contents')
        ->where('table.contents.created < ?', $widget->created)
        ->where('table.contents.status = ?', 'publish')
        ->where('table.contents.type = ?', $widget->type)
        ->where('table.contents.password IS NULL')
        ->order('table.contents.created', Typecho_Db::SORT_DESC)
        ->limit(1);
    $content = $db->fetchRow($sql);
    if ($content) {
        $content = $widget->filter($content);
        $link = '<a class="nav-link" href="' . $content['permalink'] . '" title="' . $content['title'] . '"><i class="i-back"></i>';
        $link .= '<div class="nav-title">' . $content['title'] . '</div></a>';
        echo $link;
    } else {
        echo $default;
    }
}
