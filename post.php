<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div id="body">
  <div class="container">
    <div class="row">
      <div class="col-mb-12 col-8" id="main" role="main">
        <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
          <h1 class="post-title" itemprop="name headline"><a itemprop="url"
              href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
          <ul class="post-meta post-content-meta">
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
          </ul>
          <div class="post-content markdown-body" itemprop="articleBody">
            <?php $this->content(); ?>
          </div>
          <p itemprop="keywords" class="tags"><?php _e('标签: '); ?><?php $this->tags(', ', true, 'none'); ?></p>
        </article>

        <ul class="post-near">
          <li class="wrap-hide"><?php $this->thePrev('%s','没有了'); ?></li>
          <li style="text-align:right" class="wrap-hide"><?php $this->theNext('%s','没有了'); ?>️️</li>
        </ul>

        <!-- 评论 -->
        <?php $this->need('comments.php'); ?>

        <!-- 相关文章推荐 -->
        <?php $this->related(10)->to($relatedPosts); ?>
        <div class="post-vant">
          <?php while($relatedPosts->next()): ?>
          <article class="post" itemscope>
            <h2 class="post-title" itemprop="name headline"><a itemprop="url"
                href="<?php $relatedPosts->permalink() ?>"><?php $relatedPosts->title() ?></a></h2>
            <ul class="post-meta">
              <li itemprop="author" itemscope><?php _e('作者: '); ?><a itemprop="name"
                  href="<?php $relatedPosts->author->permalink(); ?>" rel="author"><?php $relatedPosts->author(); ?></a>
              </li>
              <li><?php _e('时间: '); ?><time datetime="<?php $relatedPosts->date('c'); ?>"
                  itemprop="datePublished"><?php $relatedPosts->date(); ?></time></li>
              <li><?php _e('分类: '); ?><?php $relatedPosts->category(','); ?></li>
              <li itemprop="interactionCount"><a itemprop="discussionUrl"
                  href="<?php $relatedPosts->permalink() ?>#comments"><?php $relatedPosts->commentsNum('评论', '1 条评论', '%d 条评论'); ?></a>
              </li>
            </ul>
            <div class="post-content content-list-box" itemprop="articleBody">
              <?php $relatedPosts->excerpt(98, '...') ?>
            </div>
          </article>
          <?php endwhile; ?>
        </div>
      </div><!-- end #main-->

      <?php $this->need('sidebar.php'); ?>
    </div><!-- end .row -->
  </div>
</div><!-- end #body -->
<?php $this->need('footer.php'); ?>