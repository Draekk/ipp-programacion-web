<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index.php</title>
</head>
<body>
  <?php

  //include PDO
  include './class/database.php';

  //Instanciar la clase Database
  $database = new Database('mysql', '127.0.0.1', 'custom_user', '1234', 'db_miproyecto');

  //Obtener la conexion
  $conn = $database->getConn();

  if($conn) {
    echo "<h1>Conectado</h1>";

    $select = $conn->query('SELECT * FROM categorias');
    $result = $select->fetchAll(PDO::FETCH_ASSOC);


    echo "<ul>";
    foreach($result as $row) {
      echo "<li>".$row['identificador']."</li>";
      echo "<li>".$row['nombre']."</li>";
    }
    echo "</ul>";

  } else {
    echo "<h1>Desconectado</h1>";
  }
  
  // $conn = new PDO('mysql:db_miproyecto;host=127.0.0.1', 'root', 'DraekkDev6592');
  
  // if($conn->getAttribute(PDO::ATTR_CONNECTION_STATUS)) {
  //   echo "<h1>Conectado</h1>";
  // } else {
  //   echo "<h1>Desconectado</h1>";
  // }
  
  ?>
  <a href="/backend/views/categorias.html">Categorias</a>
  <a href="/backend/views/productos.html">Productos</a>
  <button>Conectar</button>
</body>
</html>