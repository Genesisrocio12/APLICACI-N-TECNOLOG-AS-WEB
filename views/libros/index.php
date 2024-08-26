<!DOCTYPE html>
<!-- Nombre: GENESIS DEL ROCIO TITO FARINANGO -->
<!-- Asignatura: APLICACIÓN TECNOLOGÍAS WEB NRC: 17707 -->
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluación Final - Parte práctica</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 10px 20px;
            background-color: #c8b59d;
            color: #3a2317;
        }
        h1 {
            font-family: 'Dancing Script', cursive;
            font-size: 3em;
            text-align: center;
            margin: 0;
            line-height: 1.2;
        }
        h1 span {
            display: inline-block;
            margin: 0 2px;
        }
        h1 span:nth-child(1) { color: #ff6f61; }
        h1 span:nth-child(2) { color: #6b5b95; }
        h1 span:nth-child(3) { color: #88b04b; }
        h1 span:nth-child(4) { color: #f7cac9; }
        h1 span:nth-child(5) { color: #92a8d1; }
        h1 span:nth-child(6) { color: #f0d0a4; }
        h1 span:nth-child(7) { color: #ffab91; }
        h1 span:nth-child(8) { color: #b5e48f; }
        h1 span:nth-child(9) { color: #ff6f61; }
        h1 span:nth-child(10) { color: #6b5b95; }
        h1 span:nth-child(11) { color: #88b04b; }
        h1 span:nth-child(12) { color: #f7cac9; }
        h1 span:nth-child(13) { color: #92a8d1; }
        h1 span:nth-child(14) { color: #f0d0a4; }

        .name {
            font-family: Arial, sans-serif;
            font-size: 1.5em;
            text-align: center;
            margin: 20px 0;
        }

        form {
            margin: 0 auto;
            max-width: 600px;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.8); 
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        input[type="text"], input[type="number"] {
            width: calc(100% - 20px); 
            padding: 15px;
            margin-bottom: 15px;
            border: 1px solid #a87e62;
            background-color: #fff;
            color: #3a2317;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            max-width: 200px;
            box-sizing: border-box;
            margin: 20px auto 0;
            display: block;
            transition: background-color 0.3s, transform 0.3s; 
        }
        button#guardar-libro {
            background-color: #3a2317;
        }
        button#guardar-libro:hover {
            background-color: #a87e62;
            transform: scale(1.05); 
        }
        .btn-edit, .btn-delete {
            background-color: #311f13;
            margin: 0 10px;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }
        .btn-edit:hover, .btn-delete:hover {
            background-color: #a87e62;
            transform: scale(1.05); /* Escala ligeramente el botón al pasar el cursor */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        th, td {
            border: 1px solid #a87e62;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #b07154;
            color: #fff;
        }
    </style>
</head>
<body>
    <h1>
        <span>G</span><span>e</span><span>s</span><span>t</span><span>i</span><span>ó</span><span>n</span>
        <span>d</span><span>e</span>
        <span>L</span><span>i</span><span>b</span><span>r</span><span>o</span><span>s</span>
    </h1>
    <p class="name">Nombre: Tito Genesis</p>

    <form id="libro-form">
        <input type="hidden" id="libro-id">
        <input type="text" id="titulo" placeholder="Título" required>
        <input type="text" id="autor" placeholder="Autor" required>
        <input type="number" id="anio_publicacion" placeholder="Año de publicación" required>
        <input type="text" id="genero" placeholder="Género" required>
        <input type="text" id="isbn" placeholder="ISBN" required>
        <button id="guardar-libro" type="submit">Guardar Libro</button>
    </form>

    <table id="libros-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Año</th>
                <th>Género</th>
                <th>ISBN</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($libros as $libro): ?>
            <tr>
                <td><?php echo $libro->id; ?></td>
                <td><?php echo $libro->titulo; ?></td>
                <td><?php echo $libro->autor; ?></td>
                <td><?php echo $libro->anio_publicacion; ?></td>
                <td><?php echo $libro->genero; ?></td>
                <td><?php echo $libro->isbn; ?></td>
                <td>
                    <button class="btn-edit" onclick="editarLibro(<?php echo $libro->id; ?>)">Editar</button>
                    <button class="btn-delete" onclick="eliminarLibro(<?php echo $libro->id; ?>)">Eliminar</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script>
        // Función para manejar el envío del formulario
        document.getElementById('libro-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const id = document.getElementById('libro-id').value;
            const titulo = document.getElementById('titulo').value;
            const autor = document.getElementById('autor').value;
            const anio_publicacion = document.getElementById('anio_publicacion').value;
            const genero = document.getElementById('genero').value;
            const isbn = document.getElementById('isbn').value;

            const libro = {
                titulo: titulo,
                autor: autor,
                anio_publicacion: anio_publicacion,
                genero: genero,
                isbn: isbn
            };

            let url = '/proyecto-libros/libros/create';
            let method = 'POST';

            if (id) {
                libro.id = id;
                url = '/proyecto-libros/libros/update';
                method = 'PUT';
            }

            fetch(url, {
                method: method,
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(libro)
            }).then(response => response.json())
              .then(data => {
                  if (data) {
                      // Recargar la página para ver los cambios
                      window.location.reload();
                  }
              });
        });

        // Función para editar un libro
        function editarLibro(id) {
            fetch(`/proyecto-libros/libros/find/${id}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('libro-id').value = data.id;
                    document.getElementById('titulo').value = data.titulo;
                    document.getElementById('autor').value = data.autor;
                    document.getElementById('anio_publicacion').value = data.anio_publicacion;
                    document.getElementById('genero').value = data.genero;
                    document.getElementById('isbn').value = data.isbn;
                });
        }
        
        // Función para eliminar un libro
        function eliminarLibro(id) {
            if (confirm('¿Estás seguro de que quieres eliminar este libro?')) {
                fetch(`/proyecto-libros/libros/delete/${id}`, {
                    method: 'DELETE'
                }).then(response => response.json())
                  .then(data => {
                      if (data) {
                          // Recargar la página para ver los cambios
                          window.location.reload();
                      }
                  });
            }
        }
    </script>
</body>
</html>
