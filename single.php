<?php get_header(); ?>

<div class="main">
  <div class="container">
    <?php if(have_posts()) : ?>
      <?php while(have_posts()): the_post(); ?>
      <article class="post">
        <h1>
          <?php the_title(); ?>
        </h1>
        <div class="meta">
          投稿者: <?php the_author(); ?><br>
          <?php the_date('Y年n月j日'); ?>
        </div>
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
    <?php comments_template(); ?>
  </div>
</div>

<?php get_footer(); ?>