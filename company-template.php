<?php
/*
  Template Name: 会社電話表示
*/
?>

<?php get_header(); ?>

<div class="container">
  <div class="u-flex my-6">
    <main>
      <div class="content">
        <div class="u-block">
          <?php if(have_posts()) : ?>
            <?php while(have_posts()) : the_post(); ?>
              <article class="page">
                <h2 class="page__title"><?php the_title(); ?></h2>
                <p class="u-phone">TEL: 090-9999-9999</p>
                <?php the_content(); ?>
              </article>
            <?php endwhile; ?>
          <?php else : ?>
            <?php echo wpautop('記事がありません。'); ?>
          <?php endif; ?>
        </div>
      </div>
    </main>
    <div class="sidebar">
      <?php if(is_active_sidebar('sidebar')) : ?>
        <?php dynamic_sidebar('sidebar'); ?>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>