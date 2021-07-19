<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>

    <?php wp_head(); ?>

  </head>
<body>

<header class="header">
  <div class="container">
      <h1><?php bloginfo('name'); ?></h1>
      <small><?php bloginfo('description'); ?></small>
  </div>
</header>
<nav class="nav">
  <div class="container">
    <!-- menu -->
    <?php
      $args = array(
        'theme_location' => 'primary'
      );
    ?>
    <?php wp_nav_menu($args); ?>
  </div>
</nav>

