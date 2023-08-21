<?php
/**
 * 页面底部信息
 */
if (!defined('EMLOG_ROOT')) {
    exit('error!');
}
?>
<?php
if (blog_tool_ishome()) {
    doAction('only_index_footer');
}
?>
<!--footer-->
<footer class="footer">
    <div class="container">
        <?php widget_hot_tag(); ?>
        <div class="widget">
            <h3>联系我们</h3>
            <div class="widget-inner">
                <p>Email: <a href="mailto:<?= _g('email'); ?>"><?= _g('email'); ?></a></p>
                <p>Weibo: <a href="<?= _g('weibo'); ?>"><?= _g('weibo'); ?></a></p>
                <p><?php if (Option::get('rss_output_num')): ?>
                        <a href="<?php echo BLOG_URL; ?>rss.php" title="RSS订阅">RSS订阅</a>
                    <?php endif; ?>
                    <?php doAction('index_footer'); ?>
                </p>
            </div>
        </div>
        <?php widget_link('合作伙伴'); ?>
    </div>
</footer>
<!--footer ／-->

<!--版权信息-->
<div class="copyright">
    Copyright &copy; <a href="<?php echo BLOG_URL; ?>"><?php echo $blogname; ?></a>
    <a href="http://zhangziheng.com" target="_blank" style="display: none;">theme by jaeheng</a> |
    <a href="http://www.miibeian.gov.cn" target="_blank"><?php echo $icp; ?></a> <?php echo $footer_info; ?> | Powered
    by <a href="http://www.emlog.net" title="采用emlog系统" target="_blank">emlog</a>
</div>
<!--版权信息 ／-->

<!--网站小工具-->
<div class="site-tools">
    <?php if (_g('reward')) : ?>
        <a href="javascript:;" class="item">
            <i class="iconfont icon-weixin"></i>
            <div class="popup">
                <img src="<?= _g('reward_weixin'); ?>" alt="微信打赏">
                <h3 class="title">微信打赏</h3>
            </div>
        </a>
        <a href="javascript:;" class="item">
            <i class="iconfont icon-alipay"></i>
            <div class="popup">
                <img src="<?= _g('reward_alipay'); ?>" alt="支付宝">
                <h3 class="title">支付宝</h3>
            </div>
        </a>
    <?php endif;?>
    <a href="http://wpa.qq.com/msgrd?v=3&uin=<?= _g('qq');?>&site=qq&menu=yes" class="item" target="_blank">
        <i class="iconfont icon-qq"></i>
    </a>
    <div class="item active gotoup" id="gotoup"><i class="iconfont icon-up"></i></div>
</div>
<!--网站小工具 ／-->
<script src="<?= load_static('js/main.min.js');?>"></script>
</body>
</html>