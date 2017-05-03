<?php

// Medida de seguridad para que entren a esta pagina solo si se echo un evio o peticion POST
// no ingresando manualmente ajax.php en la URL ni nada de eso
if ($_POST) {
// para incluir todo, las constantes y la clase que se encangan de la conexion y todo lo demas
  require('core/core.php');
  // verificando la variable "mode" que le paso a esta pagina atravez de GET cuando envio los datos por CURLFile
  // esto esta en el archivo login.js en connect.open('POST', 'ajax.php?mode=login', true);
  // aqui le estoy preguntando si existe la variable "mode"? si es asi pues toma su valor sino null
  switch (isset($_GET['mode']) ? $_GET['mode'] : null ) {
    case 'login':
    // como vemos este proceso es un encapsulado. Primero pasan por JavaScript(login.php), despues por Ajax (aqui)
    // y despues a goLogin
      require('core/bin/ajax/goLogin.php');
      break;

      case 'reg':
        require('core/bin/ajax/goReg.php');
        break;

    default:
      header('location: index.php');
      break;
  }
} else {
  // digo que si no estas entrando por una peticion POST voy a poner
  // en el header index.php y te va a redireccionar alli
  header('location: index.php');
}


 ?>
