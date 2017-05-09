<?php

$db = new Conexion();
$email = $db->real_escape_string($_POST['email']);
$sql = $db->query("SELECT id, user FROM users WHERE email= '$email' LIMIT 1;");
if ($db->rows($sql) > 0) {
  $data = $db->recorrer($sql);
  $id = $data[0];
  $user_name = $data[1];
  $keypass = md5(time());
  # generando una nueva contrasena  en mayusculas y de 8 caracteres
  $new_pass = strtoupper(substr(sha1(time()),0,8));
  # Link que le va a llegar al correo del usuario
  $link = APP_URL . '?view=lostpass&key=' . $keypass;

  // codigo PHPMailer para enviar la confirmacion por correo electronico
  $mail = new PHPMailer;
  $mail->CharSet = 'utf-8';
  // $mail->Encoding = 'quoted_printable';
  $mail->isSMTP();                                      // Set mailer to use SMTP
  $mail->Host = PHPMAILER_HOST;  // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                               // Enable SMTP authentication
  $mail->Username = PHPMAILER_USER;                 // SMTP username
  $mail->Password = PHPMAILER_PASS;                           // SMTP password
  $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
  $mail->Port = PHPMAILER_PORT;                                    // TCP port to connect to

  $mail->setFrom(PHPMAILER_USER, PAGE_TITTLE);      #Quien manda el correo
  $mail->addAddress($email, $user_name);     // a quien se le envia

  $mail->isHTML(true);                                  // Set email format to HTML

  $mail->Subject = 'Solicitud de cambio de Contrasena';
  $mail->Body    = LostpassTemplate($user_name,$link);  # Funcion que me genera el cuerpo del correo con el nombre del usuario y el link hacia el controlador
  $mail->AltBody = 'Hola' . $user_name . 'recuperar tu contrasena debes ir a este enlace:' . $link;

  if(!$mail->send()) {
      $HTML =   '<div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Error!</strong> Message could not be sent '.$mail->ErrorInfo.';
            </div>';}else {
              $db->query("UPDATE users SET keypass = '$keypass', new_pass = '$new_pass' WHERE id = '$id';");
              $HTML = 1;
            }

} else {
  $HTML = '<div class="alert alert-dismissible alert-danger">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <h4>ERROR!</h4>El email solicitado no existe en el sistema</div>';
}


$db->liberar($sql);
$db->close();

echo $HTML;
 ?>
