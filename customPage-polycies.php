<?php /* Template Name: CustomPagePolycies */ ?>
<?php
get_header();
?>

<?php 
  while( have_posts() ) {
    the_post(); 
?>
  <?php
    }
  ?>

    <section class="politics pt-50">
      <div class="container">
      <div class="page_header">
          <h1>Políticas de Privacidade</h1>
        </div>
        <div class="accordion container">
          <h3 class="law_title mb-50">
            Desde 25 de maio de 2018 que se aplica o Regulamento Geral sobre a Proteção de Dados (Regulamento (UE) 2016/679 do Parlamento Europeu e do Conselho, de 27 de abril de 2016), que estabeleceu novas regras relativas à proteção, tratamento e livre circulação dos dados pessoais das pessoas singulares.
          </h3>
          <p class="law">
            A Santa Casa da Misericórdia de Lisboa, na medida em que trata dados pessoais no âmbito da atividade que desenvolve nas suas diferentes áreas de atuação, de acordo com a prossecução dos fins estatutários da organização, previstos no Decreto-Lei n.º 235/2008, de 3 de dezembro, garante a proteção daqueles dados, cujo tratamento é efetuado ao abrigo da legislação aplicável e da presente Política de Privacidade.
          </p>
          <h3 class="law_title mt-50 mb-50">
            O COMPROMISSO DA SANTA CASA
          </h3>
          <p class="law">
          Através desta política, a instituição compromete-se, designadamente, a reconhecer a segurança dos dados pessoais que trata e a assegurar a proteção da privacidade dos respetivos titulares como dimensões fundamentais da atividade da organização, cruciais para a concretização plena das diferentes áreas de missão em que atua. <br>
          A Misericórdia de Lisboa presta ainda informação sobre as regras, os princípios e as boas práticas que a organização observa no âmbito do tratamento dos dados pessoais que lhe são confiados, em conformidade com o Regulamento Geral sobre a Proteção de Dados (RGPD) e demais legislação aplicável, e sobre os meios que os titulares dos dados têm ao seu dispor para exercício dos respetivos direitos.
          </p>
          <h3 class="law_title mt-50 mb-50">
            RESPONSÁVEL PELO TRATAMENTO DE DADOS PESSOAIS
          </h3>
          <p class="law">
          No âmbito da atividade que desenvolve nas suas diferentes áreas de atuação, de acordo com os fins estatutários da organização, a Santa Casa da Misericórdia de Lisboa – pessoa coletiva de direito privado e utilidade pública administrativa, com o número único de pessoa coletiva 500 745 471 – é uma entidade responsável pelo tratamento de dados pessoais, podendo ser contactada através dos seguintes canais:
          </p>
        </div>

        <div class="black-box mt-100 pt-50 pb-50">
          <div class="container">
            <h3 class="law_title mt-50 mb-50 font-light">
              RESPONSÁVEL PELO TRATAMENTO DE DADOS PESSOAIS
            </h3>
            <p class="font-light">
              Rua do Carmo, 15 - 2º Esq <br>
              1200-093 Lisboa <br>
              <a class="number-link" href="tel:+1-333-333-4444">T:213 401 170</a><br>
              <a class="number-link" href="tel:+1-333-333-4444">F:213 401 171</a><br>
            </p>
            <div class="cta">
              <a href="mailto:dadospessoais@scml.pt?subject=Site&nbsp;FRDL:&nbsp;Pedido&nbsp;de&nbsp;informação" class="uppercase cta-link">pedir informações</a>
            </div>
          </div>
        </div>

        <div class="accordion container">
          <h3 class="law_title mt-50 mb-50">
            ENCARREGADO DE PROTEÇÃO DE DADOS
          </h3>
          <p class="law">
            Na medida em que algumas das atividades principais da organização pressupõem o tratamento de um grande volume de dados de categorias especiais, a Santa Casa designou um Encarregado de Proteção de Dados, responsável por garantir, entre outros aspetos, a conformidade das atividades de tratamento e proteção de dados pessoais sob a responsabilidade da instituição, de acordo com a legislação aplicável e com a presente política. 
          </p>
          <br>
          <p class="law">
            Assim, os titulares de dados pessoais, caso o pretendam, podem endereçar uma comunicação ao Encarregado da Proteção de Dados, relativamente a assuntos relacionados com o tratamento de dados pessoais, utilizando, para o efeito, os seguintes canais:
          </p>
        </div>


      </div>
    </section>

<script>
  jQuery(document).ready(function($) {
    $(".cta").click(function() {
      window.location = $(this).find("a").attr("href"); 
      return false;
    });
  });
  </script>

<?php get_footer(); ?>