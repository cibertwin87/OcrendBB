
<?php include(HTML_DIR.'overall/header.php'); ?>
<body>
<section class="engine"><a rel="nofollow" href="#">Ocrend Software</a></section>
<?php include(HTML_DIR.'overall/topnav.php'); ?>

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

<section class="mbr-section mbr-after-navbar" id="content1-10">
    <div class="mbr-section__container container mbr-section__container--isolated">
        <div class="row">
            <div class="mbr-article mbr-article--wysiwyg col-sm-8 col-sm-offset-2">
            <p>
              Texto de relleno
            </p>
          </div>
        </div>
    </div>
</section>

<section class="mbr-section mbr-after-navbar" id="content1-10">
    <div class="mbr-section__container container mbr-section__container--isolated">
        <div class="row">
            <div class="mbr-article mbr-article--wysiwyg col-sm-8 col-sm-offset-2">
            <p>
              Texto de relleno
            </p>
          </div>
        </div>
    </div>
</section>

<section class="mbr-section mbr-after-navbar" id="content1-10">
    <div class="mbr-section__container container mbr-section__container--isolated">
        <div class="row">
            <div class="mbr-article mbr-article--wysiwyg col-sm-8 col-sm-offset-2">
            <p>
              Texto de relleno
            </p>
          </div>
        </div>
    </div>
</section>
<?php include(HTML_DIR.'overall/footer.php');?>
</body>
</html>
