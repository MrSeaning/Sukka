<?php
//github 图床地址：https://cdn.jsdelivr.net/gh/MrSeaning/blogImg/图片路径


// 主题初始化
function themeInit($archive)
{
    // 判断是否是添加评论的操作
    // 为文章或页面、post操作，且包含参数`themeAction=comment`(自定义)
    if ($archive->is('single') && $archive->request->isPost() && $archive->request->is('themeAction=comment')) {
        // 为添加评论的操作时
        ajaxComment($archive);
    }
}


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

/**
 * ajaxComment
 * 实现Ajax评论的方法(实现feedback中的comment功能)
 * @param Widget_Archive $archive
 * @return void
 */
function ajaxComment($archive)
{
    $options = Helper::options();
    $user = Typecho_Widget::widget('Widget_User');
    $db = Typecho_Db::get();
    // Security 验证不通过时会直接跳转，所以需要自己进行判断
    // 需要开启反垃圾保护，此时将不验证来源
    if ($archive->request->get('_') != Helper::security()->getToken($archive->request->getReferer())) {
        $archive->response->throwJson(array('status' => 0, 'msg' => _t('非法请求')));
    }
    /** 评论关闭 */
    if (!$archive->allow('comment')) {
        $archive->response->throwJson(array('status' => 0, 'msg' => _t('评论已关闭')));
    }
    /** 检查ip评论间隔 */
    if (
        !$user->pass('editor', true) && $archive->authorId != $user->uid &&
        $options->commentsPostIntervalEnable
    ) {
        $latestComment = $db->fetchRow($db->select('created')->from('table.comments')
            ->where('cid = ?', $archive->cid)
            ->where('ip = ?', $archive->request->getIp())
            ->order('created', Typecho_Db::SORT_DESC)
            ->limit(1));

        if ($latestComment && ($options->gmtTime - $latestComment['created'] > 0 &&
            $options->gmtTime - $latestComment['created'] < $options->commentsPostInterval)) {
            $archive->response->throwJson(array('status' => 0, 'msg' => _t('对不起, 您的发言过于频繁, 请稍侯再次发布')));
        }
    }

    $comment = array(
        'cid'       =>  $archive->cid,
        'created'   =>  $options->gmtTime,
        'agent'     =>  $archive->request->getAgent(),
        'ip'        =>  $archive->request->getIp(),
        'ownerId'   =>  $archive->author->uid,
        'type'      =>  'comment',
        'status'    =>  !$archive->allow('edit') && $options->commentsRequireModeration ? 'waiting' : 'approved'
    );

    /** 判断父节点 */
    if ($parentId = $archive->request->filter('int')->get('parent')) {
        if ($options->commentsThreaded && ($parent = $db->fetchRow($db->select('coid', 'cid')->from('table.comments')
            ->where('coid = ?', $parentId))) && $archive->cid == $parent['cid']) {
            $comment['parent'] = $parentId;
        } else {
            $archive->response->throwJson(array('status' => 0, 'msg' => _t('父级评论不存在')));
        }
    }
    $feedback = Typecho_Widget::widget('Widget_Feedback');
    //检验格式
    $validator = new Typecho_Validate();
    $validator->addRule('author', 'required', _t('必须填写用户名'));
    $validator->addRule('author', 'xssCheck', _t('请不要在用户名中使用特殊字符'));
    $validator->addRule('author', array($feedback, 'requireUserLogin'), _t('您所使用的用户名已经被注册,请登录后再次提交'));
    $validator->addRule('author', 'maxLength', _t('用户名最多包含200个字符'), 200);

    if ($options->commentsRequireMail && !$user->hasLogin()) {
        $validator->addRule('mail', 'required', _t('必须填写电子邮箱地址'));
    }

    $validator->addRule('mail', 'email', _t('邮箱地址不合法'));
    $validator->addRule('mail', 'maxLength', _t('电子邮箱最多包含200个字符'), 200);

    if ($options->commentsRequireUrl && !$user->hasLogin()) {
        $validator->addRule('url', 'required', _t('必须填写个人主页'));
    }
    $validator->addRule('url', 'url', _t('个人主页地址格式错误'));
    $validator->addRule('url', 'maxLength', _t('个人主页地址最多包含200个字符'), 200);

    $validator->addRule('text', 'required', _t('必须填写评论内容'));

    $comment['text'] = $archive->request->text;

    /** 对一般匿名访问者,将用户数据保存一个月 */
    if (!$user->hasLogin()) {
        /** Anti-XSS */
        $comment['author'] = $archive->request->filter('trim')->author;
        $comment['mail'] = $archive->request->filter('trim')->mail;
        $comment['url'] = $archive->request->filter('trim')->url;

        /** 修正用户提交的url */
        if (!empty($comment['url'])) {
            $urlParams = parse_url($comment['url']);
            if (!isset($urlParams['scheme'])) {
                $comment['url'] = 'http://' . $comment['url'];
            }
        }

        $expire = $options->gmtTime + $options->timezone + 30 * 24 * 3600;
        Typecho_Cookie::set('__typecho_remember_author', $comment['author'], $expire);
        Typecho_Cookie::set('__typecho_remember_mail', $comment['mail'], $expire);
        Typecho_Cookie::set('__typecho_remember_url', $comment['url'], $expire);
    } else {
        $comment['author'] = $user->screenName;
        $comment['mail'] = $user->mail;
        $comment['url'] = $user->url;

        /** 记录登录用户的id */
        $comment['authorId'] = $user->uid;
    }

    /** 评论者之前须有评论通过了审核 */
    if (!$options->commentsRequireModeration && $options->commentsWhitelist) {
        if ($feedback->size($feedback->select()->where('author = ? AND mail = ? AND status = ?', $comment['author'], $comment['mail'], 'approved'))) {
            $comment['status'] = 'approved';
        } else {
            $comment['status'] = 'waiting';
        }
    }

    if ($error = $validator->run($comment)) {
        $archive->response->throwJson(array('status' => 0, 'msg' => implode(';', $error)));
    }
    //评论过程的插件接口，一般用于过滤垃圾评论的插件
    try {
        $comment = $feedback->pluginHandle()->comment($comment, $feedback->_content);
    } catch (Typecho_Exception $e) {
        Typecho_Cookie::set('__typecho_remember_text', $comment['text']);
        $archive->response->throwJson(array('status' => 0, 'msg' => _t($e->getMessage())));
        throw $e;
    }
    /** 添加评论 */
    $commentId = $feedback->insert($comment);
    if (!$commentId) {
        $archive->response->throwJson(array('status' => 0, 'msg' => _t('评论失败')));
    }
    Typecho_Cookie::delete('__typecho_remember_text');
    $db->fetchRow($feedback->select()->where('coid = ?', $commentId)
        ->limit(1), array($feedback, 'push'));
    //评论完成后的接口，一般用于评论提醒插件
    $feedback->pluginHandle()->finishComment($feedback);

    // 返回评论数据
    $data = array(
        'cid' => $feedback->cid,
        'coid' => $feedback->coid,
        'parent' => $feedback->parent,
        'mail' => $feedback->mail,
        'url' => $feedback->url,
        'ip' => $feedback->ip,
        'agent' => $feedback->agent,
        'author' => $feedback->author,
        'authorId' => $feedback->authorId,
        'permalink' => $feedback->permalink,
        'created' => $feedback->created,
        'datetime' => $feedback->date->format('Y-m-d H:i:s'),
        'status' => $feedback->status,
    );
    // 评论内容
    ob_start();
    $feedback->content();
    $data['content'] = ob_get_clean();

    $data['avatar'] = Typecho_Common::gravatarUrl($data['mail'], 48, Helper::options()->commentsAvatarRating, NULL, $archive->request->isSecure());
    $archive->response->throwJson(array('status' => 1, 'comment' => $data));
}
