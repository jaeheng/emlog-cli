<?php
/*
Plugin Name: _PluginName_
Version: 0.0.1
Plugin URL:https://www.emlog.net/plugin/detail/xxx
Description: 插件介绍
Author: _YourName_
Author URL: https://www.emlog.net
*/

!defined('EMLOG_ROOT') && exit('access deined!');

/**
 * 在侧边栏显示插件的设置页面入口
 */
function _PluginName__menu()
{
    echo '<div class="sidebarsubmenu" id="_PluginName_"><a href="./plugin.php?plugin=_PluginName_">_PluginName_</a></div>';
}

/*
    加入到侧边栏钩子中
*/
addAction('adm_sidebar_ext', '_PluginName__menu');
