<?php
unset($_SESSION['app_id']);
// cuando pongo ?view=algo significa que estoy en algun controlador y no en la primera pagina
// para direccionar a home me comunico con el contrlolador indexController y este me envia al index.php
// O sea esto es comunicacion estre controladores
header('location: ?view=index');
 ?>
