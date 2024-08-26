<?php
class Libro extends DB {
    public $id;
    public $titulo;
    public $autor;
    public $anio_publicacion;
    public $genero;
    public $isbn;

    public static function all()
    {
        $db = new DB();
        $prepare = $db->prepare("SELECT * FROM libros");
        $prepare->execute();

        return $prepare->fetchAll(PDO::FETCH_CLASS, Libro::class);
    }

    public static function find($id)
    {
        $db = new DB();
        $prepare = $db->prepare("SELECT * FROM libros WHERE id=:id");
        $prepare->execute([":id" => $id]);

        return $prepare->fetchObject(Libro::class);
    }

    public function save()
    {
        $params = [
            ":titulo" => $this->titulo,
            ":autor" => $this->autor,
            ":anio_publicacion" => $this->anio_publicacion,
            ":genero" => $this->genero,
            ":isbn" => $this->isbn
        ];

        if (empty($this->id)) {
            $prepare = $this->prepare("INSERT INTO libros(titulo, autor, anio_publicacion, genero, isbn) VALUES (:titulo, :autor, :anio_publicacion, :genero, :isbn)");
            $prepare->execute($params);

            $prepare2 = $this->prepare("SELECT MAX(id) id FROM libros");
            $prepare2->execute();
            $this->id = $prepare2->fetch(PDO::FETCH_ASSOC)["id"];
        } else {
            $params[":id"] = $this->id;
            $prepare = $this->prepare("UPDATE libros SET titulo=:titulo, autor=:autor, anio_publicacion=:anio_publicacion, genero=:genero, isbn=:isbn WHERE id=:id");
            $prepare->execute($params);
        }
    }

    public function remove()
    {
        $prepare = $this->prepare("DELETE FROM libros WHERE id=:id");
        $prepare->execute([":id" => $this->id]);
    }
}