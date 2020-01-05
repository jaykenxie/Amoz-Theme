<?php
/**
 * 开源免费的响应式、两列布局、简约型博客主题；
 * 
 * @package Amoz Theme
 * @author Jayken Xie
 * @version 1.0.1
 * @link http://www.jayken.cn
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>
<div id="body">
  <div class="container">
    <div class="row">
      <div class="col-mb-12 col-8 post-list" id="main" role="main">
        <div class="cate-box">
          <a href="javascript:void(0)" class="cate-box-all">全部</a>
          <?php $this->widget('Widget_Metas_Category_List')->listCategories('wrapClass=widget-list'); ?>
        </div>
        <?php while($this->next()): ?>
        <article class="post" itemscope>
          <div>
            <h2 class="post-title lh0" itemprop="name headline"><a itemprop="url"
                href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
            <div class="post-content content-list-box" itemprop="articleBody">
              <?php $this->excerpt(130, '...') ?>
            </div>
            <ul class="post-meta mb0">
              <li itemprop="author" itemscope>
                <img class="post-meta_myavatar" src="<?php $this->options->myavatar(); ?>" alt="author">
                <a itemprop="name"
                    href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a>
              </li>
              <span class="dot">·</span>
              <li>
                <time datetime="<?php $this->date('c'); ?>"
                  itemprop="datePublished"><?php $this->date(); ?></time></li>
                  <span class="dot">·</span>
              <li><?php $this->category(','); ?></li>
              <span class="dot">·</span>
              <li itemprop="interactionCount" class="post-meta_comment">
                <i class="iconfont icon-pinglun"></i>
                <a itemprop="discussionUrl" class="theme-color"
                    href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('×0', '×1', '×%d 条评论'); ?></a>
              </li>
            </ul>
          </div>
          <!-- 缩略图 -->
          <img class="post-list-img" src="<?php if (array_key_exists('img',unserialize($this->___fields()))): ?><?php $this->fields->img(); ?><?php else: ?><?php
preg_match_all("/\<img.*?src\=(\'|\")(.*?)(\'|\")[^>]*>/i", $this->content, $matches);
$imgCount = count($matches[0]);
if($imgCount >= 1){
$img = $matches[2][0];
echo <<<Html
{$img}
Html;
}
?><?php endif; ?>" alt="">
        </article>
        <?php endwhile; ?>

        <?php $this->pageNav('上一页', '下一页'); ?>
      </div><!-- end #main-->

      <?php $this->need('sidebar.php'); ?>
    </div><!-- end .row -->
  </div>
</div><!-- end #body -->
<?php $this->need('footer.php'); ?>