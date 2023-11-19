<?php /* Template Name: CustomPageInfo */ ?>
<?php
get_header();
?>

<section class="candidaturas features-head bg-light py-3 init">
    <div class="container">
      <div>
        <div class="page_header">
          <h1>Contactos</h1>
          <div class="page_header--intro">
            <p class="page_header--intro-p">
              Rua do Carmo, 15 - 2º Esq <br>
              1200-093 Lisboa <br>
              <a class="font-dark" href="tel:+351213401170">T: 213 401 170</a><br>
              <!-- <a class="font-dark" href="fax:+351213401171">F:213 401 171</a> -->
              <a class="font-dark" href="mailto:geral@fundorainhadonaleonor.pt">geral@fundorainhadonaleonor.pt</a>
            </p>
          </div>
        </div>
      </div>
    </div>
    <br id="target" />
  </section>

  <section class="map">
    <div class="mapouter container">
      <div class="gmap_canvas">
        <iframe
          title="map"
          width="100" 
          height="300" 
          id="gmap_canvas" 
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d778.3218149004256!2d-9.140279872453334!3d38.71121332607782!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd193478d19ca847%3A0x37634d50c8dcf651!2sR.%20do%20Carmo%2015%2C%201200-092%20Lisboa!5e0!3m2!1sen!2spt!4v1639059276900!5m2!1sen!2spt"
          >
        </iframe>
      </div>
    </div>
  </section>

<?php 
  while( have_posts() ) {
    the_post(); 
?>
  <?php
    }
  ?>

<?php get_footer(); ?>