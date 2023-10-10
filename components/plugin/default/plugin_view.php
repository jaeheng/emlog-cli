<?php
!defined('EMLOG_ROOT') && exit('access deined!');

if (!class_exists('_PluginHumpName_', false)) {
    include __DIR__ . '/_PluginName__class.php';
}
$msg = _PluginHumpName_::getInstance()->test();

// 加载静态资源
_PluginHumpName_::getInstance()->loadStaticPublic();
?>
<div id="app" class="rss-tracker">
    <el-card>
        {{ msg }}
    </el-card>
</div>

<script>
    const {
        createApp,
        ref
    } = Vue

    const app = createApp({
        data() {
            return {
                msg: "<?= $msg; ?>",
            }
        },
        computed: {},
        methods: {},
        mounted() {}
    })
    app.use(ElementPlus);
    app.mount('#app');

    // emlog相关
    setTimeout(hideActived, 3600);
    $("#menu_category_ext").addClass('active');
    $("#menu_ext").addClass('show');
    $("#_PluginName_").addClass('active');
</script>