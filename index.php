<?php

require_once __DIR__ . "/class/autoload.php";

$autoload = new Autoload();
$database = $autoload->getDatabase();

try {
  session_start();
  $products = $database->findAll('productos');
} catch (Exception $ex) {
  throw new Exception($ex->getMessage());
}

include "./views/home.html";

?>