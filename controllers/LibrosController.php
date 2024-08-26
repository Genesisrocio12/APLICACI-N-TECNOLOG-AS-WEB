<?php
class LibrosController {
  
  // Método para obtener y mostrar todos los libros
  public function index()
  {
    // Recupero todos los registros de libros desde la base de datos
    $libros = Libro::all();
    
    // Paso la lista de libros a la vista correspondiente
    view("libros.index", ["libros" => $libros]);
  }

  // Método para crear un nuevo libro
  public function create()
  {
    // Decodifico los datos enviados en la solicitud (en formato JSON)
    $data = json_decode(file_get_contents('php://input'));
    
    // Creo una nueva instancia de Libro y asigno los valores correspondientes
    $libro = new Libro();
    $libro->titulo = $data->titulo;
    $libro->autor = $data->autor;
    $libro->anio_publicacion = $data->anio_publicacion;
    $libro->genero = $data->genero;
    $libro->isbn = $data->isbn;
    
    // Guardo el nuevo libro en la base de datos
    $libro->save();

    // Devuelvo el objeto libro creado en formato JSON como respuesta
    echo json_encode($libro);
  }

  // Método para actualizar un libro existente
  public function update()
  {
    // Decodifico los datos enviados en la solicitud (en formato JSON)
    $data = json_decode(file_get_contents('php://input'));
    
    // Busco el libro que quiero actualizar por su ID
    $libro = Libro::find($data->id);
    
    // Actualizo los campos del libro con los nuevos datos
    $libro->titulo = $data->titulo;
    $libro->autor = $data->autor;
    $libro->anio_publicacion = $data->anio_publicacion;
    $libro->genero = $data->genero;
    $libro->isbn = $data->isbn;
    
    // Guardo los cambios en la base de datos
    $libro->save();

    // Devuelvo el objeto libro actualizado en formato JSON como respuesta
    echo json_encode($libro);
  }

  // Método para eliminar un libro por su ID
  public function delete($id)
  {
    try {
      // Intento encontrar y eliminar el libro correspondiente en la base de datos
      $libro = Libro::find($id);
      $libro->remove();
      
      // Si la eliminación es exitosa, devuelvo un estado de éxito en formato JSON
      echo json_encode(['status' => true]);
    } catch (\Exception $e) {
      // Si ocurre un error, devuelvo un estado de fallo en formato JSON
      echo json_encode(['status' => false]);
    }
  }

  // Método para encontrar un libro por su ID
  public function find($id)
  {
    // Busco el libro en la base de datos usando su ID
    $libro = Libro::find($id);
    
    // Devuelvo el objeto libro encontrado en formato JSON como respuesta
    echo json_encode($libro);
  }
}
?>
