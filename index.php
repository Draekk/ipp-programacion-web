<?php
//Acceder a la clase Autoload
require_once __DIR__ . "/class/autoload.php";

$autoload = new Autoload();
$database = $autoload->getDatabase();

try {
  //Obtener la lista de productos desde la base de datos
  session_start();
  $products = $database->findAll('productos');
} catch (Exception $ex) {
  throw new Exception($ex->getMessage());
}

//Mostrar la lista de productos en la vista home.html
include "./views/home.html";

?>