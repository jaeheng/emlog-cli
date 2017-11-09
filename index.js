#!/usr/bin/env node
var util = require('./lib/util');
var path = require('path');
var packageJSON = JSON.parse(util.readFile(path.resolve(__dirname + '/package.json')));
var version = packageJSON.version;

// components
var plugin = require('./components/plugin/plugin.js');
var template = require('./components/template/template.js');

// help
function showHelp () {
  console.log('\r\n');
  console.log('Usage: emlog <command> / [options] \r\n');
  console.log('Options: ');
  console.log('   -v          output the version number');
  console.log('   -h          output usage information\r\n');
  console.log('Command: ');
  console.log('   plugin      generate a new emlog plugin project');
  console.log('   template    generate a new emlog template project\r\n');
  console.log('example:');
  console.log('   emlog -v');
  console.log('   emlog -h');
  console.log('   emlog plugin name');
  console.log('   emlog template name\r\n');
  console.log('contact: ');
  console.log('   jaeheng@126.com\r\n');
}

var cmd = process.argv[2];
var name = process.argv[3];

switch (cmd) {
  case 'plugin':
    if (name) {
      plugin.create(name);
    } else {
      showHelp();
    }
    break;
  case 'template':
    if (name) {
      template.create(name);
    } else {
      showHelp()
    }
    break;
  case '-h':
    showHelp();
    break;
  case '-v':
    console.log('emlog-cli:  ', 'v' + version);
    console.log('   author:  ', packageJSON.author.name);
    console.log(packageJSON.description);
    break;
  default:
    showHelp()
}
