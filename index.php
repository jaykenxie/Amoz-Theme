<?php
/**
 * 开源免费的响应式、两列布局、简约型博客主题；
 * 
 * @package Amoz Theme
 * @author Jayken Xie
 * @version 1.0.0
 * @link http://jayken.cn
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
				<h2 class="post-title" itemprop="name headline"><a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
				<ul class="post-meta">
					<li itemprop="author" itemscope><?php _e('作者: '); ?><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></li>
					<li><?php _e('时间: '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></li>
					<li><?php _e('分类: '); ?><?php $this->category(','); ?></li>
					<li itemprop="interactionCount"><a itemprop="discussionUrl" href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?></a></li>
				</ul>
				<div class="post-content content-list-box" itemprop="articleBody">
					<?php $this->excerpt(48, '...') ?>
				</div>
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