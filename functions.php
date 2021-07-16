<?php

function scripts() {
  // 第3引数から、dependencies, version, media query
  wp_register_style('style', get_template_directory_uri(). '/dist/css/app.css', [], 1, 'all');
  wp_enqueue_style('style');

  wp_enqueue_script('jquery');

  wp_register_script('app', get_template_directory_uri() . '/dist/js/app.js', ['jquery'], 1, true);
  wp_enqueue_script('app');
}
add_action('wp_enqueue_scripts', 'scripts');

function theme_setup() {
  // サムネイル
  add_theme_support('post-thumbnails');

  // メニュー
  register_nav_menus(array(
    'primary' => __('Primary Menu')
  ));
}
add_action('after_setup_theme', 'theme_setup');

// excerpt length
function set_excerpt_length() {
  return 25;
}
// add_actionは追加、add_filterは変更
add_filter('excerpt_length', 'set_excerpt_length');


// Widget Locations
function init_widgets($id) {
  // Sidebar
  register_sidebar(array(
    'name' => 'サイドバー',
    'id' => 'sidebar',
    'before-widget' => '<div class="sidebar__widget>',
    'after-widget' => '</div>',
    'before-title' => '<h3 class="sidebar__title>',
    'after-title' => '</h3>'
  ));
}
add_action('widgets_init', 'init_widgets');