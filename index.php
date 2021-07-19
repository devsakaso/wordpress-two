<?php get_header(); ?>

<div class="wrapper">
  <div class="main">
    <div class="container">
      <?php if(have_posts()) : ?>
        <?php while(have_posts()): the_post(); ?>
        <article class="post">
          <h1>
            <a href="<?php the_permalink(); ?>">
              <?php the_title(); ?>
            </a>
          </h1>
          <div class="meta">
            投稿者: 
            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
              <?php the_author(); ?><br>
            </a>
            <?php the_date('Y年n月j日'); ?>
          </div>
          <?php if(has_post_thumbnail()) : ?>
            <div class="post__thumbnail">
              <?php the_post_thumbnail(); ?>
            </div>
          <?php endif; ?>
          <?php the_excerpt(); ?>
          <br>
          <a href="<?php the_permalink(); ?>">記事を読む</a>
        </article>
        <?php endwhile; ?>
      <?php else : ?>
        <?php echo wpautop('記事がありませんでした。'); ?>
      <?php endif; ?>
    </div>
  </div>

  <div class="sidebar">
    <?php if(is_active_sidebar('sidebar')) : ?>
      <?php dynamic_sidebar('sidebar'); ?>
    <?php endif; ?>
  </div>
</div>
<?php get_footer(); ?>