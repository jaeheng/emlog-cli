# emlog-cli

## 功能
1. 自动创建空白插件文件结构

## 安装
```
npm install -g emlog-cli
```

## 使用
首先在 emlog 的plugin目录创建一个空的文件夹并用命令行进入， 然后运行
```
emlog new-plugin <plugin-name>
```
运行完后， 会在当前目录创建 `<plugin-name>.php` 及 `<plugin-name>_setting.php` 两个文件

## 其它

可通过 `emlog -h` 查看帮助信息