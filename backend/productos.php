<?php
require_once("../class/autoload.php");

$autoload = new Autoload();
$database = $autoload->getDatabase();
$product = $autoload->createProduct();

switch($_SERVER['REQUEST_METHOD']) {
  case 'POST':
    try {
      $id = $_POST['productId'];
      $name = $_POST['productName'];
      $description = $_POST['productDescription'];
      $price = $_POST['productPrice'];
      $category = $_POST['productCategory'];

      //Subir imagen
      if(isset($_FILES['productImg']) && $_FILES['productImg']['error'] === UPLOAD_ERR_OK) {
        $img = file_get_contents($_FILES['productImg']['tmp_name']);
      } else {
        throw new Exception("Error al subir la imagen");
      }

      $product->setId($id);
      $product->setName($name);
      $product->setImage($img);
      $product->setDescription($description);
      $product->setPrice($price);
      $product->setCategory($category);
      $database->save($product);
      header("Location: ./productos.php");
      exit();
    } catch (Exception $ex) {
      throw new Exception($ex->getMessage());
    }
    break;

  default:
    try {
      if(isset($_GET['forProducts'])) {
        $autoload->createSession($database->findAll('categorias'), 'categories', 'load_categorias.php');
      } else {
        // $autoload->createSession($database->findAll('productos'), 'products', 'lista_productos.php');
        session_start();
        $data = $database->findProductsOrderByCategories();
        $_SESSION['products'] = $data;
        header("Location: ./lista_productos.php");
        exit();
      }
    } catch (Exception $ex) {
      throw new Exception($ex->getMessage());
    }
    break;
}

?>