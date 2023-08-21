<?php
/**
 * 首页轮播消息
 */
if(!defined('EMLOG_ROOT')) {exit('error!');}

$notice = _g('notice');
$notice = explode("\n", $notice);
foreach ($notice as $key => $item) {
    $split = explode("|", $item);
    $notice[$key] = [
        'title' => $split[0],
        'url' => isset($split[1]) ? $split[1] : ''
    ];
}
?>
<!--动态轮播提醒-->
<div class="container">
    <div class="site-notice" id="site-notice">
        <ul>
            <?php foreach ($notice as $value) : ?>
            <li><a href="<?php echo $value['url'];?>"><i class="iconfont icon-notice"></i> <?php echo $value['title'];?></a></li>
            <?php endforeach;?>
        </ul>
    </div>
</div>
<!--动态轮播提醒-->