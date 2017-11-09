#!/usr/bin/env node
var fs = require('fs');

/**
 * 读文件
 * @param filePath
 * @returns text
 */
function readFile (filePath) {
  return fs.readFileSync(filePath, 'utf-8');
}

/**
 * 处理模板文件
 * @param text 模板文件文本
 * @param tag 标记
 * @param replacement 替换为此
 * @returns {*} 替换之后的文本
 */
function tplHandler (text, tag, replacement) {
  tag = tag || '{{ Plugin Name }}';
  // 匹配text将 tag 替换为 replacement, 并返回处理过后的文本
  return text.replace(new RegExp(tag, "gm"), replacement)
}

/**
 * 写文件
 * @param text
 * @param filePath
 * @param dirPath
 */
function writeFile (text, filePath, dirPath) {
  if (!fs.existsSync(dirPath)) {
    fs.mkdirSync(dirPath);
  }
  fs.writeFile(filePath, text, function (err) {
    if (err) throw err;
    console.log(filePath + '生成成功!');
  })
}

/**
 * 复制目录、子目录，及其中的文件
 * @param src {String} 要复制的目录
 * @param dist {String} 复制到目标目录
 * @param callback function
 */
function copyDir (src, dist, callback) {
  fs.access(dist, function (err) {
    if (err) {
      // 目录不存在时创建目录
      fs.mkdirSync(dist);
    }
    _copy(null, src, dist);
  });

  function _copy (err, src, dist) {
    if (err) {
      callback(err);
    } else {
      fs.readdir(src, function (err, paths) {
        if (err) {
          callback(err)
        } else {
          paths.forEach(function (path) {
            var _src = src + '/' + path;
            var _dist = dist + '/' + path;
            fs.stat(_src, function (err, stat) {
              if (err) {
                callback(err);
              } else {
                // 判断是文件还是目录
                if (stat.isFile()) {
                  fs.writeFileSync(_dist, fs.readFileSync(_src));
                } else if (stat.isDirectory()) {
                  // 当是目录是，递归复制
                  copyDir(_src, _dist, callback)
                }
              }
            })
          })
        }
      })
    }
  }
}

exports.readFile = readFile
exports.writeFile = writeFile
exports.tplHandler = tplHandler
exports.copy = copyDir
