<?php
$categories = json_decode($_GET['categories'], true);
include "./views/lista_categorias.html";
?>
