<?php
session_start();

if(isset($_SESSION['categories'])) {
  $data = json_decode($_SESSION['categories'], true);
  // session_unset();
}
include "./views/productos.html";

?>