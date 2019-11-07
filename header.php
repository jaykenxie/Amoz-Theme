<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html class="no-js">
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>

    <!-- 使用url函数转换相关路径 -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('/assets/css/normalize.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('/assets/css/grid.css'); ?>">
    <link rel="stylesheet" href="//at.alicdn.com/t/font_1492748_1pvaf42ibmn.css">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('/assets/css/common.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('/assets/code-style/'); ?><?php $this->options->codeStyle(); ?>.css">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('/assets/css/style.css'); ?>">
    <?php if($this->options->themeColor): ?>
    <style>
        a:hover,a:active {color: <?php $this->options->themeColor() ?>;}
        input:focus,textarea:focus {border: 1px solid <?php $this->options->themeColor() ?>;}
        #nav-menu a:hover,#nav-menu .current {color: <?php $this->options->themeColor() ?>;}
        .page-navigator .current a {background: <?php $this->options->themeColor() ?>;}
        .comment-form-submit button {background-color: <?php $this->options->themeColor() ?>;border: 1px solid <?php $this->options->themeColor() ?>;}
        #nav-menu a:hover,#nav-menu .current {color: <?php $this->options->themeColor() ?>;}
        .page-navigator .current a {background: <?php $this->options->themeColor() ?>;}
        .comment-form-submit button {background-color: <?php $this->options->themeColor() ?>;border: 1px solid <?php $this->options->themeColor() ?>;}
    </style>
    <?php endif ?>
    <!--[if lt IE 9]>
    <script src="//cdnjscn.b0.upaiyun.com/libs/html5shiv/r29/html5.min.js"></script>
    <script src="//cdnjscn.b0.upaiyun.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
</head>
<body>
<!--[if lt IE 8]>
    <div class="browsehappy" role="dialog"><?php _e('当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="http://browsehappy.com/">升级你的浏览器</a>'); ?>.</div>
<![endif]-->

<header id="header" class="clearfix">
    <div class="container head-box">
        <div class="row container-wrap">
            <div class="site-name">
            <?php if ($this->options->logoUrl): ?>
                <a id="logo" href="<?php $this->options->siteUrl(); ?>">
                    <img src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>" />
                </a>
            <?php else: ?>
                <a id="logo" href="<?php $this->options->siteUrl(); ?>">
                    <h1 class="default-logo"><?php $this->options->title() ?>-<?php $this->options->description() ?></h1>
                </a>
            <?php endif; ?>
            </div>
            <div class="site-nav">
                <nav id="nav-menu" class="clearfix" role="navigation">
                    <a<?php if($this->is('index')): ?> class="current"<?php endif; ?> href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a>
                    <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                    <?php while($pages->next()): ?>
                    <a<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
                    <?php endwhile; ?>
                </nav>
            </div>
        </div>
        <div class="site-search container-wrap">
            <form id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
                <label for="s" class="sr-only"><?php _e('搜索关键字'); ?></label>
                <input type="text" id="s" name="s" class="text" placeholder="<?php _e('输入关键字搜索'); ?>" />
                <button type="submit" class="submit"><?php _e('搜索'); ?>
            </button>
            </form>
        </div>
    </div>
    <!-- <i class="iconfont icon-github"></i> -->
</header><!-- end #header -->
<div id="body">
    <div class="container">
        <div class="row">

    
    
