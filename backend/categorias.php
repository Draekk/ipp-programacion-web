<?php

include "../class/autoload.php";


echo "<h1>hola</h1>";
$autoload = new Autoload();
$category = $autoload->category;
$database = $autoload->database;

// if($_SERVER['REQUEST_METHOD'] === 'POST') {
//     try {
//         $id = $_POST['categoryId'];
//         $name = $_POST['categoryName'];
//         $category->setId($id);
//         $category->setName($name);
        
//         echo "<h1>" . $category->getId() . "</h1>";

//         $database->save($category);
//         header("Location: views/categorias.html");
//         exit();
//     } catch (Exception $ex) {
//         throw new Exception($ex->getMessage());
//     }
// }

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
            $database->findAll('categorias');
            header("Location: views/lista_categorias.html");
            exit();
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
}


?>