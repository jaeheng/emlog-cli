<?php
/**
 * Emlog函数集合
 */
if (!defined('EMLOG_ROOT')) exit('error!');


if (!function_exists('get_theme_info')) {
    /**
     * 获取主题信息
     * 如版本号、主题名称
     * @return array|string[]
     */
    function get_theme_info()
    {
        if (!file_exists(__DIR__ . '/header.php')) {
            return [
                'version' => 'unknown version',
                'name' => 'unknown theme'
            ];
        }
        $tplData = implode('', @file(__DIR__ . '/header.php'));
        preg_match("/Version:(.*)/i", $tplData, $tplVersion);
        preg_match("/Template Name:(.*)/i", $tplData, $tplName);
        return [
            'version' => $tplVersion[1],
            'name' => $tplName[1]
        ];
    }
}

if (!function_exists('load_static')) {
    /**
     * 加载静态资源
     * 给静态资源添加上md5，可以解决浏览器缓存问题
     * @param $path
     * @return string
     */
    function load_static ($path)
    {
        return TEMPLATE_URL . 'static/' . $path . '?v=' . md5_file(TEMPLATE_PATH . 'static/' . $path);
    }
}