<?php
// Verifico si la función 'view' no existe para evitar redefinirla
if (!function_exists("view")) {

    // Defino la función 'view' que carga una vista con parámetros
    function view($nombreVista, $params)
    {
        // Recorro los parámetros y creo variables dinámicas con sus nombres y valores
        foreach ($params as $key => $param) {
            $$key = $param;
        }

        // Divido el nombre de la vista en partes utilizando el punto como separador
        $vista = explode('.', $nombreVista);

        // Incluyo el archivo PHP correspondiente a la vista desde la carpeta 'views'
        include_once "./views/{$vista[0]}/{$vista[1]}.php";
    }
}
?>
