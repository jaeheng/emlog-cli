#!/usr/bin/env node
import inquirer from 'inquirer';
import util from '../../lib/util.js';
import path from 'path';
import { fileURLToPath } from 'url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);



function createPlugin (config) {
  var outputDir = './' + config.plugin_name;

  const files = [
    'plugin.php',
    'plugin_callback.php',
    'plugin_setting.php',
    'plugin_show.php',
    'plugin_user.php'
  ];

  files.map(function (plugin) {
     // 读文件
    var text = util.readFile(path.resolve(__dirname + '/default/' + plugin));
    // 处理文件
    text = util.tplHandler(text, '_PluginName_', config.plugin_name);
    text = util.tplHandler(text, '_YourName_', config.author_name + '<' + config.email + '>');

    // 写文件
    util.writeFile(text, './' + config.plugin_name + '/' + config.plugin_name + plugin.replace('plugin', ''), outputDir);
  });
}

function start (name) {

  const questions = [
    {
      type: 'input',
      name: 'plugin_name',
      message: "请输入插件名称:",
    },
    {
      type: 'input',
      name: 'author_name',
      message: "请输入作者名称:",
    },
    {
      type: 'input',
      name: 'email',
      message: "请输入作者Email:",
    }
  ];
  
  inquirer.prompt(questions).then(answers => {
    console.log(`Hi ${answers.plugin_name}!`);
    console.log(`Hi ${answers.author_name}!`);
    console.log(`Hi ${answers.email}!`);

    if (answers.plugin_name) {
      createPlugin(answers);
    } else {
      console.log('请输入插件名称');
    }
  });
}

export default {
  start
};