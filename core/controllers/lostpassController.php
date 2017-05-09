<?php
# verificamos q no exita la variable de session (como va a estar registrado si perdio su contrasena no?)
# y que exista la variable key ($link = APP_URL . '?view=lostpass&key=' . $keypass;) que genere en el
# paso aterior antes de llegar aqui goLostpass.php pq para llegar a este controlador debiste pasar por ese fichero.php
# que genera y envia el correo con el enlace para llegar aqui

if (!isset($_SESSION['app_id']) and isset($_GET['key']) ) {
  $db = new Conexion();
  $keypass = $db->real_escape_string($_GET['key']);
  $sql = $db->query("SELECT id,new_pass FROM users WHERE keypass = '$keypass' LIMIT 1;");
  if ($db->rows($sql) > 0) {
     $data = $db->recorrer($sql);
     $id_user = $data[0];
     $new_pass = Encrypt($data[1]);
     # una variable que contenga la contrasena sin encriptar para mostrarsela al usuario
     $contrasena = $data[1];
     $db->query("UPDATE users SET keypass = '',new_pass='',pass ='$new_pass' WHERE id='$id_user';");
     include('html/lostpass_mensaje.php');
  } else {
    header('location: ?view=index');
  }

  $db->liberar($sql);
  $db->close();

} else {
  header('location: ?view=index');
}



  ?>
