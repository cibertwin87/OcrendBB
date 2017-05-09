
<?php include(HTML_DIR.'overall/header.php'); ?>
<body>
<section class="engine"><a rel="nofollow" href="#">Ocrend Software</a></section>
<?php include(HTML_DIR.'overall/topnav.php'); ?>

<section class="mbr-section mbr-after-navbar">
  <div class="mbr-section__container container mbr-section__container--isolated">

      <div class="alert alert-dismissible alert-success">
      <strong>Contrasena cambiada</strong> Se te ha generado una nueva contrasena <strong><?php echo $contrasena; ?></strong>
      , prueba <a class="mbr-buttons__link btn text-white" data-toggle="modal" data-target="#Login">iniciar seccion</a>
      </div>
 </div>

</section>

<?php include(HTML_DIR.'overall/footer.php');?>
</body>
</html>
