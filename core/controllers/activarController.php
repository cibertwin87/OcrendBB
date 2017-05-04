<?php

 #Este controlador de encarga de activar la cuenta que el ususario
 # que este confirmo via Email por tanto comenzare preguntando si la variable 'key' existe
 # esta variable se crea en goReg cuando todo esta bien y se le envia el correo al usuario
 # y esta se encuentra en la URL

 if (isset($_GET['key'],$_SESSION['app_id'])) {
   #necesitamos verificar si esa key es la misma de este usuario
   $db = new Conexion();
   $key = $db->real_escape_string($_GET['key']);
   $id = $_SESSION['app_id'];
   $sql = $db->query("SELECT id FROM users WHERE id='$id' AND keyreg='$key' LIMIT 1;");
   if ($db->rows($sql) > 0) {
      $db->query("UPDATE users SET activo='1', keyreg='' WHERE id='$id';");
      header('location: ?view=index&success=true');
   } else {
     header('location: ?view=index&error=true');
   }

   $db->liberar($sql);
   $db->close();
 } else {
  //  si no existe le decimos que tiene que logearse
 include('html/public/logearte.php');
 }

 ?>
