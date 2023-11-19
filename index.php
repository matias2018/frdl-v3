<?php 
  get_header();
?>

<section class="candidaturas features-head bg-light py-3 init">
    <div class="container">
      <div>
        <div class="page_header">
          <h1>Notícias</h1>
          <div class="page_header--intro">
            <p class="page_header--intro-p">
              Desde 2015 que este Fundo ajuda as Misericórdias portuguesas em causas sociais prioritárias e inovadoras, contribuindo para a coesão social e territorial do país.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="main-content" class="posts features-head bg-light py-3">
    <div class="container">
      <?php
        if ( have_posts() ) {
          while ( have_posts() ) {
            the_post(); 
      ?>
        <div class="post-item article-card displayOnHold">
          <a 
            href="<?php the_permalink(); ?>" 
            class="the_archive-news_card"
          >
          
            <div class="archive-news-card--left">
                <img 
                  class="archive-news-card__image" 
                  src="<?php the_post_thumbnail_url(); ?>" 
                  alt="<?php the_title(); ?>" 
                  style="object-fit: cover;"
                >
            </div>
          </a>
            <div class="archive-news-card--right">
                <div class="archive-newsPreviewContent">
                  <div class="article-previewContent--header">
                    <!-- <span class="post">
                      <?php echo get_the_category_list(', '); ?>
                    </span> -->
                    <?php the_date( 'j F Y', '<span class="theDate toLowercase">', '</span>' ); ?>
                  </div>
                  <p class="the-tag">
                    <b>
                      <?php
                        $post_tags = get_the_tags();
                        if ( $post_tags ) {
                            echo $post_tags[0]->name; 
                        }
                      ?>
                    </b>
                  </p>
                </div>
                <h2 class="archive-newsTitle"><?php the_title(); ?></h2>
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

<!--     <div class="row show-more-row">
      <a href="#" class="show-more">show more</a>
    </div> -->
  </section>
 
  <script>
    jQuery(document).ready(function($) {

      /* take care of number of posts to display */

  /* 
  1- get the total of posts
  2- divide the total number of posts by the number of posts inside each 'cluster' (set of 8 posts)
  3- display the first set
  4- evaluate how many images we still have to display
  5- if (there are more images to show) -> display 'show more button'
   5.1- when the 'show more' button is pressed, display any number of images up until 8
   5.2- go to 4
  6- if (!there are more images to show) -> hide 'show more button'
  */

    /* let totalNoticias = $('.post-item.displayOnHold').length;
    let how_many_noticias_to_be_shown = 4;
    let how_many_noticias_left_to_be_shown = totalNoticias - how_many_noticias_to_be_shown;

  function initShow() {


    if(totalNoticias > how_many_noticias_to_be_shown) {
      $('.show-more').removeClass('buttonOff');
      $( '.post-item' ).slice(how_many_noticias_to_be_shown).addClass('hidden');
    }
    console.log('totalNoticias', totalNoticias);
    console.log('how_many_noticias_to_be_shown', how_many_noticias_to_be_shown);
    console.log('totalNoticias - how_many_noticias_to_be_shown', (totalNoticias - how_many_noticias_to_be_shown));
  }

  initShow();

  $( ".show-more" ).click(function(e) {
    e.preventDefault();
    var showMore = $(this); 
    
    if(how_many_noticias_left_to_be_shown >= 1) {
      for(i = 0; i < how_many_noticias_to_be_shown; i++) {
        $('.displayOnHold').removeClass('hidden displayOnHold');
        how_many_noticias_left_to_be_shown -=1;
      }
      
      if(how_many_noticias_left_to_be_shown < 1) {
        $('.show-more').addClass('buttonOff');
        how_many_noticias_left_to_be_shown = 0;
      }
    }
    
  }); */

    $(".article-card").click(function() {
      window.location = $(this).find("a").attr("href"); 
      return false;
    });
  });
  </script>

<?php
  get_footer();
?>