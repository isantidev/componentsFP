<?php
include '../config.php';
require ROOT_PATH . 'php/main.php';

$fila = '';

function solicitarDatos($tabla, $conexion)
{
    $sql = "SELECT * FROM $tabla";
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    $row = $stmt->rowCount();
    $resultados = ($row > 0) ? $stmt->fetchAll(PDO::FETCH_ASSOC) : 0;
    return ['row' => $row, 'resultado' => $resultados];
}

$llamado = solicitarDatos('proveedor', $conn);
$row = $llamado['row'];
$datos = $llamado['resultado'];

$nombre = [];
$direccion = [];
$pagina_web = [];
$contacto = [];
$correo = [];
$iteracion = 0;

if ($datos !== 0) {
    foreach ($datos as $dato) {
        $nombre[$iteracion] = ($dato['nombre'] === null || $dato['nombre === ""'] === "") ? "Sin registrar" : $dato['nombre'];
        $direccion[$iteracion] = ($dato['direccion'] === null || $dato['direccion'] === "") ? "Sin registrar" : $dato['direccion'];
        $pagina_web[$iteracion] = ($dato['pagina_web'] === null || $dato['pagina_web'] === "") ? "Sin registrar" : $dato['pagina_web'];
        $contacto[$iteracion] = ($dato['contacto'] === null || $dato['contacto'] === "") ? "Sin registrar" : $dato['contacto'];
        $correo[$iteracion] = ($dato['correo'] === null || $dato['correo'] === "") ? "Sin registrar" : $dato['correo'];
        $iteracion = $iteracion + 1;
    }
} else {
    echo 'miercoleees';
}

for ($i = 0; $i < $row; $i++) {
    $fila = '<div class="proveedor_fila_contenedor">
    <ul class="proveedor_fila">
        <li class="proveedor_columna">
            <p data-text="Proveedor: ">' . $nombre[$i] . '</p>
        </li>
        <li class="proveedor_columna">
            <p data-text="Dirección: ">' . $direccion[$i] . '</p>
        </li>
        <li class="proveedor_columna">';

    if ($pagina_web[$i] === "Sin registrar") {
        $fila .= '<p data-text="Pagina web: ">' . $pagina_web[$i] . '</p>';
    } else {
        $fila .= '<a data-text="Pagina web: " href="' . $pagina_web[$i] . '">' . $pagina_web[$i] . '</a>';
    }

    $fila .= '</li>
        <li class="proveedor_columna">';

    if ($contacto[$i] === "Sin registrar") {
        $fila .= '<p data-text="Contacto: ">' . $contacto[$i] . '</p>';
    } else {
        $fila .= '<a data-text="Contacto: " href="tel:' . $contacto[$i] . '">' . $contacto[$i] . '</a>';
    }

    $fila .= '</li>
        <li class="proveedor_columna">';

    if ($correo[$i] === "Sin registrar") {
        $fila .= '<p data-text="Correo: ">' . $correo[$i] . '</p>';
    } else {
        $fila .= '<a data-text="Correo: " href="mailto:' . $correo[$i] . '">' . $correo[$i] . '</a>';
    }

    $fila .= '</li>
    </ul>
    </div>';
    echo $fila;
}
