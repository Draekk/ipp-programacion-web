<?php
session_start();

if(isset($_SESSION['json'])) {
  $categories = json_decode($_SESSION['json'], true);
  // session_unset();
}
include "./views/lista_categorias.html";
?>
