<?php
include "./class/autoload.php";
include "./class/productos.php";

$autoload = new Autoload();
$database = $autoload->database;

switch($_SERVER['REQUEST_METHOD']) {
  case 'POST':
    try {
      $id = $_POST['productId'];
    $name = $_POST['productName'];
    $img = $_POST['productImg'];
    $description = $_POST['productDescription'];
    $price = $_POST['productPrice'];
    $category = $_POST['productCategory'];

    $product = new Producto(
      $id,
      $name,
      $img,
      $description,
      $price,
      $category
    );
    $database->save($product);
    header("Location: ../index.php");
    exit();
    } catch (Exception $ex) {
      throw new Exception($ex->getMessage());
    }
    break;

  default:
    try {
      $result = $database->findAll('productos');
      redirectData($result, 'lista_productos.php');
    } catch (Exception $ex) {
        throw new Exception($ex->getMessage());
    }
    break;
}

function redirectData($data, $location = null) {
  session_start();
  
  if($location) {
    $_SESSION['json'] = json_encode($data);
    header("Location: ". $location);
  } else {
    $jsonData = ["data" => $data, "forProducts" => true];
    $_SESSION['json'] = json_encode($jsonData);
    header("Location: categorias.php");
  }
  exit();
}


?>