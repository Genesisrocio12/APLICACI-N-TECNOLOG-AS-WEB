<?php
class DB extends PDO {
    // Constructor de la clase DB, que extiende la clase PDO para manejar la base de datos
    public function __construct() {
        // Defino el Data Source Name (DSN) para conectarme a la base de datos MySQL
        // Especifico el host como 'localhost' y la base de datos como 'proyecto-libros'
        $dsn = 'mysql:host=localhost;dbname=proyecto-libros';
        
        // Llamo al constructor de la clase PDO, pasando el DSN y las credenciales (usuario 'root' y contraseña vacía)
        parent::__construct($dsn, 'root', '');
    }
}
?>
