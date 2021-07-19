<?php get_header(); ?>

<div class="container">
  <div class="u-flex my-6">
    <main>
      <div class="content">
        <div class="u-block">
        <h1 class="u-header">
          検索結果
        </h1>

          <?php if(have_posts()) : ?>
            <?php while(have_posts()) : the_post(); ?>
              <?php get_template_part('content', get_post_format()); ?>
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