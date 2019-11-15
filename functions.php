<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
    // logo地址
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点 LOGO 地址'), _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO'));
    $form->addInput($logoUrl);
    // 备案
    $beian = new Typecho_Widget_Helper_Form_Element_Text('beian', NULL, NULL, _t('备案号'), NULL);
    $form->addInput($beian);
    // 版权信息
    $copyright = new Typecho_Widget_Helper_Form_Element_Text('copyright', NULL, NULL, _t('版权信息'), NULL);
    $form->addInput($copyright);
    // 主题色
    $themeColor = new Typecho_Widget_Helper_Form_Element_Text('themeColor', NULL, NULL, _t('主题颜色'), _t('格式：red, #fff, rgb(0, 0, 0)'));
    $form->addInput($themeColor);
    // 个人头像
    $myavatar = new Typecho_Widget_Helper_Form_Element_Text('myavatar', NULL, NULL, _t('个人头像'), Null);
    $form->addInput($myavatar);
    //名称
    $myname = new Typecho_Widget_Helper_Form_Element_Text('myname', NULL, NULL, _t('头像下的名称'), Null);
    $form->addInput($myname);
    // GitHub
    $github = new Typecho_Widget_Helper_Form_Element_Text('github', NULL, NULL, _t('GitHub'), Null);
    $form->addInput($github);
    // Gitee
    $gitee = new Typecho_Widget_Helper_Form_Element_Text('gitee', NULL, NULL, _t('Gitee'), Null);
    $form->addInput($gitee);
    // weibo
    $weibo = new Typecho_Widget_Helper_Form_Element_Text('weibo', NULL, NULL, _t('Weibo'), Null);
    $form->addInput($weibo);
    // zhihu
    $zhihu = new Typecho_Widget_Helper_Form_Element_Text('zhihu', NULL, NULL, _t('Zhihu'), Null);
    $form->addInput($zhihu);

    $codeStyle = new Typecho_Widget_Helper_Form_Element_Radio('codeStyle',
    array(
    'dracula' => _t('Dracula'),
    'github' => _t('Github'),
    'monokai' => _t('Monokai'),
    'one-dark' => _t('OneDark'),
    'vscode' => _t('VS Code'),
    'xcode' => _t('XCode'),
    ),
    'dracula',
    _t('代码样式'), _t('在这里调整代码的样式风格')); 
    $form->addInput($codeStyle->multiMode());

    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array('ShowRecentPosts' => _t('显示热门文章'),
    'ShowRecentComments' => _t('显示最近回复'),
    'ShowRecentTag' => _t('显示标签云'),
    'ShowCategory' => _t('显示分类'),
    'ShowArchive' => _t('显示归档')),
    array('ShowRecentPosts', 'ShowRecentComments', 'ShowRecentTag', 'ShowCategory', 'ShowArchive'), _t('侧边栏显示'));
    $form->addInput($sidebarBlock->multiMode());
}

// 热门文章
function getHotComments($limit = 10){
    $db = Typecho_Db::get();
    $result = $db->fetchAll($db->select()->from('table.contents')
        ->where('status = ?','publish')
        ->where('type = ?', 'post')
        ->where('created <= unix_timestamp(now())', 'post') //添加这一句避免未达到时间的文章提前曝光
        ->limit($limit)
        ->order('commentsNum', Typecho_Db::SORT_DESC)
    );
    if($result){
        foreach($result as $val){            
            $val = Typecho_Widget::widget('Widget_Abstract_Contents')->push($val);
            $post_title = htmlspecialchars($val['title']);
            $permalink = $val['permalink'];
            echo '<li><a class="wrap-hide" href="'.$permalink.'" title="'.$post_title.'" target="_blank">'.$post_title.'</a></li>';        
        }
    }
}

/*
function themeFields($layout) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
    $layout->addItem($logoUrl);
}
*/
?>
