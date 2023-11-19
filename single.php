<?php
get_header();
?>

<?php 
  while( have_posts() ) {
    the_post(); 
    ?>
    <section id="main-content" class="single-post features-head bg-light py-3 init">
    <div class="container">
      <div id="main-content">
        <div class="header-single header">
          
            <a class="backHomeBtn" href="<?php echo get_post_type_archive_link('post'); ?>">Voltar</a>
        
          <h1 class="title post-title"><?php the_title(); ?></h1>
        </div>
    
        <div class="container-r">
          <div class="lead singular-lead">
            <?php the_date( 'j F Y', '<span class="theDate toLowercase">', '</span>' ); ?>
            <span class="post">
              <p class="the-tag">
                <?php
                  $post_tags = get_the_tags();
                  if ( $post_tags ) {
                      echo $post_tags[0]->name; 
                  }
                ?>
              </p>
            </span>
          </div>
          <div class="lead-content container">
            <?php  the_content(); ?>
            <div class="news-image-container">
              <img 
                class="news-image" 
                src="<?php the_post_thumbnail_url(); ?>" 
                alt="<? if(get_the_post_thumbnail_caption($post)) {
                          echo get_the_post_thumbnail_caption($post);
                        } else {
                          echo get_the_title();
                        } ?>"
                style="object-fit: cover;"
              >
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php
  }
?>

<?php get_footer(); ?>

