<?php

include "../class/database.php";
include "../class/categorias.php";
include "../class/productos.php";

$database = new Database('mysql', '127.0.0.1', 'custom_user', 1234, 'db_miproyecto');
$conn = $database->getConn();




?>