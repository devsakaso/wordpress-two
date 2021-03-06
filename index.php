<?php get_header(); ?>

<div class="container">
  <div class="u-flex my-6">
    <main>
      <div class="content">
        <div class="u-block">
          <?php if(have_posts()) : ?>
            <?php while(have_posts()) : the_post(); ?>
              <!-- articleがあった部分 -->
              <!-- get_template_partのsecond argはformat(asideとかgalleryとか) -->
              <?php get_template_part('content', get_post_format()); ?>
            <?php endwhile; ?>
          <?php else : ?>
            <?php echo wpautop('記事がありません。'); ?>
          <?php endif; ?>
        </div>
      </div>
    </main>
    <div class="sidebar">
      <!-- <div class="u-block">
        <h3 class="sidebar__title">サイドバー</h3>
        <p class="sidebar__p">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore
          obcaecati recusandae illo consectetur placeat et, praesentium
          eaque rerum accusantium amet eveniet, repudiandae odit,
          repellendus incidunt in dolores soluta mollitia. Nulla!
        </p>
        <a href="" class="button">詳しくみる</a>
      </div> -->
      <?php if(is_active_sidebar('sidebar')) : ?>
        <?php dynamic_sidebar('sidebar'); ?>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>