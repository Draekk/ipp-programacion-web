<?php /* @autor Gever Rodríguez */


require_once __DIR__ . "/database.php";
require_once __DIR__ . "/categorias.php";
require_once __DIR__ . "/productos.php" ;

class Autoload {
  private $database;

  //Constructor
  public function __construct() {
    $this->database = new Database('mysql', '127.0.0.1', 'custom_user', 1234, 'db_miproyecto');
  }

  /**
   * Devuelve la instancia de la base de datos.
   *
   * Este método permite obtener la instancia de la base de datos que se ha configurado en el constructor de la clase Autoload.
   *
   * @return Database La instancia de la base de datos.
   */
  public function getDatabase() {
    return $this->database;
  }

  /**
   * Crea una nueva instancia de la clase Categoria.
   *
   * Este método permite crear una nueva instancia de la clase Categoria, lo que permite interactuar con los datos de categorías almacenados en la base de datos.
   *
   * @return Categoria Una nueva instancia de la clase Categoria.
   */
  public function createCategory() {
    return new Categoria();
  }

  /**
   * Crea una nueva instancia de la clase Producto.
   *
   * Este método permite crear una nueva instancia de la clase Producto, lo que permite interactuar con los datos de productos almacenados en la base de datos.
   *
   * @return Producto Una nueva instancia de la clase Producto.
   */
  public function createProduct() {
    return new Producto();
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