<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点 LOGO 地址'), _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO'));
    $form->addInput($logoUrl);

    $themeColor = new Typecho_Widget_Helper_Form_Element_Text('themeColor', NULL, NULL, _t('主题颜色'), _t('调整主题色调'));
    $form->addInput($themeColor);
    
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
    array('ShowRecentPosts' => _t('显示最新文章'),
    'ShowRecentComments' => _t('显示最近回复'),
    'ShowCategory' => _t('显示分类'),
    'ShowArchive' => _t('显示归档'),
    'ShowOther' => _t('显示其它杂项')),
    array('ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther'), _t('侧边栏显示'));
    $form->addInput($sidebarBlock->multiMode());
}


/*
function themeFields($layout) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
    $layout->addItem($logoUrl);
}
*/

