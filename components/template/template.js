#!/usr/bin/env node
import util from '../../lib/util.js';
import path from 'path';
import { fileURLToPath } from 'url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

function start (name) {
  if (!util.checkStringFormat(name)) {
    console.log('模版名称规则不正确')
    return false;
  }
  var template = path.resolve(__dirname + '/default');
  util.copyDir(template, './' + name);
}

export default {
  start
};