<?php
/*
    Plugin Name: {{ Plugin Name }}
    Version: 0.0.1
    Plugin URL: < The page address of your plugin >
    Description: 插件的主函数
    ForEmlog: 5.3.2
    Author: < Your Name >
    Author Email: < Your Email >
    Author URL: < Your Author >
*/

!defined('EMLOG_ROOT') && exit('access deined!');

/*
    在侧边栏显示插件的设置页面入口
*/
function {{ Plugin Name }}_menu () {
    echo '<div class="sidebarsubmenu" id="{{ Plugin Name }}"><a href="./plugin.php?plugin={{ Plugin Name }}">{{ Plugin Name }}</a></div>';
}

/*
    加入到侧边栏钩子中
*/
addAction('adm_sidebar_ext', '{{ Plugin Name }}_menu');