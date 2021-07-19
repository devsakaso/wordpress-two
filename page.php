<?php get_header(); ?>

<div class="main">
  <div class="container">
    <?php if(have_posts()) : ?>
      <?php while(have_posts()): the_post(); ?>
      <article class="post">
        <h1>
          <?php the_title(); ?>
        </h1>
        <?php if(has_post_thumbnail()) : ?>
          <div class="post__thumbnail">
            <?php the_post_thumbnail(); ?>
          </div>
        <?php endif; ?>
        <?php the_content(); ?>
      </article>
      <?php endwhile; ?>
    <?php else : ?>
      <?php echo wpautop('記事がありませんでした。'); ?>
    <?php endif; ?>
  </div>
  </div>

<?php get_footer(); ?>