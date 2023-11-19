<?php
get_header();
?>

<section class="obras features-head bg-light py-3">
  <div class="container">
    <div class="page_header">
      <h1>Obras</h1>
      <div class="page_header--intro">
        <p class="page_header--intro-p">
          Desde 2015, o Fundo Rainha D. Leonor apoiou 143 projetos em Misericórdias de todo o País num investimento superior a 23 milhões de euros.
        </p>
      </div>
    </div>
    <div>
      <h2 class="padding-10-on-desktop">Obras apoiadas</h2>
    </div>

    <div class="filter filter-btn-container padding-10-on-desktop" id="target">
    <a href="#" class="filter-btn filter-active all">
      Todos
    </a>

      <a href="#" class="filter-btn rec" data-filter="Obras e Equipamentos Sociais">
        Recuperação de património
      </a>
      <a href="#" class="filter-btn soc" data-filter="Requalificação de Património">
        Obras e Equipamentos Socias
      </a>

      <!-- <a href="#" class="filter-btn conclusionState" data-filter="Concluded">
        Obras concluídas
      </a>
      <a href="#" class="filter-btn conclusionState" data-filter="Concluded">
        Obras em processo de conclusão
      </a> -->

    </div>

  </div>
</section>
<section id="main-content" class="posts-container features-head bg-light py-3">
  <div class="container obras_container">
    <?php
    $how_many_last_posts = intval(get_post_meta($post->ID, 'archived-posts-no', true));
    $counter = 1;
    if ($how_many_last_posts > 8 || $how_many_last_posts < 2) $how_many_last_posts = -1;
    ?>
    <?php
    $args = array(
      'post_type' => 'obra',
      'posts_per_page' => $how_many_last_posts,
      'meta_key' => 'local_da_obra',  // Set the custom field name for 'local'
      'orderby' => 'meta_value',     // Order by the value of the 'local' field
      'order' => 'ASC',
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {
      while ($query->have_posts()) {
        $query->the_post();
    ?>

        <div class="archive_work obra displayOnHold done_<?php echo get_field('estado_da_obra'); ?>" data-category="<?php the_field('tipo_de_obra') ?>">
          <div class="lead obra-card">
            <a class="image-wrapper" href="<?php the_permalink(); ?>">
              <img 
                class="obra-card__image" 
                src="<?php the_post_thumbnail_url(); ?>" 
                alt="
                  <? if (get_the_post_thumbnail_caption($post)) {
                        echo get_the_post_thumbnail_caption($post);
                      } else {
                        echo get_the_title();
                      } 
                  ?>
                " 
                style="object-fit: cover;">
            </a>
          </div>
          <div class="obra-card-excerpt">
            <h2 class="localDaObra"><?php echo get_field('local_da_obra'); ?></h2>
            <p><?php the_title(); ?></p>
          </div>
        </div>

      <?php }
    } else {
      ?>
      <h3>We have found no posts.</h3>
    <?php
    }
    ?>
  </div>

</section>


<?php
get_footer();
?>