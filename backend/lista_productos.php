<?php

session_start();

if(isset($_SESSION['products'])) {
  $products = $_SESSION['products'];
}

include "./views/lista_productos.html";
?>