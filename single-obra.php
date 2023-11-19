<?php
get_header();
?>

<?php 
  while( have_posts() ) {
    the_post(); 
    ?>
    <section id="main-content" class="single-post features-head bg-light py-3 init">
    <div class="container" data-category="<?php the_field('tipo_de_obra')?>">
      <div class="ndd-post-display" id="target">
        <div class="header-single header">
          
            <a class="backHomeBtn" href="<?php echo get_post_type_archive_link('obra'); ?>">Voltar</a>
        
          <h1 class="title post-title"><?php the_title(); ?></h1>
        </div>
        
        <div class="container-r">
          <div class="lead singular-lead">
            <span class="post">
              <?php echo get_the_category_list(', '); ?>
            </span>
          </div>
          <div class="lead-content container">
            <?php  the_content(); ?>
          </div>
        </div>
    </div>
  </div>

  <main class="lead obraCard obra single-obra">
    <div class="lead-image">
      <img 
        class="obra-card__image" 
        src="<?php the_post_thumbnail_url(); ?>" 
        alt="<? if(get_the_post_thumbnail_caption($post)) {
                  echo get_the_post_thumbnail_caption($post);
                } else {
                  echo get_the_title();
                } ?>"
        style="object-fit: cover;"
      >
    </div>
    <div class="lead-data">
      
      <h2 class="localDaObra"><?php echo get_field('local_da_obra'); ?></h2>
      
      <div class="tipoObra">
        <h3>Tipo de Obra</h3>
        <p><?php the_field('tipo_de_obra')?></p>
      </div>
    
      <h3 class="lead-data-item">Ano</h3>
      <?php $workDate = new DateTime( get_field('data_da_obra') ); ?>
      <span><?php echo $workDate->format('Y'); ?></span>

      <h3 class="lead-data-item">Estado de conclusão da obra</h3>
      <?php $workDone = get_field('estado_da_obra'); ?>
      <?php if($workDone) { ?>
        <span>Concluída</span>
        <?php } else { ?>
          <span class="data-info">Em processo de conclusão</span>
        <?php } ?>
      <h3 class="lead-data-item">Valor do Projecto</h3>
      <?php $projectValue = get_field('valor_do_projecto'); ?>
      <?php echo '<span class="data-info">'. number_format($projectValue, 2, ',', ' ') .' €</span>'?>

      <h3 id="target" class="lead-data-item">Valor do Apoio</h3>
      <?php $supportValue = get_field('valor_do_apoio'); ?>
      <?php echo '<span class="data-info">'. number_format($supportValue, 2, ',', ' ') . ' €</span>'?>
      </div>
    </main>
  </section>
<?php
  }
?>

<?php get_footer(); ?>

