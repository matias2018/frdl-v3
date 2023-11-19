<?php /* Template Name: CustomPageAboutUs */ ?>
<?php
get_header();
?>

<div class="about main-wrapper">

<section class="candidaturas features-head bg-light py-3 init">
  <div class="container">
    <div class="page_header">
      <h1>Sobre nós</h1>
      <div class="page_header--intro">
        <p class="page_header--intro-p">
          Desde 2015 que este Fundo ajuda as Misericórdias portuguesas em causas sociais prioritárias e inovadoras, contribuindo para a coesão social e territorial do país.
        </p>
      </div>
    </div>
  </div>
</section>

<div class="about">
  <div class="container">
    <div class="flex videos">
      <iframe title="Discurso Provedor na Assinatura de Contratos do Fundo rainha D. Leonor" src="https://www.youtube.com/embed/_qZ4E-Ol4yc?si=XyHOOIx2C7ZnU4hZ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"></iframe>
      <iframe title="Discurso Provedor na Assinatura de Contratos do Fundo rainha D. Leonor" src="https://www.youtube.com/embed/GAwq_DRBSEI?autoplay=0&amp;fs=1&amp;iv_load_policy=3&amp;showinfo=0&amp;rel=0&amp;cc_load_policy=0&amp;start=0&amp;end=0&amp;origin=http://youtubeembedcode.com"></iframe>
    </div>
  </div>
</div>

<section class="blueBreaker">
  <div class="container">
  <p>
    Criado pela Santa Casa da Misericórdia de Lisboa e pela União das Misericórdias Portuguesas, o Fundo Rainha D. Leonor nasce da convicção de que as boas causas devem sair das fonteiras da capital.
    </p>
  </div>
</section>

<main class="about">
  <div class="container about-the-queen">

    <p class="paragraph paragraph-padding">
      O Fundo Rainha D. Leonor foi criado para apoiar obras nas Misericórdias de todo o País.
    </p>
    <p class="paragraph paragraph-padding">
      Nasce de um Acordo de Parceria entre a Santa Casa da Misericórdia de Lisboa ​e a União das  Misericórdias Portuguesas, inédito em 500 anos de história.
    </p>
    <p class="paragraph paragraph-padding">
      Baseia-se no espírito da autonomia cooperante e apoia projetos​ sociais necessários, inovadores, sustentáveis e de qualidade.<br>
      Desde 2017, o Fundo apoia também a recuperação do Património Histórico das Misericórdias.</p>
      <p class="paragraph paragraph-padding">
      Foram aprovados 143 projetos: 115 na área social e 28 na do património, num investimento superior a 23 milhões de euros.</p>
      <p class="paragraph paragraph-padding">
      O Acordo com a UMP inclui ainda um programa de apoio aos Inventários das Santas Casas, a criação do Museu Virtual das Misericórdias e o Acordo Nossa Senhora do Manto que coloca utentes da SCML nas valências das Misericórdias.​
    </p>
    <div class="btn-container-oacordo">
      <a class="oacordo" href="https://mais.scml.pt/frdl/wp-content/uploads/sites/9/2018/08/Acordo-de-parceria-entre-a-SCML-e-a-UMP.pdf" target="_blank">Acordo de Parceria entre SCML e UMP</a>
    </div>
  </div>

  <section class="container mt-100">
    <div id="inner-wrap">
      <div class="container flex row">
        <img class="theQueen" src="<?php echo get_theme_file_uri('/images/leonor.jpg'); ?>" alt="Depois da obra" />
        <div class="legenda">
          <h3 class="underline75 line-height-20">Rainha D. Leonor</h3>
          <br>
          <p>Esboço do retrato da Rainha D. Leonor</p>
          <p><b>José Malhoa</b></p>
          <sub>Museu de São Roque, Lisboa.</sub>
        </div>
      </div>
    
    </div>
  </section>
</main>

<!-- clipping -->
<!-- <section class="clipping mb-100">
      <div class="accordion container">
        <h2>O Fundo na imprensa nacional</h2>
        <?php
        $clips = new WP_Query(
          array(
            'post_type' => 'clip',
            'posts_per_page' => 4,
            'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
          )
        );
        while ($clips->have_posts()) {
          $clips->the_post();
        ?>
          <a href="<?php echo get_field('url'); ?>" target="_blank" class="clip">
          <div>
            <p class="clip"><?php the_title(); ?></p>
            <sub class="clip"><?php echo get_field('data'); ?> | <span class="origem"><?= get_field('origem'); ?></span></sub>
          </div>
          <i class="bi bi-box-arrow-up-right">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z"/>
              <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z"/>
            </svg>
          </i>
          </a>
        <?php
        }
        ?>
        <?php 
        $big = 999999999; // need an unlikely integer
          echo paginate_links(
            array(
              'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
              'format' => '?paged=%#%',
              'current' => max( 1, get_query_var('paged') ),
              'total' => $clips->max_num_pages
            )
          ); 
          wp_reset_postdata();
        ?>
      </div>
</section> -->

</div>

<?php get_footer(); ?>