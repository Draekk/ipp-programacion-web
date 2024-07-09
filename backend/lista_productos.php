<?php

session_start();

if(isset($_SESSION['products'])) {
  $products = json_decode($_SESSION['products'], true);
}
include "./views/lista_productos.html";
?>