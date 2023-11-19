<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$menu = wp_get_nav_menu_items( 'Header' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset') ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
  <header id="header">
    <!-- skipping link -->
    <a href="#main-content" class="skipping-link">
      <svg width="50" height="50" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg">
        <path d="M14.5 13v10" stroke="#FFF" stroke-width="2" class="mouse_svg__scroll mouse" id="wheel"></path>
        <path d="M14.5 1C7.041 1 1 6.34 1 12.932v20.136c0 .507.034 1 .11 1.491C1.937 40.443 7.615 45 14.5 45c6.885 0 12.563-4.557 13.399-10.44.067-.493.101-.985.101-1.492V12.932C28 6.34 21.959 1 14.5 1" stroke="#FFF" stroke-width="2" fill="none" fill-rule="evenodd" stroke-linecap="round" class="mouse">
        </path>
      </svg>
      <span class="screen-reader-only">Go to main content</span>
    </a>
    <!-- /skipping link -->
    <!-- Navbar -->
    <div class="navbar blueNavbar" id="navbar">
      <!-- mobile -->
      <a href="#" class="burger-menu hide-on-desktop">
        <span class="bar" aria-hidden="true"></span>
        <span class="bar" aria-hidden="true"></span>
        <span class="bar" aria-hidden="true"></span>
        <span class="sr-only">Menu</span>
      </a>
      <!-- mobile -->
    <div class="container flex">
      <div class="navbar--logo">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
          <img src="<?php echo get_template_directory_uri(); ?>/images/real/logos/logo_white.svg" alt="<?php bloginfo('name'); ?>" class="logo">
        </a>
        <!-- <?php echo get_custom_logo(); ?> -->
      </div> 
      <nav class="navbar-desktop">
        <ul class="nav-items">
          <li <?php if(is_front_page()) echo 'class="nav-item active"'?>>
            <a href="<?= site_url(); ?>">Início</a>
          </li>
          <li <?php if(is_page('sobre-nos')) echo 'class="nav-item active"'?>>
            <a href="<?= site_url('/sobre-nos'); ?>">Sobre Nós</a>
          </li>
          <li <?php if(is_page('candidaturas')) echo 'class="nav-item active"'?>>
            <a href="<?= site_url('/candidaturas'); ?>">Candidaturas</a>
          </li>
          <li <?php if(get_post_type() == 'obra') echo 'class="nav-item active"'?>>
            <a href="<?= site_url('/obras'); ?>">Obras</a>
          </li>
          <li <?php if(get_post_type() == 'post') echo 'class="nav-item active"'?>>
            <a href="<?= site_url('/noticias'); ?>">Notícias</a>
          </li>
          <li <?php if(is_page('info')) echo 'class="nav-item active"'?>>
            <a href="<?= site_url('/info'); ?>">Contactos</a>
          </li>
          <li class="nav-item">
            <a href="<?= esc_url(site_url('/search')); ?>">
              <i class="fas fa-search">
                <span class="screen-reader-only">Search</span>
              </i>
            </a>
          </li>
        </ul>
      </nav>
    </div><!-- /class="container flex" -->
</div>
</header>
