<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="col-mb-12 col-offset-1 col-3 kit-hidden-tb" id="secondary" role="complementary">

    <!-- 个人信息 -->
    <?php if($this->options->myavatar): ?>
    <section class="widget">
        <div class="user-card">
            <img src="<?php $this->options->myavatar(); ?>" alt="user">
            <h4><?php $this->options->myname(); ?></h4>
            <div>
                <?php if($this->options->github): ?>
                <a href="<?php $this->options->github(); ?>" target="__blank" title="GitHub">
                    <i class="iconfont icon-github"></i>
                </a>
                <?php endif ?>
                <?php if($this->options->gitee): ?>
                <a href="<?php $this->options->gitee(); ?>" target="__blank" title="码云Gitee">
                    <i class="iconfont icon-gitee"></i>
                </a>
                <?php endif ?>
                <?php if($this->options->weibo): ?>
                <a href="<?php $this->options->weibo(); ?>" target="__blank" title="微博">
                    <i class="iconfont icon-weibo"></i>
                </a>
                <?php endif ?>
                <?php if($this->options->zhihu): ?>
                <a href="<?php $this->options->zhihu(); ?>" target="__blank" title="知乎">
                    <i class="iconfont icon-zhihu"></i>
                </a>
                <?php endif ?>
            </div>
        </div>
    </section>
    <?php endif ?>
    <!-- 分类 -->
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
    <section class="widget">
		<h3 class="widget-title"><?php _e('分类'); ?></h3>
        <?php $this->widget('Widget_Metas_Category_List')->listCategories('wrapClass=widget-list'); ?>
	</section>
    <?php endif; ?>

    <!-- 标签云 -->
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentTag', $this->options->sidebarBlock)): ?>
    <section class="widget">
		<h3 class="widget-title"><?php _e('标签云'); ?></h3>
        <!-- tag -->
        <?php $this->widget('Widget_Metas_Tag_Cloud', 'ignoreZeroCount=1&limit=30')->to($tags); ?>
        <ul class="tags-list">
        <?php $i = 0; while($tags->next()): ?>
            <li style="background-color: <?php $cars=array("#A7535A","#1561AB","#46484C","#CF4813","#428675"); echo($cars[rand(0, 4)]); ?>">
                <!-- title='<?php $tags->name(); ?>' -->
                <a href="<?php $tags->permalink(); ?>"><?php $tags->name(); ?></a>
            </li>
        <?php endwhile; ?>
        </ul>
	</section>
    <?php endif; ?>
    <!-- 最新回复 -->

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
    <section class="widget">
		<h3 class="widget-title"><?php _e('最近回复'); ?></h3>
        <ul class="widget-list">
        <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
        <?php while($comments->next()): ?>
            <li><a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(35, '...'); ?></li>
        <?php endwhile; ?>
        </ul>
    </section>
    <?php endif; ?>

    <!-- 归档 -->
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)): ?>
    <section class="widget">
		<h3 class="widget-title"><?php _e('归档'); ?></h3>
        <ul class="widget-list">
            <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')
            ->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
        </ul>
	</section>
    <?php endif; ?>

    <!-- 热门文章 -->
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
    <section>
		<h4 class="hot-post-title"><?php _e('热门推荐'); ?></h4>
        <ul class="hot-post">
            <?php getHotComments('8');?>

            <!-- <?php $this->widget('Widget_Contents_Post_Recent')
            ->parse('<li><a class="wrap-hide" href="{permalink}">{title}</a></li>'); ?> -->

        </ul>
    </section>
    <?php endif; ?>

</div><!-- end #sidebar -->
