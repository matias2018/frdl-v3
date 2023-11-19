<?php
get_header();
?>

<?php
while (have_posts()) {
  the_post();

  $destaque = get_field('destaque');
  $destaque_img = get_field('destaque_img');
  $destaque_link = get_field('destaque_link');

?>
  <section id="main-content" class="single-faq features-head bg-light py-3 init">
    <div class="container">
      <div class="backTo">
        <a class="backHomeBtn" href="<?= site_url(); ?>"><i class="fa fa-home" aria-hidden="true"></i> Voltar para página inicial</a>
      </div>
      <h1 style="margin: 100px 0 100px 0;">
        <?php echo the_title(); ?>
      </h1>
      <img class="obra-card__image" src="<?php echo $destaque_img['url']; ?>" alt="" style="object-fit: cover; width: 100%; height: 100%;" class="destaque_img">
      <p id="target" style="margin: 100px 0 100px 0; line-height: 32px;"><?php echo get_field('destaque_text'); ?></p>
      <a class="obra-card knowMoreBtn" href="<?php echo $destaque_link; ?>">
        Ler mais
      </a>
    </div>
  </section>
<?php
}
?>
<hr>

<?php get_footer(); ?>