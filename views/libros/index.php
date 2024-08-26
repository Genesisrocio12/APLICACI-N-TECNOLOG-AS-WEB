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
            font-family: Arial, sans-serif; /* Establece la fuente de la página */
            margin: 0;
            padding: 10px 20px;
            background-color: #c8b59d; /* Color de fondo suave */
            color: #3a2317; /* Color del texto */
        }
        h1 {
            font-family: 'Dancing Script', cursive; /* Fuente decorativa para el título */
            font-size: 3em; /* Tamaño grande para el título */
            text-align: center;
            margin: 0;
            line-height: 1.2;
        }
        h1 span {
            display: inline-block;
            margin: 0 2px;
        }
        /* Colores para cada span en el título */
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
            font-size: 1.5em; /* Tamaño de fuente para el nombre */
            text-align: center;
            margin: 20px 0;
        }

        form {
            margin: 0 auto;
            max-width: 600px; /* Ancho máximo del formulario */
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.8); /* Fondo oscuro semitransparente */
            border-radius: 8px; /* Bordes redondeados */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Sombra para el formulario */
            color: #fff; /* Color del texto del formulario */
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        input[type="text"], input[type="number"] {
            width: calc(100% - 20px); /* Ancho de los campos de entrada */
            padding: 15px;
            margin-bottom: 15px;
            border: 1px solid #a87e62; /* Borde de los campos de entrada */
            background-color: #fff; /* Fondo blanco para los campos de entrada */
            color: #3a2317; /* Color del texto de los campos de entrada */
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            color: #fff; /* Color del texto del botón */
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            max-width: 200px; /* Ancho máximo del botón */
            box-sizing: border-box;
            margin: 20px auto 0;
            display: block;
            transition: background-color 0.3s, transform 0.3s; /* Transición para el color y escala */
        }
        button#guardar-libro {
            background-color: #3a2317; /* Color de fondo del botón */
        }
        button#guardar-libro:hover {
            background-color: #a87e62; /* Color de fondo al pasar el cursor */
            transform: scale(1.05); /* Escala ligeramente el botón al pasar el cursor */
        }
        .btn-edit, .btn-delete {
            background-color: #311f13; /* Color de fondo de los botones de editar y eliminar */
            margin: 0 10px;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s; /* Transición para el color y escala */
        }
        .btn-edit:hover, .btn-delete:hover {
            background-color: #a87e62; /* Color de fondo al pasar el cursor */
            transform: scale(1.05); /* Escala ligeramente el botón al pasar el cursor */
        }
        table {
            width: 100%;
            border-collapse: collapse; /* Eliminar espacio entre bordes de celdas */
            margin-top: 20px;
            background-color: #fff; /* Color de fondo de la tabla */
            border-radius: 8px; /* Bordes redondeados de la tabla */
            overflow: hidden; /* Ocultar desbordamiento de contenido */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Sombra para la tabla */
        }
        th, td {
            border: 1px solid #a87e62; /* Borde de las celdas de la tabla */
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #b07154; /* Color de fondo para las cabeceras de la tabla */
            color: #fff; /* Color del texto en las cabeceras */
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

    <!-- Formulario para agregar o editar libros -->
    <form id="libro-form">
        <input type="hidden" id="libro-id"> <!-- Campo oculto para el ID del libro -->
        <input type="text" id="titulo" placeholder="Título" required> <!-- Campo para el título -->
        <input type="text" id="autor" placeholder="Autor" required> <!-- Campo para el autor -->
        <input type="number" id="anio_publicacion" placeholder="Año de publicación" required> <!-- Campo para el año de publicación -->
        <input type="text" id="genero" placeholder="Género" required> <!-- Campo para el género -->
        <input type="text" id="isbn" placeholder="ISBN" required> <!-- Campo para el ISBN -->
        <button id="guardar-libro" type="submit">Guardar Libro</button> <!-- Botón para guardar el libro -->
    </form>

    <!-- Tabla para mostrar los libros -->
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
            <!-- Mostrar los libros en la tabla -->
            <?php foreach ($libros as $libro): ?>
            <tr>
                <td><?php echo $libro->id; ?></td>
                <td><?php echo $libro->titulo; ?></td>
                <td><?php echo $libro->autor; ?></td>
                <td><?php echo $libro->anio_publicacion; ?></td>
                <td><?php echo $libro->genero; ?></td>
                <td><?php echo $libro->isbn; ?></td>
                <td>
                    <!-- Botones para editar y eliminar el libro -->
                    <button class="btn-edit" onclick="editarLibro(<?php echo $libro->id; ?>)">Editar</button>
                    <button class="btn-delete" onclick="eliminarLibro(<?php echo $libro->id; ?>)">Eliminar</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Script para manejar el formulario y los botones -->
    <script>
        document.getElementById('libro-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevenir el comportamiento por defecto del formulario
            // Aquí se llamaría una función para guardar o actualizar el libro
        });

        function editarLibro(id) {
            // Aquí se llamaría una función para cargar los datos del libro en el formulario
        }

        function eliminarLibro(id) {
            // Aquí se llamaría una función para eliminar el libro
        }
    </script>
</body>
</html>
