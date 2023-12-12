<?php
/*
Plugin Name: 弹窗公告
Plugin URI: https://www.tsxxc.com/wordpress/plugins/1478.html
Description: 一款弹窗公告插件
Version: 3.0
Author: ts小陈
Author URI: https://www.tsxxc.com
License: GPL v3
WordPress requires at least: 5.0
*/
require 'plugin-updates/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
     'https://t.uip.top/plugins/homepage-popup-notice/info.json',
     __FILE__,
     'homepage-popup-notice'
);
$plugin_dir_path = dirname(__FILE__);
/* 注册激活插件时要调用的函数 */ 
register_activation_hook( __FILE__, 'display_popup_notice_install');
/* 注册停用插件时要调用的函数 */ 
register_deactivation_hook( __FILE__, 'display_popup_notice_remove' );
// 激活插件时设置默认启用jq
function my_plugin_default_values() {
    if (!get_option('popup_notice_pc_jquery')) {
        update_option('popup_notice_pc_jquery', 'laia'); // 设置默认值为'laia'
    }
}
register_activation_hook(__FILE__, 'my_plugin_default_values');
 //20231211优化
function display_popup_notice_install() {
    $optionsToAdd = array(
        "popup_notice_pc_content" => "<p style='color:red'>欢迎访问！</p>",
        "popup_notice_pc_logo" => "https://t.uip.top/plugins/homepage-popup-notice/logo.jpg",
        "popup_notice_pc_logo_width" => "400px",
        "popup_noticet_pc_anz" => "网站通知",
        "popup_noticet_pc_an" => "朕已阅",
        "popup_noticet_pc_ans" => "#98a3ff",
        "popup_noticet_pc_ansz" => "#fff",
        "popup_noticet_pc_ansy" => "text-align:center;font-weight:bold;font-size:19px;line-height:60px;margin: 0 auto;margin-top:25px;border-radius:32px;width:80%;text-decoration:none;",
        "popup_notice_pc_anz" => "朕已阅",
        "popup_notice_pc_any" => "点击访问",
        "popup_notice_pc_anylk" => "/"
    );

    foreach ($optionsToAdd as $name => $value) {
        add_option($name, $value, '', 'yes');
    }
}
 //20231211优化
function display_popup_notice_remove() {
    $optionsToDelete = [
        'popup_notice_pc_content',
        'popup_notice_pc_logo',
        'popup_notice_pc_logo_width',
        'popup_notice_pc_anz',
        'popup_notice_pc_any',
        'popup_notice_pc_anylk',
        'popup_noticet_pc_anz',
        'popup_noticet_pc_an',
        'popup_noticet_pc_ans',
	    'popup_noticet_pc_ansz',
	    'popup_noticet_pc_ansy',
	    'popup_notice_pc_zdy',
	    'popup_notice_pc_jquery'
    ];

    foreach ($optionsToDelete as $option) {
        delete_option($option);
    }
}

if( is_admin() ) {
    /*  利用 admin_menu 钩子，添加菜单 */
    add_action('admin_menu', 'popup_notice_menu');
}
function popup_notice_menu() {
    if(function_exists('add_menu_page')) {
        add_menu_page('弹窗公告设置', '弹窗公告设置', 'administrator', plugin_dir_path(__FILE__).'/popup_notice_menu_settings.php', '', plugins_url('popup_notice_menu.png', __FILE__ ));
    }
}
// 颜色选择器
add_action( 'admin_enqueue_scripts', 'wpjam_add_color_picker' );
function wpjam_add_color_picker( $hook ) {
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'wp-color-picker');
}
function my_enqueue_scripts() {
if( !is_admin() ) { // 前台加载的脚本与样式表
// 去除已注册的 jquery 脚本
wp_deregister_script( 'jquery' );
 } 
} 
// 添加回调函数到 init 动作上
add_action( 'init', 'my_enqueue_scripts' );

// 检查WordPress是否已加载jQuery，如果未加载，则根据插件中的设置引用jQuery
function check_and_enqueue_custom_jquery() {
    $popup_notice_pc_jquery = get_option('popup_notice_pc_jquery');
    if ($popup_notice_pc_jquery && !wp_script_is('jquery', 'enqueued')) {
        wp_enqueue_script('custom-jquery', 'https://libs.baidu.com/jquery/2.1.4/jquery.min.js', array(), '1.0', false);
    }
}
// 将函数挂钩到WordPress的特定动作上（这里使用了wp_enqueue_scripts动作）
add_action('wp_enqueue_scripts', 'check_and_enqueue_custom_jquery');

function my_bodyone() {
    $popup_notice_pc_logo = get_option('popup_notice_pc_logo');
    $popup_notice_pc_logo_width = get_option('popup_notice_pc_logo_width');
    $popup_notice_pc_anz = get_option('popup_notice_pc_anz');
    $popup_notice_pc_any = get_option('popup_notice_pc_any');
    $popup_notice_pc_anylk = get_option('popup_notice_pc_anylk');
    $popup_notice_pc_zdy = get_option('popup_notice_pc_zdy');//202365
    $popup_notice_pc_content = wpautop(stripslashes(get_option('popup_notice_pc_content')));
    if (!$themepark_advertisement_mo_content) {
        $themepark_advertisement_mo_content = wpautop(stripslashes(get_option('popup_notice_pc_content')));
    }
    $tcJs = "https://t.uip.top/plugins/homepage-popup-notice/tc.js";
    $tcCss = "https://t.uip.top/plugins/homepage-popup-notice/tc.css";
    $contentStyle = "#globalAd{ max-width:" . $popup_notice_pc_logo_width . ";} #globalAd #content{ width:" . $popup_notice_pc_logo_width . "; }" . $popup_notice_pc_zdy;
    $my_body = "
    <script type=\"text/javascript\" src=\"$tcJs\"></script>
    <link rel=\"stylesheet\" href=\"$tcCss\" type=\"text/css\" />
    <style>
    $contentStyle
    </style>
    <div class=\"layer\"></div>
    <div id=\"globalAd\">
        <div id=\"hero-img\">
        </div>
        <div id=\"profile-img\">
            <img style=\"height: 68px;\" src=\"$popup_notice_pc_logo\" />
        </div>
        <div id=\"content\">
           $popup_notice_pc_content
           <div style=\"padding: 10px 0 0 0;\">
               <a onclick=\"closeGlobalAd();\" class=\"btn btn-default\" rel=\"nofollow\">$popup_notice_pc_anz" . esc_html(get_option('popup_notice_background_color')) . "</a>
               <a href=\"$popup_notice_pc_anylk\" onclick=\"redirectUrlToActive();\" class=\"btn btn-default\" rel=\"nofollow\">$popup_notice_pc_any</a>
           </div>
        </div>
    </div>";
    if (!is_admin()) {
        echo $my_body;
    }
}

function my_bodytwo() {
    $popup_noticet_pc_anz = get_option('popup_noticet_pc_anz');
    $popup_notice_pc_logo_width = get_option('popup_notice_pc_logo_width');
    $popup_noticet_pc_an = get_option('popup_noticet_pc_an');
    $popup_noticet_pc_ans = get_option('popup_noticet_pc_ans');
    $popup_noticet_pc_ansz = get_option('popup_noticet_pc_ansz');
    $popup_noticet_pc_ansy = get_option('popup_noticet_pc_ansy');
    $popup_notice_pc_content = wpautop(stripslashes(get_option('popup_notice_pc_content')));
    if (!$themepark_advertisement_mo_content) {
        $themepark_advertisement_mo_content = wpautop(stripslashes(get_option('popup_notice_pc_content')));
    }
    $tcJs = "https://t.uip.top/plugins/homepage-popup-notice/tc.js";
    $my_bodytwo = "
    <script type=\"text/javascript\" src=\"$tcJs\"></script>
    <div class=\"layer\" hidden></div>
    <div id=\"globalAd\" hidden>
        <div class=\"web_notice\" style=\"position: fixed;top: 0;left: 0;width: 100%;height: 100%;background: rgba(0,0,0,0.3);z-index: 99999;\">
            <div style=\"position: fixed;top: 50%;left: 50%;width: $popup_notice_pc_logo_width;background: #FFF;transform: translate(-50%, -50%);border-radius: 40px;padding: 20px 40px;\">
                <h3 style=\"font-weight: bold;text-align: center;font-size: 30px;\">$popup_noticet_pc_anz</h3>
                <div style=\"font-size: 16px;margin-top: 26px;line-height: 30px;color: #999;\">$popup_notice_pc_content</div>
                <a style=\"display: block;background:$popup_noticet_pc_ans;color:$popup_noticet_pc_ansz;$popup_noticet_pc_ansy;cursor:pointer;\"  onclick=\"closeGlobalAd();\" class=\"btn btn-default\" rel=\"nofollow\">$popup_noticet_pc_an</a>
            </div>
        </div>
    </div>";

    if (!is_admin()) {
        echo $my_bodytwo;
    }
}

	
$option_yso = get_option('jinzhi_yt_yso');
$option_yst = get_option('jinzhi_yt_yst');

if ($option_yso === 'laia') {
    add_action('wp_footer', 'my_bodyone');
} elseif ($option_yst === 'laia') {
    add_action('wp_footer', 'my_bodytwo');
} else {
    add_action('wp_footer', 'my_bodyone');
}

?>