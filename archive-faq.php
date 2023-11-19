<?php 
  get_header();
?>

<section class="faqs features-head bg-light py-3 init">
    <div class="container">
      <div>
        <h1 class="title">FAQ's</h1>
      </div>
    </div>
  </section>

  <section id="main-content" class="posts-container features-head bg-light py-3">
    <div class="container faqs_container">
      <?php
        if ( have_posts() ) {
          while ( have_posts() ) {
            the_post();
            $faq = get_field('question');
            $answer = get_field('answer');
      ?>
      <div class="faq">
        <div class="lead faq-card">
          <div class="accordion">
            <button class="faq faq-1"><?php echo $faq ?>
              <i class="fas fa-plus faq-rotator"></i>
            </button>
            <?php echo '<p class="answer">' . $answer . '</p>' ?>
          </div>
        </div>
      </div>
      <?php }
        } else { 
      ?>
        <h3>We have found no posts.</h3>
      <?php
        }
      ?>
      <?php echo paginate_links(); ?>
    </div>
  </section>

<?php
  get_footer();
?>

