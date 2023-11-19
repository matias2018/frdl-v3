<?php
get_header();
?>

<?php 
  while( have_posts() ) {
    the_post();

    $faq = get_field('question');
    $answer = get_field('answer');
    ?>
    <section id="main-content" class="single-faq features-head bg-light py-3 init">
      <div class="container">
        <div class="accordion">
          <button class="faq faq-1"><?php echo $faq ?>
            <i class="fas fa-plus faq-rotator"></i>
          </button>
          <?php echo '<p class="answer">' . $answer . '</p>' ?>
      </div>
    </div>
  </section>
<?php
  }
?>
<hr>

<?php get_footer(); ?>