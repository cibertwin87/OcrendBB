<?php

$db = new Conexion();
// Tomando precauciones de seguridad para insertar los datos en la BD (filtrar los string y encriptar el pass)
$user_name = $db->real_escape_string($_POST['user']);
$user_email = $db->real_escape_string($_POST['email']);
$user_pass = Encrypt($_POST['pass']);

// vamos a verificar si ya existe algun usuario en la BD con el mismo nombre o email_reg
$sql = $db->query("SELECT user FROM users WHERE user = '$user_name' OR  email= '$user_email' LIMIT 1;");

if ($db->rows($sql) == 0) {
  // nueva variable, que va a ser unica para cada usuario ya que es el tiempo que le toma al usuario registrarse
  // y ese tiempo va a estar encriptado.
  //  Esto es para que un usuario pueda activar su cuenta a travez de su correo electronico
  $keyreg = md5(time());
  // una direccion para activar la cuenta
  $link = APP_URL . '?view=activar&key=' . $keyreg;

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
$mail->addAddress($user_email, $user_name);     // a quien se le envia

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Activacion de su cuenta Ocren';
$mail->Body    = EmailTemplate($user_name,$link);
$mail->AltBody = 'Hola' . $user_name . 'para activar su cuenta acceda al siguiente enlace:' . $link;

if(!$mail->send()) {
    $HTML =   '<div class="alert alert-dismissible alert-danger">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Error!</strong> Message could not be sent '.$mail->ErrorInfo.';
          </div>';
} else {
    // entramos aqui si no hubo errores al enviar el correo de confirmacion al usuario
    //  asi que pasamos a hacer insertarlo en la BD
    // Todo esta bien, no se encontraron coincidencias, efectua la insercion en la BD
    $db->query("INSERT INTO users (user, pass, email, keyreg) VALUES ('$user_name','$user_pass','$user_email', '$keyreg');");
    // ahora voy a hacer otra consulta para tomar el id del ultimo usuario que se a registrado
    // por defecto va a ser el Id mas alto pq a medida que se van insertando el id va aumentando
    $sql_2 = $db->query("SELECT MAX(id) AS id FROM users;");
    $_SESSION['app_id'] = $db->recorrer($sql_2)[0];
    $db->liberar($sql_2);
    $HTML = 1;
}



}else {
  // la funcion recorrer me devuelve un arreglo o sea lo que me devuelve la consulta a la BD
  // esta funcion lo mete en un arreglo pero como lo limite a una solo respuesta pq es suficiente con uno que coincida
  // y le dije que solo selecionara el nombre (user) digo que me voy a parar en ese primer elemento del arreglo
  //, en el nombre
  $coincidencia = $db->recorrer($sql)[0];
  // los comparo en minusculas para saber si el nombre o el email el que coinciden
  //para darle una resp al usuario + especifica

  if (strtolower($coincidencia) == strtolower($user_name)) {
    $HTML =   '<div class="alert alert-dismissible alert-danger">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Error!</strong> Ya existe otro usuario con el mismo nombre.
          </div>';
  }else {
    $HTML =   '<div class="alert alert-dismissible alert-danger">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Error!</strong> Ya existe otro usuario con el mismo email.
          </div>';
  }

}
$db->liberar($sql);
$db->close();

echo $HTML;
?>
