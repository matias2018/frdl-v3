<?php include('header_alt.php'); ?>

<!-- hero -->
<section class="hero-blue-full blue init">
  <div class="container ">

    <div class="index-hero-text">
      <h1 class="slogan">Um fundo criado para apoiar projectos das misericórdias portuguesas</h1>
      <p contentEditable class="intro">O objetivo do Fundo Rainha D. Leonor é concluir projetos sociais inovadores e recuperar o património histórico das Misericórdias.</p>
    </div>
  </div>
</section>

<section id="frdl_ba" class="container">
  <h2 class="title title-destaque">Impacto do nosso trabalho</h2>
  <div class="ontainer_ba">
    <div id="before-after-slider">
      <div id="before-image" class="img_ba">
        <img src="<?php echo get_theme_file_uri('/images/real/beforeAfter/depois.jpeg'); ?>" alt="Depois da obra">
        <!-- <img src="https://images.pexels.com/photos/3728078/pexels-photo-3728078.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="before"/> -->
      </div>

      <div id="after-image" class="img_ba">
        <img src="<?php echo get_theme_file_uri('/images/real/beforeAfter/antes.jpeg'); ?>" alt="Antes da obra" class="logo-nav">
        <!-- <img src="https://images.pexels.com/photos/325185/pexels-photo-325185.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="After"/> -->
      </div>
      <div id="resizer"></div>
    </div>
    <div class="before_after_text-box">
      <?php
      $obra_ba = new WP_Query(
        array(
          'post_type' => 'obra',
          'posts_per_page' => 1,
          'meta_key' => 'obra_ba',
          'meta_value' => 1
        )
      );
      while ($obra_ba->have_posts()) {
        $obra_ba->the_post();
      ?>
        <p class="news-title mt-50"><?php the_title(); ?></p>
        <a class="knowMoreBtn mt-50" href="<? the_permalink(); ?>">Ler Mais</a>
      <?php
      }
      wp_reset_postdata();
      ?>
    </div>
</section>

<main id="main-content" class="newsHeadlines mt-50">

    <!-- seccao destaque -->
    <section class="container">
    <h2 class="title title-destaque">em destaque</h2>

    <div class="destaque_container">
      <div class="destaques">
        <?php
        $destaques = new WP_Query(
          array(
            'posts_per_page' => 1,
            'post_type' => 'post',
            'category_name' => 'destaque',
          )
        );
        while ($destaques->have_posts()) {
          $destaques->the_post();
        ?>
          <div class="destaque">
            <a href="<?php the_permalink(); ?>">
              <div class="banner" style="background: url('<?php $destaque_img = get_field('destaque_img'); ?>');">

                <img 
                  class="destaque_img obra-card__image" 
                  src="<?php the_post_thumbnail_url(); ?>" 
                  alt="<? 
                    if (get_the_post_thumbnail_caption($post)) {
                      echo get_the_post_thumbnail_caption($post);
                    } else {
                      echo get_the_title();
                    }?>">
              </div>
            </a>
            <div class="destaque news-card-excerpt mt-50">
              <p class="destaque news-title"><?php the_title(); ?></p>
              <p class="destaque news-excerpt"><?php echo get_the_excerpt(); ?></p>
            </div>
            <div class="news-card-footer">
              <a href="<?php the_permalink(); ?>" class="knowMoreBtn mt-50">
                Ler mais
              </a>
            </div>
            </a>
          </div>
        <?php
        }
        ?>
        <?php
        echo paginate_links();
        wp_reset_postdata();
        ?>

      </div>
    </div>
  </section>

  <section class="stats">

  <?php
    $counter = 0;
    $posts_patrimonio = 0;
    $posts_social = 0;
    $supportValue = 0;
    $args = array(
      'post_type' => 'obra',
      'posts_per_page' => -1,
      'meta_key' => 'local_da_obra',  // Set the custom field name for 'local'
      'orderby' => 'meta_value',     // Order by the value of the 'local' field
      'order' => 'ASC',
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {
      while ($query->have_posts()) {
        $query->the_post();
        $counter++;
        $tipo_de_post = get_field('tipo_de_obra');
        $supportValue += get_field('valor_do_apoio');
        if ($tipo_de_post[0] == 'Recuperação de Património') {
          $posts_patrimonio++;
        } else if(($tipo_de_post[0] == 'Obras e Equipamentos Sociais') ){
          $posts_social++;
        } else {
          return false;
        }
      }
    }
    $total_posts = $query->found_posts;
    ?>

    <div class="container">
      <h3 class="section-heading my-1 underline75">
        O Fundo Rainha D. Leonor em números
      </h3>

      <div class="flex text-center my-4 raizingNumbers">
        <div>
          <?php 
            $roundedValue = number_format(round(($supportValue / 1000000), 1), 1); 
          ?>
          <p class="counter millions <?= $supportValue; ?>" data-target="<?php echo $roundedValue; ?>"><?php echo $roundedValue; ?></p>
          <p class="text-secondary">Investimento total</p>
        </div>
        <div>
          <p class="counter" data-target="<?= $total_posts; ?>">0</p>
          <p class="text-secondary">Instituições</p>
        </div>
        <div>
          <!-- <h4 class="counter" data-target="115">0</h4> -->
          <p class="counter" data-target="<?php echo $posts_social; ?>">0</p>
          <p class="text-secondary">Projetos Sociais</p>
        </div>
        <div>
          <!-- <h4 class="counter" data-target="28">0</h4> -->
          <p class="counter" data-target="<?= $posts_patrimonio; ?>">0</p>

          <p class="text-secondary">Projetos da área do Património</p>
        </div>

      </div>
    </div>
  </section>

  <section class="news container">
    <h2 class="title title-news">notícias</h2>
    <div class="news-last-two">
      <?php
      $homePageWorks = new WP_Query(
        array(
          'post_type' => 'post',
          'category_name' => 'noticias',
          'posts_per_page' => 2,
        )
      );
      while ($homePageWorks->have_posts()) {
        $homePageWorks->the_post();
      ?>
        <div class="news-card">
          <div class="the_card">
            <div class="news-card-header">
              <img class="news-card__image" src="<?php the_post_thumbnail_url(); ?>" alt="<? if (get_the_post_thumbnail_caption($post)) {
                                                                                            echo get_the_post_thumbnail_caption($post);
                                                                                          } else {
                                                                                            echo get_the_title();
                                                                                          }
                                                                                          ?>">
            </div>
            <div class="news-cat">
              <!-- <p class="the-category">
                <?php echo wpdocs_custom_taxonomies_terms_links(); ?>
              </p> -->
              <p class="the-tag">
                <?php
                  $post_tags = get_the_tags();
                  if ( $post_tags ) {
                      echo $post_tags[0]->name; 
                  }
                ?>
              </p>
              <p class="toLowercase"><?php echo get_the_date(__('F j, Y')); ?></p>
            </div>
            <div class="news-card-excerpt">
              <p class="news-title"><?php the_title(); ?></p>
            </div>
            <div class="news-card-footer">
              <a href="<?php the_permalink(); ?>" class="knowMoreBtn">
                Ler mais
              </a>
            </div>
          </div>
        </div>
      <?php
      }
      ?>

      <?php echo paginate_links(); ?>
    </div>
  </section>

</main>
<?php get_footer(); ?>