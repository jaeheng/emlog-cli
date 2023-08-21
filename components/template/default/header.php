<?php
/*
Template Name:beginning
Description:简洁，多种布局，个人介绍，金v闪亮你的自媒体之路 <br /> 提交bug: https://blog.phpat.com/play/451.html
Version:1.0.4
Author:jaeheng
Author Url:https://blog.phpat.com
Sidebar Amount:1
*/
if (!defined('EMLOG_ROOT')) exit('error!');
require_once View::getView('function');
require_once View::getView('module');
$systemInfo = getSystemInfo();
?>
<!doctype html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="<?php echo $site_key; ?>" />
    <meta name="description" content="<?php echo $site_description; ?>" />
    <meta name="generator" content="emlog" />
    <title><?php echo $site_title; ?></title>
    <link rel="alternate" type="application/rss+xml" title="RSS" href="<?php echo BLOG_URL; ?>rss.php" />
    <link rel="stylesheet" href="//at.alicdn.com/t/c/font_228781_32yhvrej10w.css">
    <link rel="stylesheet" href="<?= load_static('css/style.css'); ?>">
    <script src="<?= load_static('js/jquery-3.2.1.min.js'); ?>" type="text/javascript"></script>
    <script src="<?= load_static('js/common-tpl.js'); ?>" type="text/javascript"></script>
</head>

<body>
    <!--[if lte IE 8]>
<div id="browsehappy">
    您正在使用的浏览器版本过低，请<a href="https://browsehappy.com/" target="_blank">
    <strong>升级您的浏览器</strong></a>，获得最佳的浏览体验！
</div>
<![endif]-->

    <?php doAction('index_head'); ?>

    <!--头部区域-->
    <header id="header" class="header">
        <div class="container">
            <a href="<?php echo BLOG_URL; ?>" class="avatar">
                <div class="img"><img src="<?php echo getAuthorAvatar(); ?>" alt="<?php echo $blogname; ?>"></div>
                <i class="gold-v"></i>
            </a>
            <h1 class="username">
                <?php echo $blogname; ?>
                <a href="<?= _g('weibo'); ?>" target="_blank">
                    <img src="<?php echo TEMPLATE_URL; ?>/static/images/weibo_48_48.png" alt="weibo">
                </a>
            </h1>
            <div class="userdesc"><?php echo $bloginfo; ?></div>
            <ul class="count">
                <li class="item">
                    <span class="tit">文章</span>
                    <span class="num"><?php echo $systemInfo['articelNum']; ?></span>
                </li>
                <li class="item">
                    <span class="tit">留言</span>
                    <span class="num"><?php echo $systemInfo['commentsNum']; ?></span>
                </li>
                <li class="item">
                    <span class="tit">阅读</span>
                    <span class="num"><?php echo $systemInfo['viewNum']; ?></span>
                </li>
            </ul>
        </div>
    </header>
    <!--头部区域 ／-->

    <!--导航-->
    <div class="nav">
        <div class="container">
            <a href="javascript:;" class="icon-menu" id="open-menu">
                <i class="icon-menu-item"></i>
                <i class="icon-menu-item"></i>
                <i class="icon-menu-item"></i>
            </a>
            <?php blog_navi(); ?>
            <form action="<?php echo BLOG_URL; ?>index.php" method="get" class="pull-right search" id="search-form">
                <input type="search" name="keyword" class="input" value="<?php echo $keyword; ?>" placeholder="search..." />
            </form>
        </div>
    </div>
    <!--导航 ／-->