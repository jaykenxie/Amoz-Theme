<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

        </div><!-- end .row -->
    </div>
</div><!-- end #body -->

<footer id="footer" role="contentinfo">
    <div>Copyright &copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.</div>
    <div>
        <?php if ($this->options->beian): ?>
            <a href="beian.miit.gov.cn" target="__blank"><?php $this->options->beian(); ?></a> |
        <?php endif; ?>
         Powered by
         <a href="//www.typecho.org" target="__blank">Typecho</a> | Theme
         <a href="//jayken.cn">Amoz</a>.</div>
</footer><!-- end #footer -->

<?php $this->footer(); ?>
</body>
<script src="<?php $this->options->themeUrl('/assets/js/highlight.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('/assets/js/index.js'); ?>"></script>
</html>
