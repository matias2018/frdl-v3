<post-item>
<div class="obra">
  <div class="lead obra-card">
    <a href="<?php the_permalink(); ?>">
      <img class="obra-card__image" src="<?php the_post_thumbnail_url(); ?>" alt="" style="object-fit: cover;">
      <span class="obra-card__name"><?php the_title(); ?></span>
    </a>
  </div>
  <div class="obra-card-excerpt">
    <p><?php the_title(); ?></p>
    <p><?php echo wp_trim_words(get_the_content(), 10); ?></p>
  </div>
</div>
</post-item>