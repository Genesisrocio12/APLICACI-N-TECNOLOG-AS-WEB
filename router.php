<?php
// Incluir los archivos necesarios para el funcionamiento del enrutador
include_once "utils/defaults.php"; // Archivo que define funciones útiles, como 'view'
include_once "models/DB.php";       // Archivo que maneja la conexión a la base de datos
include_once "models/Libro.php";    // Archivo que define el modelo 'Libro' para operaciones CRUD

// Obtener los parámetros de la URL pasados por la reescritura de URL
$controller = $_GET['controller']; // Nombre del controlador que se debe invocar (por ejemplo, 'libros')
$action = $_GET['action'];         // Nombre de la acción que se debe ejecutar (por ejemplo, 'crear')
$id = $_GET['id'];                 // ID del recurso (por ejemplo, el ID de un libro)

// Establecer la acción por defecto si no se proporciona
if (empty($action))
    $action = "index"; // Si no se especifica acción, se usa 'index' como valor predeterminado

// Construir el nombre de la clase del controlador basado en el nombre del controlador en la URL
$ctrlName = ucfirst($controller) . "Controller"; // Convertir el nombre del controlador a formato de clase (por ejemplo, 'LibrosController')

// Incluir el archivo del controlador correspondiente
include "./controllers/$ctrlName.php"; // Incluye el archivo del controlador basado en el nombre generado

// Crear una instancia del controlador y ejecutar la acción deseada
$ctrl = new $ctrlName; // Instanciar el controlador
$ctrl->{$action}($id); // Llamar al método de acción del controlador, pasando el ID si está presente
