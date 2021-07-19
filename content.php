<!-- サーチページ || アーカイブページのとき -->
<?php if(is_search() || is_archive()) : ?>
  <div class="archive__container">
    <h3 class="archive__title">
      <a href="<?php the_permalink(); ?>" class="archive__link"><?php the_title(); ?></a>
    </h3>
    <p class="archive__p"><?php the_time(' Y年Fj日'); ?> </p>
  </div>


<?php else : ?>
<!-- 投稿ページ -->
  <article class="post">
    <h1 class="post__title"><?php the_title(); ?></h1>
    <p class="post__meta">
      <?php the_time(' Y年Fj日'); ?> by 
      <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
        <?php the_author(); ?>
      </a>
      カテゴリー: 
      <?php 
      $categories = get_the_category(); 
      $separator = ', ';
      $output = '';

      if($categories) {
        foreach($categories as $category) {
          $output .= '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>' . $separator;
        }
      }
      echo trim($output, $separator);
      ?>
    </p>
    <?php if(has_post_thumbnail()) : ?>
      <div class="post__thumbnail">
        <?php the_post_thumbnail(); ?>
      </div>
    <?php endif; ?>
    <?php if(is_single()) : ?>
      <p class="post__p"><?php the_content(); ?></p>
    <?php else : ?>
      <p class="post__p"><?php the_excerpt(); ?></p>
      <a href="<?php the_permalink(); ?>" class="button">記事を読む</a>
    <?php endif; ?>
  </article>


<?php endif; ?>