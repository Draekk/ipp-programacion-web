<?php

include "../class/autoload.php";

$autoload = new Autoload();
$category = $autoload->category;
$database = $autoload->database;

session_start();
if(isset($_SESSION['json'])) {
    $json = json_decode($_SESSION['json'], true);
    if($json['forProducts']) {
        $data = $json['data'];
        include "./views/productos.html";
        exit();
    }
}

switch($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        try {
            $id = $_POST['categoryId'];
            $name = $_POST['categoryName'];
            $category->setId($id);
            $category->setName($name);
    
            $database->save($category);
            header("Location: ../index.php");
            exit();
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        break;
    default:
        try {
            $result = $database->findAll('categorias');
            redirectData($result, 'lista_categorias.php');
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
}

function redirectData($data, $location) {
    session_start();
    $_SESSION['json'] = json_encode($data);
    header("Location: " . $location);
    exit();
}

?>