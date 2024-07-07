<?php

include "../class/autoload.php";

$autoload = new Autoload();
$category = $autoload->category;
$database = $autoload->database;

switch($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        try {
            $id = $_POST['categoryId'];
            $name = $_POST['categoryName'];
            $category->setId($id);
            $category->setName($name);
    
            $database->save($category);
            header("Location: views/categorias.html");
            exit();
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        break;
    default:
        try {
            $result = $database->findAll('categorias');

            $jsonResult = json_encode($result);
            header("Location: lista_categorias.php?categories=". $jsonResult);
            exit();
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
}

?>