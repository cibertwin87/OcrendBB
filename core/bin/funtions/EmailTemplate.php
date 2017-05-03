<?php

function EmailTemplate($user_name,$link) {
  $HTML = '
  <html>
  <body style="background: #FFFFFF;font-family: Verdana; font-size: 14px;color:#1c1b1b;">
  <div style="">
      <h2>Hola '.$user_name.'</h2>
      <p style="font-size:17px;">Gracias por registrarte en '. PAGE_TITTLE .'.</p>
  	<p>Solo queda un paso más, activar tu cuenta para disfrutar de todos los beneficios de un usuario registrado.</p>
  	<p style="padding:15px;background-color:#ECF8FF;">
  			Para activar tu cuenta por favor has <a style="font-weight:bold;color: #2BA6CB;" href="'.$link.'" target="_blank">clic aquí &raquo;</a>
  	</p>
      <p style="font-size: 9px;">&copy; '. date('Y',time()) .' '.PAGE_TITTLE.'. Todos los derechos reservados.</p>
  </div>
  </body>
  </html>
  ';
      return $HTML;
}
 ?>
