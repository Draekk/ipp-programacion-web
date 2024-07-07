<?php
    include "../class/database.php";
    include "../class/categorias.php";
    include "../class/productos.php";
class Autoload {
    public $database;
    public $category;
    public function __construct() {
        $this->database = new Database('mysql', '127.0.0.1', 'custom_user', 1234, 'db_miproyecto');
        $this->category = new Categoria();
    }


}




?>