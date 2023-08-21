<?php
/*@support tpl_options*/
global $CACHE;
!defined('EMLOG_ROOT') && exit('access deined!');

require_once __DIR__ . '/function.php';

# 获取 theme-xxx.css，供模板设置插件选择
$themes = scandir(__DIR__ . '/static/css/');
$themes = array_filter($themes, function ($value) {
    return strpos($value, 'theme-') === 0;
});
$themes_dict = [];
foreach ($themes as $k => $theme) {
    $pattern = "/theme-(\w+)\.css/";
    if (preg_match($pattern, $theme, $matches)) {
        $themes_dict[$matches[1]] = $matches[1];
    }
}
$beginning_options_cache = $CACHE->readCache('options');
$params = '&url=' . urlencode($beginning_options_cache['blogurl']) . '&blogname=' . urlencode($beginning_options_cache['blogname']);

$theme_info = get_theme_info();

$desc = '<style>.beginning-pro-options-desc{display: flex;}.beginning-pro-options-logo{width: 100px;}.beginning-pro-options-logo img{width: 64px;height: 64px;padding: 10px;border: 5px solid #4aa2cc;border-radius: 50%;}.beginning-pro-options-content{flex: 1;}</style>';
$desc .= '<div class="beginning-pro-options-desc">';
    $desc .= '<div class="beginning-pro-options-content">';
        $desc .= '<p>当前模版版本: <code>'. $theme_info['version'] .'</code></p>';
        $desc .= '<p>' . $theme_info['name'] . '模板拥有多种配置项，可充分自定义页面模块。</p>';
        $desc .= '<p>1. 模版给配置项都添加了默认值，用户可根据实际情况修改。</p>';
        $desc .= '<p>2. 如需有更多的配置需求可邮件联系作者 (注明订单号/购买QQ)</p>';
        $desc .= '<p>3. 本模版仅支持emlog pro，请尽可能升级为最新版的emlog pro (<a href="https://www.emlog.net/?ic=SX1I7B5D" target="_blank">SVIP优惠</a>)</p>';
        $desc .= '<p>4. 本模版仅在emlog官方应用商店出售,其它渠道均为盗版.</p>';
        $desc .= '<hr>';
        $desc .= '<p>🪧作者声明</p>';
        $desc .= '<p>使用本模版应遵守著作权法及其他相关法律的规定</p>';
        $desc .= '<p>禁止将本模版用于含诈骗、赌博、色情、木马、病毒等违法违规业务。</p>';
        $desc .= '<hr>';
    $desc .= '</div>';
$desc .= '</div>';
$options = array(
    'TplOptionsNavi' => [
        'description' => $desc,
        'values' => [
            'tpl-common' => '通用配置',
            'tpl-theme' => '主题配置',
            'tpl-contact' => '联系方式',
            'tpl-reward' => '收款码配置',
            'tpl-ad' => '广告配置'
        ]
    ],
    // 通用配置
    'displayLoginBtn' => array(
        'labels' => 'tpl-common',
        'type' => 'radio',
        'name' => '是否显示登录入口',
        'default' => '1',
        'values' => array(
            '1' => '显示',
            '0' => '不显示'
        ),
    ),
    'relationLogs' => array(
        'labels' => 'tpl-common',
        'type' => 'radio',
        'name' => '是否显示相关推荐',
        'default' => '1',
        'values' => array(
            '1' => '显示',
            '0' => '不显示'
        ),
    ),
    'gravatar_url' => array(
        'labels' => 'tpl-common',
        'type' => 'text',
        'name' => '头像服务CDN域名',
        'description' => '自行设置头像CDN地址，替代gravatar',
        'default' => 'dn-qiniu-avatar.qbox.me',
    ),
    'relief' => array(
        'labels' => 'tpl-common',
        'type' => 'text',
        'multi' => true,
        'name' => '免责声明',
        'description' => '',
        'default' => '免责声明：本文仅代表作者个人观点，与本网站无关。其原创性以及文中陈述文字和内容未经本站证实，对本文以及其中全部或者部分内容、文字的真实性、完整性、及时性本站不作任何保证或承诺，请读者仅作参考，并请自行核实相关内容。',
    ),
    'notice' => array(
        'labels' => 'tpl-common',
        'type' => 'text',
        'name' => '公告',
        'multi' => true,
        'description' => '一行为一个公告，可通过在行尾添加|https://xxx 来增加公告链接,且公告内容中不能有|',
        'default' => 'Welcome to my blog, thank you|' . BLOG_URL . "\n" .'欢迎来到我们的博客|' . BLOG_URL,
    ),

    // 主题配置
    'theme' => [
        'labels' => 'tpl-theme',
        'depend' => 'theme',
        'type' => 'radio',
        'name' => '主题',
        'default' => 'primary',
        'values' => $themes_dict
    ],
    'greyMode' => array(
        'labels' => 'tpl-theme',
        'type' => 'radio',
        'name' => '网站置灰',
        'default' => '0',
        'description' => '特殊时期可以将网站置灰',
        'values' => array(
            '1' => '是',
            '0' => '否'
        ),
    ),
    'author_banner' => array(
        'labels' => 'tpl-theme',
        'type' => 'image',
        'name' => '侧边作者banner',
        'description' => '侧边栏作者简介的背景图片, 360*130',
        'default' => TEMPLATE_URL . '/static/images/shan.png',
    ),

    // 联系方式
    'weibo' => array(
        'labels' => 'tpl-contact',
        'type' => 'text',
        'name' => '微博链接',
        'default' => '',
    ),
    'email' => array(
        'labels' => 'tpl-contact',
        'type' => 'text',
        'name' => 'email',
        'default' => '',
    ),
    'qq' => array(
        'labels' => 'tpl-contact',
        'type' => 'text',
        'name' => 'QQ',
        'default' => '',
    ),

    // 收款码设置
    'reward' => array(
        'labels' => 'tpl-reward',
        'type' => 'radio',
        'name' => '开启打赏',
        'values' => array(
            '1' => '开启',
            '0' => '不开启'
        ),
        'default' => '1',
    ),
    'reward_weixin' => array(
        'labels' => 'tpl-reward',
        'type' => 'image',
        'name' => '微信打赏码',
        'description' => '',
        'default' => TEMPLATE_URL . '/static/images/qrcode.jpg',
    ),
    'reward_alipay' => array(
        'labels' => 'tpl-reward',
        'type' => 'image',
        'name' => '支付宝打赏码',
        'description' => '',
        'default' => TEMPLATE_URL . '/static/images/qrcode.jpg',
    ),

    // 广告配置
    'ad_001' => array(
        'labels' => 'tpl-ad',
        'type' => 'text',
        'multi' => true,
        'name' => '广告位1',
        'description' => '支持html代码, 调用方式 _g("ad_001") ',
        'default' => '',
    ),

    'ad_002' => array(
        'labels' => 'tpl-ad',
        'type' => 'text',
        'multi' => true,
        'name' => '广告位2',
        'description' => '支持html代码, 调用方式 _g("ad_002") ',
        'default' => '',
    ),

    'ad_003' => array(
        'labels' => 'tpl-ad',
        'type' => 'text',
        'multi' => true,
        'name' => '广告位3',
        'description' => '支持html代码, 调用方式 _g("ad_003") ',
        'default' => '',
    ),

    'ad_004' => array(
        'labels' => 'tpl-ad',
        'type' => 'text',
        'multi' => true,
        'name' => '广告位4',
        'description' => '支持html代码, 调用方式 _g("ad_004") ',
        'default' => '',
    ),

    'ad_005' => array(
        'labels' => 'tpl-ad',
        'type' => 'text',
        'multi' => true,
        'name' => '广告位5',
        'description' => '支持html代码, 调用方式 _g("ad_005") ',
        'default' => '',
    ),
);
