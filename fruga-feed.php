<?php
/**
 * Plugin Name: Import feed rss
 * Description: Custom import feed rss ( with bootstrap 4) . to use this , you can copy and paste the shortcode "import_rss_feed".
 * Version: 1.1
 * Author: Hasina RAVONIMBOLA
 * License:  GPL v2 or later
 */

/**
 * enqueue script plugin WP
 */
add_action('wp_enqueue_scripts','prefix_enqueue_bootstrap');
function prefix_enqueue_bootstrap(){
    // JS
    wp_register_script('prefix_js_bootstrap', plugins_url('/js/bootstrap.min.js',__FILE__), array(),'','true');
    wp_enqueue_script('prefix_js_bootstrap');

    // CSS
    wp_register_style('prefix_css_bootstrap', plugins_url('/css/bootstrap.min.css',__FILE__ ),array(),'','all');
    wp_enqueue_style('prefix_css_bootstrap');
    wp_register_style('prefix_css_import', plugins_url('/css/style.css',__FILE__ ),array(),'','all');
    wp_enqueue_style('prefix_css_import');
}

/**
 * display shortcode 'import_rss_feed'
 */
add_shortcode('import_rss_feed', 'prefix_render_import');
function prefix_render_import(){
    //enter feed rss , eg : $feed_url = www.exemple.com/rss
    $feed_url = '';
    $rss = simplexml_load_file($feed_url);
    ob_start();
    //display in template part (file_render.php) the content of $rss
    include 'file_render.php';
    $html = ob_get_contents();
    ob_clean();

    return $html;
}


