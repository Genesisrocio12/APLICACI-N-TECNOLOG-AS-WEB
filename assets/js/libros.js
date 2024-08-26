// URL base de la API
// Aquí establezco la URL base de la API que utilizo para realizar todas las operaciones CRUD con los libros.
const API_URL = 'https://api.ejemplo.com/libros';

// Función para obtener todos los libros
// Esta función se encarga de obtener la lista completa de libros desde la API.
function obtenerLibros() {
  fetch(API_URL)
    .then(response => response.json()) // Convierto la respuesta en formato JSON
    .then(data => {
      console.log('Libros obtenidos:', data);
      // Aquí puedo actualizar el DOM o realizar cualquier acción con los datos obtenidos.
    })
    .catch(error => console.error('Error al obtener los libros:', error)); // Manejo cualquier error que ocurra al obtener los libros
}

// Función para obtener un libro por su ID
// Esta función me permite obtener un libro específico a través de su ID.
function obtenerLibro(id) {
  fetch(`${API_URL}/${id}`)
    .then(response => response.json()) // Convierto la respuesta en JSON
    .then(data => {
      console.log('Libro obtenido:', data);
      // Aquí puedo actualizar el DOM o realizar cualquier acción con el libro obtenido.
    })
    .catch(error => console.error('Error al obtener el libro:', error)); // Manejo los errores al intentar obtener un libro por su ID
}

// Función para agregar un nuevo libro
// Con esta función, puedo agregar un nuevo libro a la base de datos a través de la API.
function agregarLibro(datos) {
  fetch(API_URL, {
    method: 'POST', // Especifico que quiero realizar una operación de creación (POST)
    headers: {
      'Content-Type': 'application/json', // Defino el tipo de contenido que estoy enviando en la solicitud
    },
    body: JSON.stringify(datos), // Convierto los datos del libro en un string JSON para enviarlos
  })
    .then(response => {
      if (!response.ok) { // Verifico si la respuesta no es OK (código de estado 200)
        throw new Error('Error al agregar el libro'); // Si hay un error, lo lanzo para manejarlo en el catch
      }
      return response.json(); // Convierto la respuesta en JSON si todo salió bien
    })
    .then(data => {
      console.log('Libro agregado con éxito:', data);
      // Aquí puedo actualizar el DOM o realizar cualquier acción después de agregar el libro.
    })
    .catch(error => console.error('Error al agregar el libro:', error)); // Manejo cualquier error que ocurra durante la adición del libro
}

// Función para actualizar un libro por su ID
// Esta función me permite actualizar los datos de un libro existente en la base de datos.
function actualizarLibro(id, datos) {
  fetch(`${API_URL}/${id}`, {
    method: 'PUT', // Utilizo el método PUT para indicar que quiero actualizar un recurso existente
    headers: {
      'Content-Type': 'application/json', // Defino el tipo de contenido que estoy enviando
    },
    body: JSON.stringify(datos), // Envío los datos actualizados del libro como un string JSON
  })
    .then(response => {
      if (!response.ok) { // Verifico si la respuesta no es OK
        throw new Error('Error en la actualización'); // Si hay un error, lo lanzo para manejarlo
      }
      return response.json(); // Convierto la respuesta en JSON si todo salió bien
    })
    .then(data => {
      console.log('Libro actualizado con éxito:', data);
      // Aquí puedo actualizar el DOM o realizar cualquier acción después de actualizar el libro.
    })
    .catch(error => console.error('Error al actualizar el libro:', error)); // Manejo cualquier error que ocurra durante la actualización del libro
}

// Función para eliminar un libro por su ID
// Esta función me permite eliminar un libro específico de la base de datos.
function eliminarLibro(id) {
  fetch(`${API_URL}/${id}`, {
    method: 'DELETE', // Utilizo el método DELETE para eliminar un recurso
  })
    .then(response => {
      if (!response.ok) { // Verifico si la respuesta no es OK
        throw new Error('Error al eliminar el libro'); // Si hay un error, lo lanzo para manejarlo
      }
      console.log('Libro eliminado con éxito');
      // Aquí puedo actualizar el DOM o realizar cualquier acción después de eliminar el libro.
    })
    .catch(error => console.error('Error al eliminar el libro:', error)); // Manejo cualquier error que ocurra durante la eliminación del libro
}

