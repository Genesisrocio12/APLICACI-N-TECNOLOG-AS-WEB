<?php
class Libro extends DB {
    // Defino las propiedades de la clase que representan las columnas de la tabla 'libros'
    public $id;
    public $titulo;
    public $autor;
    public $anio_publicacion;
    public $genero;
    public $isbn;

    // Método estático para obtener todos los registros de la tabla 'libros'
    public static function all()
    {
        $db = new DB(); // Creo una nueva instancia de la conexión a la base de datos
        $prepare = $db->prepare("SELECT * FROM libros"); // Preparo la consulta SQL
        $prepare->execute(); // Ejecuto la consulta

        // Devuelvo todos los registros como objetos de la clase Libro
        return $prepare->fetchAll(PDO::FETCH_CLASS, Libro::class);
    }

    // Método estático para encontrar un libro por su ID
    public static function find($id)
    {
        $db = new DB(); // Creo una nueva instancia de la conexión a la base de datos
        $prepare = $db->prepare("SELECT * FROM libros WHERE id=:id"); // Preparo la consulta SQL con un parámetro
        $prepare->execute([":id" => $id]); // Ejecuto la consulta pasando el ID como parámetro

        // Devuelvo el resultado como un objeto de la clase Libro
        return $prepare->fetchObject(Libro::class);
    }

    // Método para guardar un nuevo libro o actualizar uno existente
    public function save()
    {
        // Creo un array con los parámetros que se van a usar en la consulta SQL
        $params = [
            ":titulo" => $this->titulo,
            ":autor" => $this->autor,
            ":anio_publicacion" => $this->anio_publicacion,
            ":genero" => $this->genero,
            ":isbn" => $this->isbn
        ];

        // Verifico si el ID está vacío, lo que significa que es un nuevo libro
        if (empty($this->id)) {
            // Inserto un nuevo libro en la base de datos
            $prepare = $this->prepare("INSERT INTO libros(titulo, autor, anio_publicacion, genero, isbn) VALUES (:titulo, :autor, :anio_publicacion, :genero, :isbn)");
            $prepare->execute($params);

            // Obtengo el ID del nuevo libro insertado y lo asigno a la propiedad 'id'
            $prepare2 = $this->prepare("SELECT MAX(id) id FROM libros");
            $prepare2->execute();
            $this->id = $prepare2->fetch(PDO::FETCH_ASSOC)["id"];
        } else {
            // Si el ID no está vacío, significa que estamos actualizando un libro existente
            $params[":id"] = $this->id;
            $prepare = $this->prepare("UPDATE libros SET titulo=:titulo, autor=:autor, anio_publicacion=:anio_publicacion, genero=:genero, isbn=:isbn WHERE id=:id");
            $prepare->execute($params);
        }
    }

    // Método para eliminar un libro de la base de datos por su ID
    public function remove()
    {
        // Preparo y ejecuto la consulta SQL para eliminar el libro
        $prepare = $this->prepare("DELETE FROM libros WHERE id=:id");
        $prepare->execute([":id" => $this->id]);
    }
}
?>
