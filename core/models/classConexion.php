<?php
class Conexion extends mysqli{

  public function __construct(){
    parent::__construct(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    // si hay algun error en la conexion a la BD
    $this->connect_errno ? die('Error en la conexion a la base de datos') : null;
    // para evitar generar una query cada vez que se instancie la connecion
    $this->set_charset('utf8');
  }

 public function rows($query){
   return mysqli_num_rows($query);
 }
 public function liberar($query){
   return mysqli_free_result($query);
 }

// recupera una fila de una tabla de resultados SQL como un array un arreglo de datos
 public function recorrer($query){
   return mysqli_fetch_array($query);
 }

}
 ?>
