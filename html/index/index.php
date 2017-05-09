
<?php include(HTML_DIR.'overall/header.php'); ?>
<body>
<section class="engine"><a rel="nofollow" href="#">Ocrend Software</a></section>
<?php include(HTML_DIR.'overall/topnav.php'); ?>

<section class="mbr-section mbr-after-navbar">
  <div class="mbr-section__container container mbr-section__container--isolated">

    <?php if (isset($_GET['success'])) {
      echo '
      <section class="mbr-section mbr-after-navbar" id="content1-10">
      <div class="mbr-section__container container mbr-section__container--isolated">
      <div class="alert alert-dismissible alert-success">
      <strong>Activado!</strong> Su usuario ha sido activado correctamente
      </div>
      </div>
      </section>';
    }
    ?>

    <?php if (isset($_GET['error'])) {
      echo '
      <section class="mbr-section mbr-after-navbar" id="content1-10">
      <div class="mbr-section__container container mbr-section__container--isolated">
      <div class="alert alert-dismissible alert-danger">
      <strong>Error!</strong>No se ha podido activar su usuario. No coinciden el id o la variable de session
      </div>
      </div>
      </section>';
    }
    ?>

    <div class="row container">
      <ol class="breadcrumb">
        <li><a href="?view=index"><i class="fa fa-home"></i> Inicio</a></li>
      </ol>
    </div>
    <?php
    for($i = 1; $i <= 3; $i++) {
      ?>
      <div class="row categorias_con_foros">
        <div class="col-sm-12">
          <div class="row titulo_categoria">Esto es la categoría</div>

          <?php
          for($x = 1; $x <= 5; $x++) {
            ?>
            <div class="row foros">
              <div class="col-md-1" style="height:50px;line-height: 37px;">
                <img src="views/app/images/foros/foro_leido.png" />
              </div>

              <div class="col-md-7 puntitos" style="padding-left: 0px;">
                <a href="#">Esto es el titulo de un foro</a><br />
                Descripción corta sobre este foro
              </div>

              <div class="col-md-2 left_border" style="text-align: center;font-weight: bold;">
                407 Temas<br />
                1084 Mensajes
              </div>
              <div class="col-md-2 left_border puntitos" style="line-height: 37px;">
                <a href="#">Ultimo mensaje acá texto largo</a>
              </div>


            </div>
            <?php
          }
          ?>
        </div>
      </div>

      <?php
    }
    ?>

  </div>
</section>

<?php include(HTML_DIR.'overall/footer.php');?>
</body>
</html>
