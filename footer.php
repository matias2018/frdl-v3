<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

wp_footer();
?>

  <footer class="footer init">
    <div class="container">
      <div class="footer-logos footer-layer-top">
        <div class="footer-info">
          <a href="<?= site_url(); ?>" aria-label="Fundo Rainha D. Leonor home page">
            <img src="<?php echo get_theme_file_uri('/images/real/logos/scml2.png'); ?>" alt="ir para site Santa Casa" class="logo-nav" aria-hidden="false">
          </a>
        </div>
        <div class="footer-info">
          <a href="<?= site_url(); ?>" aria-label="Fundo Rainha D. Leonor home page">
            <img src="<?php echo get_theme_file_uri('/images/real/logos/ump2.png'); ?>" alt="ir para site União das Misericórdias" class="logo-nav" aria-hidden="false">
          </a>
        </div>
      </div>

      <div class="footer-info-telephone footer-layer-2">
        <a class="font-dark" href="tel:+351213401170">213 401 170</a>
        <a class="font-dark" href="fax:+351213401171">/ 171</a>
      </div>
      
      <div class="footer-info-about footer-layer-3">
        <div class="footer-left">
          <div class="footer-info">
            <a class="font-dark" href="mailto:geral@fundorainhadonaleonor.pt">geral@fundorainhadonaleonor.pt</a>
          </div>
        </div>
        <div class="footer-right">
          <nav class="navbar-footer hide-on-mobile">
            <ul class="nav-items flex navbar-footer-items">
              <li class="navbar-footer-item"
                <?php if(is_front_page())?>>
                  <a href="<?= site_url(); ?>">Início</a>
                </li>
              <li class="navbar-footer-item"
                <?php if(is_page('sobre-nos')) ?>>
                  <a href="<?= site_url('/sobre-nos'); ?>">Sobre Nós</a>
                </li>
              <li class="navbar-footer-item"
                <?php if(is_page('candidaturas')) ?>>
                <a href="<?= site_url('/candidaturas'); ?>">Candidaturas</a>
              </li>
              <li class="navbar-footer-item"
                <?php if(get_post_type() == 'obra') ?>>
                <a href="<?= site_url('/obras'); ?>">Obras</a>
              </li>
              <li class="navbar-footer-item"
                <?php if(get_post_type() == 'post') ?>>
                <a href="<?= site_url('/noticias'); ?>">Notícias</a>
              </li>
              <li class="navbar-footer-item" 
                <?php if(is_page('contactos')) ?>>
                <a href="<?= site_url('/info'); ?>">Contactos</a>
              </li>
            </ul>
          </nav> 
        </div>
      </div>
      <hr class="footer-ruler">
      <div class="footer-info-about footer-layer-4">
        <div class="footer-info">
          <a class="font-dark" href="https://scml.pt" target="_blank">
            Santa Casa da Misericórdia de Lisboa, <?php the_time('Y'); ?>
          </a>
        </div>
        <div class="footer-politics">
          <div class="footer-info politics-1">
            <a class="font-dark" href="<?= site_url('/privacy-policy'); ?>">Políticas de Privacidade</a>
          </div>
          <div class="footer-info politics-2">
            <a class="font-dark" href="<?= site_url('/politicas-de-cookies'); ?>">Políticas de Cookies</a>
          </div>
        </div>
      </div>

    </div>
  </footer>
</body>
</html>
