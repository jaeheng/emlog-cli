#!/usr/bin/env node
import inquirer from "inquirer";
import util from "../../lib/util.js";
import path from "path";
import { fileURLToPath } from "url";

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

function toHump(name) {
  var str = name.replace(/\_(\w)/g, function (all, letter) {
    return letter.toUpperCase();
  });

  return str.slice(0, 1).toUpperCase() + str.slice(1);
}

function createPlugin(config) {
  var outputDir = "./" + config.plugin_name;

  const files = [
    "plugin.php",
    "plugin_callback.php",
    "plugin_setting.php",
    "plugin_show.php",
    "plugin_user.php",
    "plugin_view.php",
    "plugin_class.php",
  ];

  files.map(function (plugin) {
    // 读文件
    var text = util.readFile(path.resolve(__dirname + "/default/" + plugin));
    // 处理文件
    text = util.tplHandler(text, "_PluginName_", config.plugin_name);
    text = util.tplHandler(
      text,
      "_YourName_",
      config.author_name + "<" + config.email + ">"
    );
    text = util.tplHandler(
      text,
      "_PluginHumpName_",
      toHump(config.plugin_name)
    );

    // 写文件
    util.writeFile(
      text,
      "./" +
        config.plugin_name +
        "/" +
        config.plugin_name +
        plugin.replace("plugin", ""),
      outputDir
    );
  });

  // 移动static目录
  var static_path = path.resolve(__dirname + "/default/static");
  util.copyDir(static_path, "./" + config.plugin_name + "/static");
}

function start(name) {
  const questions = [
    {
      type: "input",
      name: "plugin_name",
      message: "请输入插件名称:",
    },
    {
      type: "input",
      name: "author_name",
      message: "请输入作者名称:",
    },
    {
      type: "input",
      name: "email",
      message: "请输入作者Email:",
    },
  ];

  inquirer.prompt(questions).then((answers) => {
    if (util.checkStringFormat(answers.plugin_name)) {
      console.log(
        `Hi ${answers.author_name} <${answers.email}>! 您要创建的插件是 ${answers.plugin_name}`
      );
      createPlugin(answers);
    } else {
      console.log(
        "请以小写的英文字母、数字、下划线(_)、横杠(-) 组合而成，且只能以字母作为开头"
      );
      console.log(
        "doc: https://www.emlog.net/docs/#/plugin?id=%e5%91%bd%e5%90%8d%e8%a7%84%e5%88%99"
      );
    }
  });
}

export default {
  start,
};
