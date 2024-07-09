<?php
session_start();

if(isset($_SESSION['categories'])) {
  $categories = json_decode($_SESSION['categories'], true);
}
include "./views/lista_categorias.html";
?>
