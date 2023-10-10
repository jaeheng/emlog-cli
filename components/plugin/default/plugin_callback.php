<?php
!defined('EMLOG_ROOT') && exit('Access Denied!');

// 插件开启时调用，可用于初始化配置
function callback_init()
{
    // Tips1: 创建表结构
    // $prefix = DB_PREFIX;
    // $db = Database::getInstance();
    // $sql = "CREATE TABLE IF NOT EXISTS `{$prefix}_PluginName_` (
    // `id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
    // `key` int NOT NULL COMMENT 'key',
    // `value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '数据值',
    // PRIMARY KEY (`id`),
    // UNIQUE KEY `gid` (`gid`) USING BTREE
    // ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";
    // $db->query($sql);

    // Tips2: 生成默认设置项(Storage)
    // $plugin_storage = Storage::getInstance(_PluginHumpName_::plugin_name);
    // $plugin_storage->setValue("key", "data", 'array');
}

// 插件删除时调用，可用于数据清理
function callback_rm()
{
    // 删除插件数据表
    // $prefix = DB_PREFIX;
    // $db = Database::getInstance();
    // $sql = "DROP TABLE IF EXISTS `{$prefix}_PluginName_`";
    // $db->query($sql);

    // 删除插件设置(Storage)
    // $plugin_storage = Storage::getInstance(_PluginHumpName_::plugin_name);
    // $plugin_storage->deleteAllName('YES');
}

// 插件更新时调用，可用于数据库变更等
function callback_up()
{
}
