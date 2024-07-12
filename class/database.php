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

  /**
  * Actualiza un registro en la base de datos según los datos proporcionados.
  *
  * Este método acepta un objeto de datos y actualiza el registro correspondiente en la base de datos,
  * dependiendo de su tipo. Si el objeto es de tipo 'Categoria', los datos se actualizarán en la tabla 'categorias'.
  * Si el objeto es de tipo 'Producto', los datos se actualizarán en la tabla 'productos'.
  *
  * @param mixed $data El objeto de datos para actualizar en la base de datos.
  *
  * @throws Exception Si se produce un error al ejecutar la consulta de actualización.
  */
  public function uptate($data) {
    try {
      if($data instanceof Categoria) {
        $query = $this->conn->prepare("UPDATE categorias SET nombre = :name WHERE identificador = :id");
        $query->bindParam(':id', $data->getId());
        $query->bindParam(':name', $data->getName());
        $query->execute();
      } else {
        $query = $this->conn->prepare("UPDATE productos SET nombre = :name, imagen = :image, descripcion = :description, precio = :price, categoria = :category WHERE identificador = :id");
        $query->bindParam(':id', $data->getId());
        $query->bindParam(':name', $data->getName());
        $query->bindParam(':image', $data->getImage(), PDO::PARAM_LOB);
        $query->bindParam(':description', $data->getDescription());
        $query->bindParam(':price', $data->getPrice());
        $query->bindParam(':category', $data->getCategory());
      }
    } catch(Exception $ex) {
      throw new Exception($ex->getMessage());
    }
  }

  /**
  * Elimina un registro de la base de datos según los datos proporcionados.
  *
  * Este método acepta un objeto de datos y elimina el registro correspondiente de la base de datos,
  * dependiendo de su tipo. Si el objeto es de tipo 'Categoria', los datos se eliminarán de la tabla 'categorias'.
  * Si el objeto es de tipo 'Producto', los datos se eliminarán de la tabla 'productos'.
  *
  * @param mixed $data El objeto de datos para eliminar de la base de datos.
  *
  * @throws Exception Si se produce un error al ejecutar la consulta de eliminación.
  */
  public function delete($data) {
    try {
      if($data instanceof Categoria) {
        $query = $this->conn->prepare("DELETE FROM categorias WHERE identificador = :id");
        $query->bindParam(':id', $data->getId());
        $query->execute();
      } else {
        $query = $this->conn->prepare("DELETE FROM productos WHERE identificador = :id");
        $query->bindParam(':id', $data->getId());
        $query->execute();
      }
    } catch(Exception $ex) {
      throw new Exception($ex->getMessage());
    }
  }

  /**
  * Recupera un registro de la base de datos según la tabla y el ID proporcionados.
  *
  * Esta función ejecuta una sentencia preparada para seleccionar un registro de la tabla especificada,
  * basándose en el ID proporcionado. Si la tabla es 'categorias', recupera todas las columnas de la tabla.
  * Si la tabla es 'productos', recupera columnas específicas junto con el nombre de la categoría correspondiente.
  *
  * @param string $table El nombre de la tabla de la cual recuperar el registro.
  * @param mixed $id El identificador único del registro a recuperar.
  *
  * @return array|null Un array asociativo que contiene el registro recuperado, o null si no se encuentra ningún registro.
  *
  * @throws Exception Si se produce un error durante la ejecución de la consulta de base de datos.
  */
  public function getById($table, $id) {
    try {
      if($table === 'categorias') {
        $query = $this->conn->prepare("SELECT * FROM ". $table. " WHERE identificador = :id");
        $query->bindParam(':id', $id);
      } else {
        $query = $this->conn->prepare("SELECT productos.identificador, productos.nombre, productos.imagen, productos.descripcion, productos.precio, categorias.nombre as nombre_categoria FROM ". $table. " JOIN categorias ON productos.categoria = categorias.identificador WHERE productos.identificador = :id");
        $query->bindParam(':id', $id);
      }
      $query->execute();
      return $query->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $ex) {
      throw new Exception($ex->getMessage());
    }
  }


}


?>