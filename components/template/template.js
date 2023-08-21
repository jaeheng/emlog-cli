#!/usr/bin/env node
import util from '../../lib/util.js';
import path from 'path';

function start (name) {
  var template = path.resolve(__dirname + '/default');
  util.copy(template, './' + name);
}

export default {
  start
};