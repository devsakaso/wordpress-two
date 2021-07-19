<?php get_header(); ?>

<div class="container">
  <div class="u-flex my-6">
    <main>
      <div class="content">
        <div class="u-block">
        <h1 class="u-header">
          <?php
            if(is_category()) {
              single_cat_title();
            } else if(is_author()) {
              the_post();
              echo get_the_author() . 'のアーカイブ';
              rewind_posts();
            } else if(is_tag()) {
              single_tag_title();
            } else if(is_day()) {
              echo '日付：' . get_the_date();
            } else if(is_month()) {
              echo '月：' . get_the_date('F Y');
            } else if(is_year()) {
              echo '年：' . get_the_date('Y');
            } else {
              echo 'アーカイブ';
            }
          ?>
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
      <div class="u-block">
        <h3 class="sidebar__title">サイドバー</h3>
        <p class="sidebar__p">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore
          obcaecati recusandae illo consectetur placeat et, praesentium
          eaque rerum accusantium amet eveniet, repudiandae odit,
          repellendus incidunt in dolores soluta mollitia. Nulla!
        </p>
        <a href="" class="button">詳しくみる</a>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>