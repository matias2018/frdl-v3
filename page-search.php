<?php
get_header();
?>

<?php 
  while( have_posts() ) {
    the_post(); 
?>

<section id="main-content" class="candidaturas features-head bg-light py-3">
    <div class="container">
      <div>
        <h1 class="title"><?php the_title(); ?></h1>
        <div class="lead search-content">
          <form class="search-form" method="get" action="<?php echo esc_url(site_url('/')); ?>">
            <label for="s" class="flex label-flex">
              <input type="search" name="s" id="s">
              <input type="submit" value="Procurar">
            </label>
          </form>
        </div>
      </div>
    </div>
  </section>

<?php
  }
?>

<?php get_footer(); ?>