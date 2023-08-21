#!/usr/bin/env node
import util from './lib/util.js';
import path from 'path';
import { fileURLToPath } from 'url';
import { dirname } from 'path';

const __filename = fileURLToPath(import.meta.url);
const __dirname = dirname(__filename);

var packageJSON = JSON.parse(util.readFile(path.resolve(__dirname + '/package.json')));
var version = packageJSON.version;

// components
import plugin from './components/plugin/plugin.js';
import template from './components/template/template.js';

// help
function showHelp () {
  console.log('\r\n');
  console.log('Version: v' + version)
  console.log('\r\nUsage: emlog [command] [options] <dir_name>');
  console.log('\r\nOptions: ');
  console.log('   -v          output the version number');
  console.log('\r\nCommand: ');
  console.log('   plugin      generate a new emlog plugin project');
  console.log('   template    generate a new emlog template project\r\n');
  console.log('example:');
  console.log('   emlog -v');
  console.log('   emlog plugin');
  console.log('   emlog template name\r\n');
  console.log('author: ');
  console.log('   ' + packageJSON.author + '\r\n');
}

var cmd = process.argv[2];
var name = process.argv[3];

switch (cmd) {
  case 'plugin':
    plugin.start();
    break;
  case 'template':
    if (name) {
      console.log('emlog template <template_name>')
      template.start(name);
    } else {
      showHelp()
    }
    break;
  case '-v':
    console.log(packageJSON.description, "\n");
    console.log('version:  ', 'v' + version);
    console.log('author:  ', packageJSON.author, "\n");
    break;
  default:
    showHelp()
}
