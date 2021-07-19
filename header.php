<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <header class="header">
      <div class="container header__wrapper">
        <div class="header__left">
          <h1 class="header__title">
            <a class="header__link" href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a
            ><small><?php bloginfo('description'); ?></small>
          </h1>
        </div>
        <div class="header__right">
          <form method="get" action="<?php esc_url(home_url('/')); ?>">
            <input class="header__input" type="text" name="s" placeholder="検索..." />
          </form>
        </div>
      </div>
    </header>
    <nav class="nav">
      <div class="container">
        <!-- <ul class="nav__list">
          <li class="nav__item">
            <a class="nav__link" href="index.html">Home</a>
          </li>
          <li class="nav__item">
            <a class="nav__link" href="about.html">About</a>
          </li>
          <li class="nav__item"><a class="nav__link" href="#">Services</a></li>
        </ul> -->
        <?php
          $args = array(
            'theme_.location' => 'primary', //location
            'menu_class' => 'nav__list', //ulのクラス
            'container' => '', //ul
            'add_li_class' => 'nav__item', //liのクラス
            'link_class' => 'nav__link' //aのクラス
          );
        ?>
        <?php wp_nav_menu($args); ?>
      </div>
    </nav>