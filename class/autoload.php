<?php
  include "../class/database.php";
  include "../class/categorias.php";
  include "../class/productos.php";
class Autoload {
  public $database;
  public $category;
  public $product;

  //Constructor
  public function __construct() {
    $this->database = new Database('mysql', '127.0.0.1', 'custom_user', 1234, 'db_miproyecto');
    $this->category = new Categoria();
    $this->product = new Producto();
  }

  /**
 * Crea una sesión con los datos proporcionados y opcionalmente redirecciona a una página específica.
 *
 * @param array $data Los datos que se almacenarán en la sesión.
 * @param string $nameData El nombre de la variable de sesión.
 * @param string|null $redirect La página a la que se redireccionará después de establecer la sesión. Si es null, no se produce ninguna redirección.
 *
 * @return void
 */
public function createSession($data, $nameData, $redirect = null) {
  session_start();
  $_SESSION[$nameData] = json_encode($data);
  if($redirect) {
    header('Location: '. $redirect);
    exit();
  }
}


}




?>