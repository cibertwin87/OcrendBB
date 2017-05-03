<?php
if (!empty($_POST['user']) and !empty($_POST['pass'])) {

  $db = new Conexion();
  #Tomamos las variables Nomnre de usuario y contrasena que el usuario inserto en el login
  # para solicitar la connecion
  // Filtrando el usuario para guardarlo en la BD (Seguridad)
  $user_data = $db->real_escape_string($_POST['user']);
  // usando una funcion para encryptar el pass para guardarlo en la BD
  $pass = Encrypt($_POST['pass']);
  // creando la coneccion (La coneccion a la BD ya esta echa en la linea 3)
  // ahora estamos dentro de la BD pero estamos haciendolo con este usuario y su contrasena
  $sql = $db->query("SELECT id FROM users WHERE (user ='$user_data' OR email = '$user_data') AND pass = '$pass' LIMIT 1;");
  if ($db->rows($sql) > 0) {
    // Preguntamos si el usuario eligio "RECORDARME" en el formulario
    if ($_POST['sesion']) {
      // de ser asi vamos a recordarla durante un dia
      ini_set('session.cookie_lifetime', time() + (60*60*24));
    }
    # si no lo selecciono creamos de todas formas su variable de sessision pero no se va a guardar o almacenar
   $_SESSION['app_id'] = $db->recorrer($sql)[0];
   # esto $db->recorrer($sql)[0] es lo miso que decir
   # $a = $db->recorrer($sql)
   # y despues $a[0]
   # pq es un arreglo que contiene los datos de un solo usuario
   # y me coloco siempre en el primer indice del arreglo pq el Id es el primer dato (como se ve el la tabla SQL)

  }else {
    echo  '<div class="alert alert-dismissible alert-danger">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Error!</strong> Las credenciales no son correctas.
          </div>';
  }
  $db->liberar($sql);
  $db->close();
} else {
   echo  '<div class="alert alert-dismissible alert-danger">
         <button type="button" class="close" data-dismiss="alert">&times;</button>
         <strong>Error!</strong> Los datos no pueden estar vacios.
         </div>';
}


 ?>
