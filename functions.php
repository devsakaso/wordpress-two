<?php

function scripts() {
  // 第3引数から、dependencies, version, media query
  wp_register_style('style', get_template_directory_uri(). '/dist/css/main.min.css', [], 1, 'all');
  wp_enqueue_style('style');

  wp_enqueue_script('jquery');

  wp_register_script('app', get_template_directory_uri() . '/dist/js/project.min.js', [], 1, true);
  wp_enqueue_script('app');
}
add_action('wp_enqueue_scripts', 'scripts');


// Theme Support
function theme_support() {

  // アイキャッチ画像
  add_theme_support( 'post-thumbnails' ); 

  // Nav Menus
  register_nav_menus(array(
    'primary' => __('Primary Menu'),
    'footer' => __('Footer Menu')
  ));

  // Post Format Support 投稿ページにフォーマットを作成できる
  // https://developer.wordpress.org/themes/functionality/post-formats/
  add_theme_support('post-formats', array('aside', 'gallery', 'link'));
}
add_action('after_setup_theme', 'theme_support');

// メニューのliにクラスを加える
function add_additional_class_on_li($classes, $item, $args) {
  if(isset($args->add_li_class)) {
      $classes[] = $args->add_li_class;
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

// メニューのaタグにクラスを加える
function add_menu_link_class( $atts, $item, $args ) {
  if (property_exists($args, 'link_class')) {
    $atts['class'] = $args->link_class;
  }
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );

// Excerpt length
function set_excerpt_length() {
  return 128;
}
add_filter('excerpt_length', 'set_excerpt_length');

// get_top_parent()関数を自作してaboutページの子ページを取得する
// get_post_ancestors()で親ページのIDを取得する
// 投稿のグローバル変数$postからpost_parentでIDを取得する
function get_top_parent() {
  global $post;
  if($post->post_parent) {
    $ancestors = get_post_ancestors($post->ID);
    return $ancestors[0];
  }
  return $post->ID;
}

// 子ページのない親ページではリンク非表示にする
// $pagesが0より上なら子ページあり
function page_is_parent() {
  global $post;

  $pages = get_pages('child_of=' . $post->ID);
  return count($pages);
}