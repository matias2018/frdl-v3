<?php include('header_alt.php'); ?>

<!-- hero -->
<section class="hero-blue-full blue init">
  <div class="container ">

    <div class="index-hero-text">
      <h1 class="slogan">Um fundo criado para apoiar projectos das misericórdias portuguesas</h1>
      <p contentEditable class="intro">É objectivo do grupo concluir projectos sociais prioritários e inovadores</p>
    </div>
    <div class="btn-container">
      <a href="<?= site_url('/obras'); ?>" class="link-btn">
        O que fazemos
      </a>
    </div>
  </div>
</section>

<section id="frdl_ba" class="container">
  <h2 class="title title-destaque">O impacto do nosso trabalho</h2>
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
</section>

<main id="main-content" class="newsHeadlines">
  <!-- seccao destaque -->
  <div class="container">
    <h2 class="title title-destaque">em destaque</h2>

    <div class="destaque_container">
      <div class="destaques">
        <?php
        $destaques = new WP_Query(
          array(
            'posts_per_page' => 1,
            'post_type' => 'Destaque'
          )
        );
        while ($destaques->have_posts()) {
          $destaques->the_post();
        ?>
          <div class="destaque">
            <a href="<?php the_permalink(); ?>">
              <div class="banner" style="background: url('<?php $destaque_img = get_field('destaque_img'); ?>');">

                <img class="destaque_img obra-card__image" src="<?php echo $destaque_img['url']; ?>" alt="<? if (get_the_post_thumbnail_caption($post)) {
                                                                                                            echo get_the_post_thumbnail_caption($post);
                                                                                                          } else {
                                                                                                            echo get_the_title();
                                                                                                          } ?>">
              </div>
              <div class="destaque_text-box">
                <p class="destaque_text"><?php echo wp_trim_words(get_field('destaque_text'), 25); ?></p>
                <p class="knowMoreBtn alignEnd">Ler Mais</p>
              </div>
            </a>
          </div>
        <?php
        }
        ?>
        <?php echo paginate_links(); ?>
      </div>
    </div>
  </div>
</main>
<section class="stats">
  <div class="container">
    <h3 class="section-heading text-center my-1">
      O Fundo Rainha D. Leonor em números
    </h3>

    <div class="grid grid-3 text-center my-4">
      <div>
        <h4 class="counter" data-target="254">0</h4>
        <p class="text-secondary">Instituições</p>
      </div>
      <div>
        <h4 class="counter" data-target="273">0</h4>
        <p class="text-secondary">Projectos de Recuperação</p>
      </div>
      <div>
        <h4 class="counter" data-target="682">0</h4>
        <p class="text-secondary">Apoios</p>
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
        'posts_per_page' => 10,
        'post_type' => 'post',
        'posts_per_page' => 2
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
            <p class="the-category"><?php echo wpdocs_custom_taxonomies_terms_links(); ?></p>
            <p><?php echo get_the_date(__('d . m . Y')); ?></p>
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

<section class="worksHeadlines container">
  <h2 class="title">obras</h2>
  <div class="obras-last-three">
    <?php
    $homePageWorks = new WP_Query(
      array(
        'posts_per_page' => 10,
        'post_type' => 'obra',
        'posts_per_page' => 2
      )
    );
    while ($homePageWorks->have_posts()) {
      $homePageWorks->the_post();
    ?>
      <?php if ($homePageWorks->current_post % 2 == 0) : ?>
        <div class="obra odd row">
          <div class="obra-card-excerpt obra_column odd">
            <p class="obra-title odd"><?php echo get_field('local_da_obra'); ?></p>
            <p class="obra-description odd"><?php the_title(); ?></p>
            <div class="btn-capsule">
              <a href="<?php the_permalink(); ?>" class="knowMoreBtn knowMoreBtnOdd">
                Ler mais
              </a>
            </div>

          </div>
          <div class="obra-card-header odd obra_column">
            <img class="obra-card__image odd" src="<?php the_post_thumbnail_url(); ?>" alt="<? if (get_the_post_thumbnail_caption($post)) {
                                                                                              echo get_the_post_thumbnail_caption($post);
                                                                                            } else {
                                                                                              echo get_the_title();
                                                                                            } ?>" style="object-fit: cover; width: 100%; height: 100%;">
          </div>

        </div>
      <?php else : ?>
        <div class="obra row">
          <div class="obra-card-header obra_column">
            <img class="obra-card__image" src="<?php the_post_thumbnail_url(); ?>" alt="<? if (get_the_post_thumbnail_caption($post)) {
                                                                                          echo get_the_post_thumbnail_caption($post);
                                                                                        } else {
                                                                                          echo get_the_title();
                                                                                        } ?>">
          </div>
          <div class="obra-card-excerpt obra_column">
            <p class="obra-title"><?php echo get_field('local_da_obra'); ?></p>
            <p class="obra-description"><?php the_title(); ?></p>
            <a class="obra-card knowMoreBtn" href="<?php the_permalink(); ?>">
              Ler mais
            </a>
          </div>
        </div>
      <?php endif; ?>
    <?php
    }
    ?>

  </div>

</section>

<?php get_footer(); ?>

<!-- cenas retiradas do site 2.0  -->

<section class="worksHeadlines container">
    <h2 class="title">obras</h2>
    <div class="obras-last-three">
      <?php
      $homePageWorks = new WP_Query(
        array(
          'post_type' => 'obra',
          'posts_per_page' => 2
        )
      );
      while ($homePageWorks->have_posts()) {
        $homePageWorks->the_post();
      ?>
        <?php if ($homePageWorks->current_post % 2 == 0) : ?>
          <div class="obra odd row">
            <div class="obra-card-excerpt obra_column odd">
              <p class="obra-title odd"><?php echo get_field('local_da_obra'); ?></p>
              <p class="obra-description odd"><?php the_title(); ?></p>
              <div class="btn-capsule">
                <a href="<?php the_permalink(); ?>" class="knowMoreBtn knowMoreBtnOdd">
                  Ler mais
                </a>
              </div>

            </div>
            <div class="obra-card-header odd obra_column">
              <img class="obra-card__image odd" src="<?php the_post_thumbnail_url(); ?>" alt="<? if (get_the_post_thumbnail_caption($post)) {
                                                                                                echo get_the_post_thumbnail_caption($post);
                                                                                              } else {
                                                                                                echo get_the_title();
                                                                                              } ?>" style="object-fit: cover; width: 100%; height: 100%;">
            </div>

          </div>
        <?php else : ?>
          <div class="obra row">
            <div class="obra-card-header obra_column">
              <img class="obra-card__image" src="<?php the_post_thumbnail_url(); ?>" alt="<? if (get_the_post_thumbnail_caption($post)) {
                                                                                            echo get_the_post_thumbnail_caption($post);
                                                                                          } else {
                                                                                            echo get_the_title();
                                                                                          } ?>">
            </div>
            <div class="obra-card-excerpt obra_column">
              <p class="obra-title"><?php echo get_field('local_da_obra'); ?></p>
              <p class="obra-description"><?php the_title(); ?></p>
              <a class="obra-card knowMoreBtn" href="<?php the_permalink(); ?>">
                Ler mais
              </a>
            </div>
          </div>
        <?php endif; ?>
      <?php
      }
      ?>

    </div>

  </section>

  <?php
  function wpb_tag_cloud() {
    $tags = get_tags();
    $args = array(
      'smallest' => 10,
      'largest' => 22,
      'unit' => 'px',
      'number' => 1,
      'format' => 'flat',
      'separator' => " ",
      'orderby' => 'count',
      'order' => 'DESC',
      'show_count' => 1,
      'echo' => false
    );
    $tag_string = wp_generate_tag_cloud( $tags, $args );
    return $tag_string;
    }
    // Add a shortcode so that we can use it in widgets, posts, and pages
    add_shortcode('wpb_popular_tags', 'wpb_tag_cloud');
    // Enable shortcode execution in text widget
    add_filter ('widget_text', 'do_shortcode');    
  ?>