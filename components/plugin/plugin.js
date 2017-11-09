#!/usr/bin/env node
var util = require('../../lib/util.js');
var path = require('path');

function createPlugin (config) {
  // 读文件
  var text = util.readFile(config.readFilePath);
  // 处理文件
  var handledText = util.tplHandler(text, undefined, config.name);
  // 写文件
  util.writeFile(handledText, config.outputPath, config.outputDir);
}

function create (name) {
  var outputDir = './' + name;

  var fileConfig = [
    {
      name: name,
      readFilePath: path.resolve(__dirname + '/plugin.php'),
      outputPath: './' + name + '/' + name + '.php'
    },
    {
      name: name,
      readFilePath: path.resolve(__dirname + '/plugin-callback.php'),
      outputPath: './' + name + '/' + name + '_callback.php'
    },
    {
      name: name,
      readFilePath: path.resolve(__dirname + '/plugin-setting.php'),
      outputPath: './' + name + '/' + name + '_setting.php'
    },
    {
      name: name,
      readFilePath: path.resolve(__dirname + '/plugin-show.php'),
      outputPath: './' + name + '/' + name + '_show.php'
    }
  ];

  fileConfig.map(function (plugin) {
    plugin.outputDir = outputDir;
    createPlugin(plugin);
  });
}

exports.create = create;