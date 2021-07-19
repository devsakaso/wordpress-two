<?php get_header(); ?>

<div class="container">
  <div class="u-flex my-6">
    <main>
      <div class="content">
        <div class="u-block">
          <?php if(have_posts()) : ?>
            <?php while(have_posts()) : the_post(); ?>
              <article class="page">
                <div class="page__wrapper">
                  <!-- 子がいて(page_is_parent())、親ページのIDがある場合 -->
                  <?php if(page_is_parent() || $post->post_parent > 0) : ?>
                    <nav class="page__nav">
                      <ul class="page__nav-list">
                        <span class="page__nav-parent-item">
                          <a href="<?php echo get_the_permalink(get_top_parent()); ?>" class="page__nav-parent-link"><?php echo get_the_title(get_top_parent()); ?></a>
                        </span>
                        <?php
                          $args = array(
                            // get_top_parent()は自作関数
                            'child_of' => get_top_parent(),
                            'title_li' => '',
                          );
                        ?>
                        <?php wp_list_pages($args); ?>
                      </ul>
                    </nav>
                  <?php endif; ?>
                  <h2 class="page__title"><?php the_title(); ?></h2>
                </div>
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