
<?php
global $query_string;

$query_args = explode("&", $query_string);
$search_query = array();

foreach($query_args as $key => $string) {
	$query_split = explode("=", $string);
	$search_query[$query_split[0]] = $query_split[1];
} // foreach

$search = new WP_Query($search_query);

?>

<?php 
  get_header();
?>

<section class="search features-head bg-light py-3">
    <div class="container">
      <div class="search-header">
        <a class="backHomeBtn backToSearch" href="<?php echo esc_url(site_url('/search')); ?>">Nova pesquisa</a>
        <h1 class="title">Resultados da Pesquisa</h1>
        <?php
          $allsearch = new WP_Query("s=$s&showposts=0"); 
          echo $allsearch ->found_posts.' resultados encontrados.';
        ?>
        <div class="lead search-content">
          <form class="search-form" method="get" action="<?php echo esc_url(site_url('/')); ?>">
            <label for="s" class="flex label-flex">
              <input type="search" name="s" id="s" placeholder="Pesquisou por &ldquo;<?= esc_html(get_search_query()); ?>&rdquo;">
              <input type="submit" value="Procurar">
            </label>
          </form>
        </div>
      </div>
    </div>
  </section>
  <section class="posts features-head bg-light py-3">
    <div class="container container-of-search">

    <?php
      global $wp_query;
      $total_results = $wp_query->found_posts;
    ?>
      <?php
        if ( $total_results && have_posts() && !is_paged() && !is_archive() ) {
          while ( have_posts() ) {
            the_post();
            get_template_part('template-parts/content', get_post_type());
            echo '<div class="flex go-to-result-btn"><a class="backHomeBtn go-to-result" href="'. get_permalink( get_page_by_title( $title, OBJECT ) ) . '">Ir para resultado</a></div>';
      ?>
      <?php }
        } 
        else if ( has_post_format( array( 'gallery', 'video', 'image' ) ) ) {
          get_template_part( 'template-parts/content', get_post_format() );
      }
        else { 
      ?>
        <p class="noResults"><strong>Não encontrámos resultados para a sua pesquisa.</strong></p>
      <?php
        }
      ?>
      <?php echo paginate_links(); ?>
    </div>
  </section>

<?php
  get_footer();
?>