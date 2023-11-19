<?php
get_header();
?>

<?php 
  while( have_posts() ) {
    the_post(); 
?>

<section id="main-content" class="candidaturas features-head bg-light init">
    <div class="container">
      <div>
        <div class="lead generic-content">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </section>

<?php
  }
?>

<?php get_footer(); ?>