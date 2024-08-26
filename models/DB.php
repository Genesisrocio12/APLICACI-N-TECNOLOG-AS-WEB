<?php
class DB extends PDO {
    public function __construct() {
        $dsn = 'mysql:host=localhost;dbname=proyecto-libros';
        parent::__construct($dsn, 'root', '');
    }
}