<?php

function LostpassTemplate($user_name,$link) {
  $HTML = '
  <html>
  <body style="background: #FFFFFF;font-family: Verdana; font-size: 14px;color:#1c1b1b;">
  <div style="">
      <h2>Hola '.$user_name.'</h2>
      <p style="font-size:17px;">Solicitud de cambio de contrasena '. PAGE_TITTLE .'.</p>
  	<p>El dia '.date('d/m/Y', time()).'Se genero una solicitud de cambio de contrasena<br /> Si no lo has solicitado has caso omiso. Pero de ser autentica vuestra solicitud haced click en el enlace de abajo.</p>
  	<p style="padding:15px;background-color:#ECF8FF;">
  			Para modificar tu contrasena por favor has click aqui <a style="font-weight:bold;color: #2BA6CB;" href="'.$link.'" target="_blank">clic aquí &raquo;</a>
  	</p>
      <p style="font-size: 9px;">&copy; '. date('Y',time()) .' '.PAGE_TITTLE.'. Todos los derechos reservados.</p>
  </div>
  </body>
  </html>
  ';
      return $HTML;
}
 ?>
