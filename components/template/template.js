#!/usr/bin/env node
var util = require('../../lib/util.js');
var path = require('path');

function create (name) {
  var template = path.resolve(__dirname + '/beginning');
  util.copy(template, './' + name);
}

exports.create = create;