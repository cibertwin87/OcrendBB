<?php

#Para Iniciar las variables de sesion y poderlas utilizar
session_start();

#Constantes de coneccion
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','ocrenddb');

#Constantes de la Aplicacion
define('HTML_DIR', 'html/');
define('PAGE_TITTLE', 'OcrendBB');
define('APP_COPY', 'Copyright &copy'. date('Y' , time()) . ' Ocrend Software.' );
define('APP_URL', 'http://localhost/OcrendBB/');

#Estructura: Composer, clase Conexion
require('vendor/autoload.php');
require('core/models/classConexion.php');
require('core/bin/funtions/Encrypt.php');
require('core/bin/funtions/Users.php');
require('core/bin/funtions/EmailTemplate.php');
require('core/bin/funtions/LostpassTemplate.php');

#Constantes de PHPMailer
define('PHPMAILER_HOST','p3plcpnl0173.prod.phx3.secureserver.net');
define('PHPMAILER_USER','public@ocrend.com');
define('PHPMAILER_PASS','Prinick2016');
define('PHPMAILER_PORT', 465);

#Variables
$usuarios = Users();

 ?>
