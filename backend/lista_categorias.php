<?php
$categories = json_decode($_GET['categories'], true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Categorias</title>
</head>
<body>
    <h1>Lista de Categorias</h1>
    <table>
        <thead>
            <tr>
                <th>Identificador</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($categories as $category):?>
                <tr>
                    <td><?=$category['identificador']?></td>
                    <td><?=$category['nombre']?></td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</body>
</html>