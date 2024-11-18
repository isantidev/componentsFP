<?php
include '../config.php';
require ROOT_PATH . 'php/main.php';

$fila = '';
$usuario = $conn->prepare("SELECT * FROM datos_usuario;");
$usuario->execute();

if ($usuario->rowCount() > 0) {
    $datosUsuario = $usuario->fetchAll(PDO::FETCH_ASSOC);
    foreach ($datosUsuario as $row) {
        $fila = '
        <div class="usuario_fila_contenedor">
            <ul class="usuario_fila">
                <li class="usuario_columna">

                    <img src=';
        $fila .= '"/images/logo.jpg" alt="' . $row["nombre_completo"] . '">';
        $fila .= '</li>
                <li class="usuario_columna">
                    <p data-texto="Nombre: ">' . $row["nombre_completo"] . '</p>
                </li>
                <li class="usuario_columna">
                    <p data-texto="Identificador: ">' . $row["cc_id"] . '</p>
                </li>
                <li class="usuario_columna columna_correo">
                    <a href="mailto:' . $row["email"] . '" data-texto="Correo: ">' . $row["email"] . '</a>
                </li>
                <li class="usuario_columna columna_contacto">
                    <a href="tel:' . $row["contacto"] . '" data-texto="Contacto: ">' . $row["contacto"] . '</a>
                </li>
            </ul>
        </div>';
        echo $fila;
    }
}

?>
<p style="display: none;"></p>