<?php
/*
Plugin Name: _PluginName_
Version: 0.0.1
Plugin URL: https://www.emlog.net/plugin/detail/xx
Description: _PluginName_:一款emlog插件
Author: _YourName_
Author URL: https://www.emlog.net/author/index/xx
*/

!defined('EMLOG_ROOT') && exit('Access Denied!');


class _PluginHumpName_
{

    public static $plugin_name = '_PluginName_';

    private static $_instance;

    private $_initialized = false;

    private $db = null;

    public static function getInstance()
    {
        if (self::$_instance === null) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    private function __construct()
    {
        $this->db = Database::getInstance();
    }

    private function hookSidebar()
    {
        echo '<a class="collapse-item" id="_PluginName_" href="plugin.php?plugin=_PluginName_">_PluginName_</a>';
    }

    public function init()
    {
        if ($this->_initialized === true) {
            return;
        }
        $this->_initialized = true;

        addAction('adm_menu_ext', function () {
            $this->hookSidebar();
        });
    }

    public function success($msg, $data = '')
    {
        $result = [
            'msg' => $msg,
            'data' => $data
        ];
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit(0);
    }
    public function error($msg)
    {
        $result = [
            'msg' => $msg
        ];
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit(0);
    }

    public function saveConfig($key, $value, $type = "string")
    {
        $plugin_storage = Storage::getInstance($this->plugin_name);
        $plugin_storage->setValue(key, $value, $type);
    }

    public function getStaticMd5($file_name = 'style.css')
    {
        return md5_file(EMLOG_ROOT . '/content/plugins/_PluginName_/static/' . $file_name);
    }

    public function loadStaticPublic()
    {
        $blog_url = BLOG_URL;
        echo "<link rel='stylesheet' href='{$blog_url}content/plugins/_PluginName_/static/element-plus2.3.8.css?version={$this->getStaticMd5("element-plus2.3.8.css")}'>";
        echo "<link rel='stylesheet' href='{$blog_url}content/plugins/_PluginName_/static/style.css?version={$this->getStaticMd5()}'>";
        echo "<script src='{$blog_url}content/plugins/_PluginName_/static/vue.global.prod.js?version={$this->getStaticMd5("vue.global.prod.js")}'></script>";
        echo "<script src='{$blog_url}content/plugins/_PluginName_/static/element-plus2.3.8.min.js?version={$this->getStaticMd5("element-plus2.3.8.min.js")}'></script>";
    }

    public function test()
    {
        return "Hello Emlog Cli";
    }
}
