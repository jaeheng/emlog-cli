#!/usr/bin/env node

var version = '0.1.0';
var fs = require('fs');

// help
function showHelp () {
    console.log('\r\n');
    console.log('Usage: emlog <command> [options] \r\n');
    console.log('Options: ');
    console.log('   -v, --version   output the version number');
    console.log('   -h, --help      output usage information\r\n');
    console.log('Command: ');
    console.log('   new-plugin      generate a new emlog plugin project');
    console.log('                   emlog new-plugin <plugin-name>');
    console.log('\r\n');
}

var cmd = process.argv[2];

switch (cmd) {
    case 'new-plugin':
        var name = process.argv[3];
        if (name) {
            var plugin = '<?php\r\n'
                    + '/*\r\n'
                    + '    Plugin Name: ' + name + '\r\n'
                    + '    Version: 0.0.1' + '\r\n'
                    + '    Plugin URL: ' + '\r\n'
                    + '    Description: ' + '\r\n'
                    + '    ForEmlog: 5.3.2' + '\r\n'
                    + '    Author: ' + '\r\n'
                    + '    Author Email: ' + '\r\n'
                    + '    Author URL: ' + '\r\n'
                    + '*/' + '\r\n'
                    + '!defined(\'EMLOG_ROOT\') && exit(\'access deined!\');' + '\r\n'
                    + 'function ' + name + '() {' + '\r\n'
                    + '    echo \'<div class="sidebarsubmenu" id="' + name + '"><a href="./plugin.php?plugin=' + name + '">' + name + '</a></div>\';' + '\r\n'
                    + '}' + '\r\n'
                    + 'addAction(\'adm_sidebar_ext\', \'' + name + '\');';
            var pluginSetting = '<?php\n' +
                '/*\n' +
                '    Plugin Name: ' + name + '\n' +
                '    Version: 0.0.1\n' +
                '    Plugin URL: \n' +
                '    Description: \n' +
                '    ForEmlog: 5.3.2\n' +
                '    Author: \n' +
                '    Author URL: \n' +
                '*/\n' +
                '!defined(\'EMLOG_ROOT\') && exit(\'access deined!\');\n' +
                '\n' +
                '//插件设置页面\n' +
                'function plugin_setting_view() {\n' +
                '}\n' +
                '\n' +
                '//插件设置函数\n' +
                'function plugin_setting() {\n' +
                '}\n';

            fs.writeFile(name + '.php', plugin, function(err){
                if(err) throw err;
                console.log(name + '.php 生成成功!');
            });

            fs.writeFile(name + '_setting.php', pluginSetting, function(err){
                if(err) throw err;
                console.log(name + '_setting.php 生成成功!');
            });
        } else {
            showHelp();
        }
        break;
    case '-h':
        showHelp();
        break;
    case '-v':
        console.log('emlog-cli: v', version, '\r\n');
        break;
    default:
        showHelp()
}
