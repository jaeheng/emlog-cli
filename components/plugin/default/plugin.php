<?php
/*
Plugin Name: _PluginName_
Version: 0.0.1
Plugin URL:https://www.emlog.net/plugin/detail/xxx
Description: 插件介绍
Author: _YourName_
Author URL: https://www.emlog.net
*/

!defined('EMLOG_ROOT') && exit('Access Denied!');



if (!class_exists('_PluginHumpName_', false)) {
    include __DIR__ . '/_PluginName__class.php';
}

_PluginHumpName_::getInstance()->init();
