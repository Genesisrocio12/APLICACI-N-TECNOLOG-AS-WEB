// URL base de la API
const API_URL = 'https://api.ejemplo.com/libros';

// Función para obtener todos los libros
function obtenerLibros() {
  fetch(API_URL)
    .then(response => response.json())
    .then(data => {
      console.log('Libros obtenidos:', data);
      // Aquí puedes actualizar el DOM o hacer lo que necesites con los datos
    })
    .catch(error => console.error('Error al obtener los libros:', error));
}

// Función para obtener un libro por su ID
function obtenerLibro(id) {
  fetch(`${API_URL}/${id}`)
    .then(response => response.json())
    .then(data => {
      console.log('Libro obtenido:', data);
      // Aquí puedes actualizar el DOM o hacer lo que necesites con el libro
    })
    .catch(error => console.error('Error al obtener el libro:', error));
}

// Función para agregar un nuevo libro
function agregarLibro(datos) {
  fetch(API_URL, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(datos),
  })
    .then(response => {
      if (!response.ok) {
        throw new Error('Error al agregar el libro');
      }
      return response.json();
    })
    .then(data => {
      console.log('Libro agregado con éxito:', data);
      // Aquí puedes actualizar el DOM o hacer lo que necesites después de agregar el libro
    })
    .catch(error => console.error('Error al agregar el libro:', error));
}

// Función para actualizar un libro por su ID
function actualizarLibro(id, datos) {
  fetch(`${API_URL}/${id}`, {
    method: 'PUT', // Cambiado a PUT para actualizar
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(datos),
  })
    .then(response => {
      if (!response.ok) {
        throw new Error('Error en la actualización');
      }
      return response.json();
    })
    .then(data => {
      console.log('Libro actualizado con éxito:', data);
      // Aquí puedes actualizar el DOM o hacer lo que necesites después de actualizar el libro
    })
    .catch(error => console.error('Error al actualizar el libro:', error));
}

// Función para eliminar un libro por su ID
function eliminarLibro(id) {
  fetch(`${API_URL}/${id}`, {
    method: 'DELETE',
  })
    .then(response => {
      if (!response.ok) {
        throw new Error('Error al eliminar el libro');
      }
      console.log('Libro eliminado con éxito');
      // Aquí puedes actualizar el DOM o hacer lo que necesites después de eliminar el libro
    })
    .catch(error => console.error('Error al eliminar el libro:', error));
}

// Ejemplo de cómo podrías usar estas funciones
// obtenerLibros();
// obtenerLibro(1);
// agregarLibro({ titulo: 'Nuevo Libro', autor: 'Autor' });
// actualizarLibro(1, { titulo: 'Libro Actualizado', autor: 'Autor Actualizado' });
// eliminarLibro(1);
