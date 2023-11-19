<div class="lead post-item">
  <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
  <span class="post-category"><?php echo get_the_category_list(', '); ?></span>
  <p class="excerpt">
    <?if(has_excerpt()) {
        echo the_excerpt();
      } else {
        echo wp_trim_words(get_the_content(), 10);
      }
    ?>
  </p>
  <hr>
</div>