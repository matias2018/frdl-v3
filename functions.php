<?php
function ndd_files()
{
  wp_enqueue_style('montserrat-fonts', '//fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap');
  wp_enqueue_style('titillium-fonts', '//fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,700;1,200;1,300;1,400&display=swap');
  wp_enqueue_style('font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');
  wp_enqueue_style('ndd_utilities_styles', get_theme_file_uri('/css/utilities.css'));
  wp_enqueue_style('ndd_main_styles', get_theme_file_uri('/css/style.css'));
  wp_enqueue_style('ndd_nav_styles', get_theme_file_uri('/css/nav.css'));
  wp_enqueue_style('ndd_obra_styles', get_theme_file_uri('/css/obras.css'));
  wp_enqueue_style('ndd_news_styles', get_theme_file_uri('/css/newsArchive.css'));
  wp_enqueue_style('frdl_ba_main', get_theme_file_uri('/css/frdl_ba_main.css'));
  wp_enqueue_style('font-awesome', get_theme_file_uri('//use.fontawesome.com/releases/v5.0.1/css/all.css'));

  wp_enqueue_script('jquery', get_theme_file_uri('/src/modules/jquery.min.js'), NULL, '3.6.0', true);
  wp_enqueue_script('ndd_navbar_scroll', get_theme_file_uri('/src/modules/navbarScroll.js'), NULL, '1.0', true);
  wp_enqueue_script('ndd_navbar', get_theme_file_uri('/src/modules/nav.js'), NULL, '1.0', true);
  wp_enqueue_script('ndd_accordion', get_theme_file_uri('/src/modules/accordion.js'), NULL, '1.0', true);
  wp_enqueue_script('ndd_counter', get_theme_file_uri('/src/modules/counter.js'), NULL, '1.0', true);
  wp_enqueue_script('ndd_filter', get_theme_file_uri('/src/modules/filter.js'), NULL, '1.0', true);
  // wp_enqueue_script('beaf_tweaker', get_theme_file_uri('/src/modules/beafTweak.js'), NULL, '1.0', true);
  // wp_enqueue_script('frdl_ba_main', get_theme_file_uri('/src/modules/frdl_ba_main.js'), NULL, '1.0', true);
  /* wp_enqueue_script( 'ndd_createElement', get_theme_file_uri('/src/modules/createElement.js'), NULL, '1.0', true ); */
  /* wp_enqueue_script( 'ndd_index', get_theme_file_uri('/src/index.js'), NULL, '1.0', true ); */
}

add_action('wp_enqueue_scripts', 'ndd_files');


function load_scripts()
{
  global $post;

  if (is_page('home') || is_single('home')) {
    wp_enqueue_script('frdl_ba_main', get_theme_file_uri('/src/modules/frdl_ba_main.js'), NULL, '1.0', true);
    wp_enqueue_script('ndd_counter', get_theme_file_uri('/js/counter.js'), NULL, '1.0', true);
  }
}
add_action('wp_enqueue_scripts', 'load_scripts');


function ndd_features()
{
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('custom-logo');
}
add_action('after_setup_theme', 'ndd_features');


$args = array(
  'default-color' => '0000ff',
);
add_theme_support('custom-background', $args);

/* Add custom logo */
function config_custom_logo()
{
  $defaults = array(
    'height' => 70,
    'width' => 70,
    'flex-height' => true,
    'flex-width' => true,
    'header-text' => array(),
    'unlink-homepage-logo' => false,
  );
  /*   var_dump($defaults); */
  add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'config_custom_logo');


/** Add Custom Body Class */
function my_class_names($classes)
{
  // add 'class-name' to the $classes array
  $classes[] = 'ndd-class';
  // return the $classes array
  return $classes;
}
add_filter('body_class', 'my_class_names');
/** End of Add Custom Body Class */

/* Dynamic feeding to ACF */
/* if (function_exists('acf_add_options_page')) {
  acf_add_options_page();
} */
/* endof Dynamic feeding to ACF */
/* Styling ACF Admin Area */
function my_acf_admin_head()
{
?>
  <style type="text/css">
    .acf-flexible-content .layout .acf-fc-layout-handle {
      /*background-color: #00B8E4;*/
      background-color: #202428;
      color: #eee;
    }

    .acf-repeater.-row>table>tbody>tr>td,
    .acf-repeater.-block>table>tbody>tr>td {
      border-top: 2px solid #202428;
    }

    .acf-repeater .acf-row-handle {
      vertical-align: top !important;
      padding-top: 16px;
    }

    .acf-repeater .acf-row-handle span {
      font-size: 20px;
      font-weight: bold;
      color: #202428;
    }

    .imageUpload img {
      width: 75px;
    }

    .acf-switch.-on {
      outline: 1px solid red;
      width: 500px;
      display: flex;
      flex-direction: row;
      justify-content: space-between;
    }
  </style>
<?php
}
/* ENf of Styling ACF Admin Area */

/**
 * Get taxonomies terms links.
 *
 * @see get_object_taxonomies()
 */
function wpdocs_custom_taxonomies_terms_links()
{
  // Get post by post ID.
  if (!$post = get_post()) {
    return '';
  }

  // Get post type by post.
  $post_type = $post->post_type;

  // Get post type taxonomies.
  $taxonomies = get_object_taxonomies($post_type, 'objects');

  $out = array();

  foreach ($taxonomies as $taxonomy_slug => $taxonomy) {
    // Get the terms related to post.
    $terms = get_the_terms($post->ID, $taxonomy_slug);

    if (!empty($terms)) {
      $exclude = ['destaque'];
      foreach ($terms as $term) {
        if(!in_array($term->term_id, $exclude)){
          $out[] = sprintf(
            '%2$s',
            esc_url(get_term_link($term->slug, $taxonomy_slug)),
            esc_html($term->name)
          );
        }
        
      }
    }
  }
  return implode('', $out);
}

/* Adding ACF to search results */
/**
 * Join posts and postmeta tables
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_join
 */
function cf_search_join($join)
{
  global $wpdb;
  if (is_search()) {
    $join .= " LEFT JOIN {$wpdb->postmeta} ON {$wpdb->posts}.ID = {$wpdb->postmeta}.post_id ";
  }
  return $join;
}
add_filter('posts_join', 'cf_search_join');

/**
 * Modify the search query with posts_where
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_where
 */
function cf_search_where($where)
{
  global $pagenow, $wpdb;

  if (is_search()) {
    $where = preg_replace(
      "/\(\s*" . $wpdb->posts . ".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
      "(" . $wpdb->posts . ".post_title LIKE $1) OR (" . $wpdb->postmeta . ".meta_value LIKE $1)",
      $where
    );
  }

  return $where;
}
add_filter('posts_where', 'cf_search_where');

/**
 * Prevent duplicates
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_distinct
 */
function cf_search_distinct($where)
{
  global $wpdb;

  if (is_search()) {
    return "DISTINCT";
  }

  return $where;
}
add_filter('posts_distinct', 'cf_search_distinct');
/*End of Adding ACF to search results */

/** Highlight Search results */
function search_excerpt_highlight()
{
  $excerpt = get_the_excerpt();
  $keys = implode('|', explode(' ', get_search_query()));
  $excerpt = preg_replace('/(' . $keys . ')/iu', '<strong class="search-highlight">\0</strong>', $excerpt);

  echo '<p>' . $excerpt . '</p>';
}

function search_title_highlight()
{
  $title = get_the_title();
  $keys = implode('|', explode(' ', get_search_query()));
  $title = preg_replace('/(' . $keys . ')/iu', '<strong class="search-highlight">\0</strong>', $title);

  echo $title;
}
/** Highlight Search results */

/** Add custom login Page*/
/** Add custom logo*/
function ndd_login_logo()
{
?>
  <style type="text/css">
    body {
      background: #000000;
      min-width: 100vw;
    }

    body.login {
      background: #313543 !important;
      min-width: 100vw;
    }

    body.login div#login form#loginform label {
      color: #ffffff;
      font-family: 'Montserrat', sans-serif;
    }

    body.login div#login form#loginform {
      background: #313543 !important;
      border: none;
      padding: 20px;
    }

    body.login div#login form#loginform #user_login {
      font-family: 'Montserrat', sans-serif;
    }

    body.login div#login p#nav a,
    body.login div#login p#backtoblog a {
      color: #ffffff;
      font-family: 'Montserrat', sans-serif;
    }

    #login h1 a,
    .login h1 a {
      background-image: url('https://frdlbe.on-pages.com/wp-content/themes/nddbase/images/ndd-logo.png');
      height: 200px;
      width: 320px;
      background-size: 320px 320px;
      background-repeat: no-repeat;
      padding-bottom: 10px;
    }
  </style>
<?php
}

/* add_action('login_enqueue_scripts', 'ndd_login_logo'); */
/** End Add custom logo*/

/** Add custom logo inside admin Page*/
function wpb_custom_logo()
{
  echo '
    <style type="text/css">
    #wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
    background-image: url(' . get_bloginfo('stylesheet_directory') . '/images/ndd_d_logo.svg) !important;
    background-position: 0 0;
    background-size: cover;
    background-repeat: no-repeat;
    color:rgba(0, 0, 0, 0);
    }
    #wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
    background-position: 0 0;
    }
    </style>
    ';
}

//hook into the administrative header output
add_action('wp_before_admin_bar_render', 'wpb_custom_logo');
/** End Add custom logo inside admin Page*/

/** Add custom footer admin Page*/
function remove_footer_admin()
{

  echo 'Fueled by <a href="http://www.wordpress.org" target="_blank">WordPress</a> | Created by NDD SCML: <a href="https://www.scml.pt" target="_blank">SCML</a></p>';
}

add_filter('admin_footer_text', 'remove_footer_admin');
/** End Add custom footer admin Page*/
/** Add custom help contacts admin Page*/
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

function my_custom_dashboard_widgets()
{
  global $wp_meta_boxes;

  wp_add_dashboard_widget('custom_help_widget', 'Theme Support', 'custom_dashboard_help');
}

function custom_dashboard_help()
{
  echo '<p>Bem vindo ao tema base do <strong>Núcleo de Desenvolvimento Digital</strong> da <b>Santa Casa da Misericórdia de Lisboa</b>! <br>Precisa de ajuda? Contacte os nossos developers por <a href="mailto:pedro.n.matias@scml.pt">e-mail</a>. <br>Para ajuda urgente contacte: <a href="tel:213263033">213 263 033 | Ext: 11033</a></p>';
  echo '<style type="text/css">#custom_help_widget{background:#005391; color: #fff;} #custom_help_widget h2, #custom_help_widget a, #custom_help_widget button {background:#005391; color: #fff;}</style>';
}
/** End Add custom help contacts Page*/

/** REMOVE EVENTS AND WORDPRESS STUFF */
add_action('custom_dashboard_help', 'custom_dashboard_help');

function custom_help_widget()
{
  remove_meta_box('dashboard_primary', 'dashboard', 'side');
  remove_meta_box('dashboard_secondary', 'dashboard', 'side');
}
/** End REMOVE EVENTS AND WORDPRESS STUFF */

/** Alarm to warn user about potential problems */
// Add a warning box to the settings page
// Uses the same style box as the WordPress Update "update-nag"
function my_admin_notice()
{
  global $current_screen;
  if ($current_screen->parent_base == 'options-general') {
    echo '<div id="admin-settings-warning-box" style="background: #ff0000; color: #fff; padding: 10px 0;"><strong>WARNING</strong> – <span style="font-family: sans-sefif; font-size: 20px;">&#9760</span>- changing settings on these pages may cause problems with your website!</div>';
  }
}
add_action('admin_notices', 'my_admin_notice');
/** Alarm to warn user about potential problems */
?>

<?php

function ndd_cookies()
{
  // Time of user's visit
  //$visit_time = date('F j, Y g:i a');
  setlocale(LC_ALL, 'en_US.utf8');
  $visit_time = date_i18n("d F Y (H:i)", strtotime("now"));
  // Time of user's visit

  // Check if cookie is already set
  if (isset($_COOKIE['ndd_visit_time'])) {
    // Do this if cookie is set 
    function visitor_greeting()
    {
      // Use information stored in the cookie 
      $lastvisit = $_COOKIE['ndd_visit_time'];
      $string = "";
      $string .= 'A sua última visita a este website foi em ' . $lastvisit . '. Saiba tudo em: <a href="https://www.scml.pt">https://www.scml.pt</a>';
      // Delete the old cookie so that we can set it again with updated time
      unset($_COOKIE['ndd_visit_time']);
      return $string;
    }
  } else {
    // Do this if the cookie doesn't exist
    function visitor_greeting()
    {
      $string = "";
      $string .= 'New here? Check out these resources...';
      return $string;
    }
    // Set the cookie
    setcookie('ndd_visit_time',  $visit_time, time() + 31556926);
  }
  // Add a shortcode 
  add_shortcode('greet_me', 'visitor_greeting');
}

add_action('init', 'ndd_cookies');
?>

<?php
// XML-RPC is a method that allows third party apps to communicate with your WordPress site remotely. This could cause security issues and can be exploited by hackers.
/* add_filter('xmlrpc_enabled', '__return_false'); */
flush_rewrite_rules(false);
?>