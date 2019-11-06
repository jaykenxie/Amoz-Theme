<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id="comments">
    <?php $this->comments()->to($comments); ?>
    
    <?php if($this->allow('comment')): ?>
    <div id="<?php $this->respondId(); ?>" class="respond">
        <div class="cancel-comment-reply">
            <?php $comments->cancelReply(); ?>
        </div>
    
    	<h3 id="response"><?php _e('评论'); ?></h3>
        <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
            <!-- 判断是否登录 -->
            <?php if($this->user->hasLogin()): ?>
            <p><?php _e('您好: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
            <!-- 文本框 -->
            <div>
                <textarea style="padding-top: 10px;" placeholder="输入评论..." rows="4" cols="50" name="text" id="textarea" class="textarea" required ><?php $this->remember('text'); ?></textarea>
            </div>
            <?php else: ?>
    		<div class="comment-form-info">
                <input placeholder="昵称" type="text" name="author" id="author" class="text" value="<?php $this->remember('author'); ?>" required />
                <input placeholder="邮箱" type="email" name="mail" id="mail" class="text" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
                <input placeholder="网址(非必须)" type="url" name="url" id="url" class="text" placeholder="<?php _e('http://'); ?>" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
            </div>
            <!-- 评论框 -->
    		<div>
                <textarea placeholder="输入评论..." rows="3" cols="50" name="text" id="textarea" class="textarea" required ><?php $this->remember('text'); ?></textarea>
            </div>
            <?php endif; ?>
            <!-- 提交按钮 -->
    		<div class="comment-form-submit">
                <button type="submit" class="submit"><?php _e('评论'); ?></button>
            </div>
    	</form>
    </div>
    <?php else: ?>
    <h3><?php _e('评论已关闭'); ?></h3>
    <?php endif; ?>

    <?php if ($comments->have()): ?>
	<!-- <h3><?php $this->commentsNum(_t('暂无评论'), _t('评论(1)'), _t('评论(%d)')); ?></h3> -->
    <?php $comments->listComments(); ?>
    <?php $comments->pageNav('上一页', '下一页'); ?>
    <?php endif; ?>
</div>
