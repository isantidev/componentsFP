<?php
include '../config.php';

function guardarImagen($archivo, $nombreProducto)
{
    // Verificar si el archivo es un PNG
    if ($archivo['type'] !== 'image/png') {
        return "El archivo debe ser un PNG.";
    }

    // Eliminar espacios y caracteres especiales del nombre del producto
    $nombreProductoLimpio = preg_replace('/[^A-Za-z0-9]/', '', str_replace(' ', '', iconv('UTF-8', 'ASCII//TRANSLIT', $nombreProducto)));

    // Crear el nombre del archivo con el formato img-$nombre-producto.png
    $nombreArchivo = 'img-' . $nombreProductoLimpio . '-producto.png';

    // Ruta completa donde se guardará el archivo
    $rutaDestino = ROOT_PATH . '/img-productos/' . $nombreArchivo;

    // Mover el archivo a la carpeta "imagenes" con el nuevo nombre
    if (move_uploaded_file($archivo['tmp_name'], $rutaDestino)) {
        header("Location: ../index.php");
    } else {
        return "Hubo un error al guardar el archivo.";
    }
}

// Procesar el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $resultado = guardarImagen($_FILES['archivo'], $_POST['nombre']);
    echo $resultado;
}
