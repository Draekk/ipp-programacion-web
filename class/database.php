<?php /* @autor Gever Rodríguez */

class Database {

  private $conn;

  //Constructor
  public function __construct($driver, $host, $user, $pass, $db) {
    try {
      $this->conn = new PDO("$driver:host=$host;dbname=$db", $user, $pass);
    } catch (PDOException $ex) {
      throw new Exception($ex->getMessage());
    }
  }

  /**
  * Obtiene la conexión PDO a la base de datos.
  *
  * Este método devuelve la conexión PDO que se utiliza para interactuar con la base de datos.
  * La conexión se establece en el constructor de la clase Database durante la creación del objeto.
  *
  * @return PDO La conexión PDO a la base de datos.
  */
  public function getConn() {
    return $this->conn;
  }

  /**
  * Recupera todos los registros de una tabla específica en la base de datos.
  *
  * @param string $table El nombre de la tabla de la cual recuperar los registros.
  *
  * @return array Un array asociativo que contiene todos los registros de la tabla especificada, ordenados por 'identificador' en orden ascendente.
  *
  * @throws Exception Si se produce un error al ejecutar la consulta.
  */
  public function findAll($table) {
    try {
      if($table === 'categorias') {
        $query = $this->conn->query("SELECT * FROM " . $table . " ORDER BY identificador ASC");
      } else {
        $query = $this->conn->query("SELECT productos.identificador, productos.nombre, productos.imagen, productos.descripcion, productos.precio, categorias.nombre as nombre_categoria FROM " . $table . " JOIN categorias ON productos.categoria = categorias.identificador ORDER BY productos.categoria ASC");
      }
      $result = $query->fetchAll(PDO::FETCH_ASSOC);
      return $result;
    } catch (Exception $ex) {
      throw new Exception($ex->getMessage());
    }
  }

  /**
  * Guarda un objeto de datos en la base de datos.
  *
  * Este método acepta un objeto de datos y lo almacena en la base de datos, dependiendo de su tipo.
  * Si el objeto es de tipo 'Categoria', se insertarán los datos en la tabla 'categorias'.
  * Si el objeto es de tipo 'Producto', se insertarán los datos en la tabla 'productos'.
  *
  * @param mixed $data El objeto de datos a guardar en la base de datos.
  *
  * @throws Exception Si se produce un error al ejecutar la consulta de inserción.
  */
  public function save($data) {
    try {
      if($data instanceof Categoria) {
        $query = $this->conn->prepare("INSERT INTO categorias (identificador, nombre) VALUES (:id, :name)");
        $query->bindParam(':id', $data->getId());
        $query->bindParam(':name', $data->getName());
        $query->execute();
      } else {
        $query = $this->conn->prepare("INSERT INTO productos (identificador, nombre, imagen, descripcion, precio, categoria) VALUES (:id, :name, :image, :description, :price, :category)");
        $query->bindParam(':id', $data->getId());
        $query->bindParam(':name', $data->getName());
        $query->bindParam(':image', $data->getImage(), PDO::PARAM_LOB);
        $query->bindParam(':description', $data->getDescription());
        $query->bindParam(':price', $data->getPrice());
        $query->bindParam(':category', $data->getCategory());
        $query->execute();
      }
    } catch(Exception $ex) {
      throw new Exception($ex->getMessage());
    }
  }


}


?>