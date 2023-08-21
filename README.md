# emlog-cli

## 简介

该命令行程序是用于简化开源博客程序 emlog pro (https://emlog.net) 配套的模板或插件的开发流程，自动化创建相应的目录结构

## 功能

1. 自动创建空白插件文件结构
2. 自动创建示例模板文件结构

## 安装

```
npm install -g emlog-cli
```

## 使用

### 新建空白插件

在 emlog 的 plugin 目录运行以下命令

```
emlog plugin
```

根据提示，输入插件信息开始运行。运行完后， 会在当前目录创建该插件的文件结构

```
<plugin-name>
  |-  <plugin-name>.php
  |-  <plugin-name>_setting.php
  |-  <plugin-name>_user.php
  |-  <plugin-name>_callback.php
  |-  <plugin-name>_show.php
```

### 新建示例模板文件结构

在 emlog 的 template 目录运行以下命令

```
emlog template <template-name>（英文，如beginning）
```

运行完后， 会在当前目录创建一个名为<模板名称>的 emlog 示例模板文件结构,
该模板是可以直接用的，示例模板为我开发的 beginning v1.0.4，可以在此基础上开发自己的模板

## 其它

可通过 `emlog -h` 查看帮助信息

![](qrcode.jpg)
