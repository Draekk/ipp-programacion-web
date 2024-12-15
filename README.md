# Proyecto Programación Web para IPP

Este repositorio contiene el código fuente para el proyecto de programación web para la Institución Profesional Providencia (IPP). El objetivo del proyecto es desarrollar una aplicación web que permita a los usuarios crear, ver y administrar productos con sus categorías correspondientes.

## Tabla de Contenidos

- [Introducción](#introducción)
- [Requisitos](#requisitos)
- [Instalación](#instalación)
- [Uso](#uso)
- [Contribución](#contribución)
- [Licencia](#licencia)

## Introducción

El proyecto IPP consiste en desarrollar una aplicación web que permita a los usuarios administrar productos y categorías en un entorno amigable y fácil de usar. La aplicación web debe proporcionar funcionalidades para crear, ver, editar y eliminar productos, así como para crear, ver y editar categorías.

## Requisitos

- PHP 7.4 o superior
- Servidor web (Apache, Nginx, etc.)
- Base de datos MySQL o similar

## Instalación

1. Clona este repositorio en tu entorno local.
2. Crea una base de datos MySQL y ejecuta el script SQL que se encuentra en la carpeta `database`.
3. Utiliza el comando `SOURCE /tu/ruta/database/db_query.sql` en la terminal de MYSQL.
4. Configura la conexión a la base de datos en el archivo `class/database.php`.
5. Levanta el servidor web utilizando el comando `php -S localhost:8000` en la terminal.
6. Abre tu navegador web y accede a la dirección `http://localhost:8000` para ver la aplicación web.

## Uso

La aplicación web IPP permite a los usuarios realizar las siguientes acciones:

- Crear nuevas categorías.
- Ver la lista de categorías existentes.
- Editar la información de las categorías. (Próximamente)
- Eliminar categorías. (Próximamente)
- Crear nuevos productos, seleccionando la categoría a la que pertenecerán.
- Ver la lista de productos existentes, incluyendo la información de la categoría a la que pertenecen.
- Editar la información de los productos. (Próximamente)
- Eliminar productos. (Próximamente)

## Contribución

Si deseas contribuir al proyecto, sigue estas directrices:

- Crea una rama nueva para tus cambios.
- Envía un pull request para revisar y fusionar tus cambios.

## Licencia

Este proyecto está bajo la licencia MIT. Puedes encontrar más información en el archivo `LICENSE`.
