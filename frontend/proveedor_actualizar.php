<?php
include '../config.php';
require ROOT_PATH . 'php/main.php';

$proveedor_info = 'SELECT * FROM proveedor ORDER BY nombre';
$stmt = $conn->prepare($proveedor_info);
$stmt->execute();
$proveedores = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include ROOT_PATH . 'inc/head.php' ?>
    <link rel="stylesheet" href="../styles/proveedor_actualizar.css">
</head>

<body>
    <header>
        <?php include ROOT_PATH . 'inc/nav_bar.php' ?>
    </header>
    <main>
        <div class="contenedor_titulo">
            <h2>Actualizar Informacion</h2>
            <p>Proveedor</p>
        </div>
        <div class="wrapper_proveedor_actualizar">
            <div class="selected_proveedor_input">
                <label for="select_proveedor_id_edit">Proveedor a Editar: </label>
                <select name="select_id_proveedor" id="select_proveedor_id_edit">
                    <option value="" selected disabled>Seleccione un Proveedor</option>
                    <?php
                    foreach ($proveedores as $proveedor) {
                        $option_proveedor = '<option value="' . $proveedor['proveedor_id']
                            . '">' . $proveedor['nombre'] . '</option>';
                        echo $option_proveedor;
                    }
                    ?>
                </select>
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", async () => {
                    let proveedores = [];

                    try {
                        // Solicitar los datos desde proveedor_info.php
                        const response = await fetch("../php/solicitud_datos/proveedor_info.php");
                        proveedores = await response.json();

                        const getValueSelected = document.getElementById('select_proveedor_id_edit');

                        getValueSelected.addEventListener('change', () => {
                            const currentProveedorId = getValueSelected.value || 0;
                            const elemento_info = document.getElementById('current_id_proveedor');
                            const inputProveedorNombre = document.getElementById('proveedor_nombre_edit');
                            const inputProveedorContacto = document.getElementById('proveedor_contacto_edit');
                            const inputProveedorDireccion = document.getElementById('proveedor_direccion_edit');
                            const inputProveedorPaginaWeb = document.getElementById('proveedor_pagina_edit');
                            const inputProveedorCorreo = document.getElementById('proveedor_correo_edit');

                            const current_proveedor = proveedores.find(proveedor => proveedor.proveedor_id == currentProveedorId);

                            if (currentProveedorId !== 0) {
                                elemento_info.value = currentProveedorId;
                                inputProveedorNombre.value = current_proveedor.nombre;
                                inputProveedorContacto.value = current_proveedor.contacto;
                                inputProveedorDireccion.value = current_proveedor.direccion;
                                inputProveedorPaginaWeb.value = current_proveedor.pagina_web;
                                inputProveedorCorreo.value = current_proveedor.correo;
                            }
                        })

                    } catch (error) {
                        console.error("Error al cargar los productos:", error);
                        return;
                    }
                });
            </script>
            <div class="contenedor_form_proveedor">
                <form action="../php/actualizar_proveedor.php" class="proveedor_form" method="post">
                    <input type="number" name="proveedor_current_id" id="current_id_proveedor" style="display: none;">
                    <div class="contenedor_input ctn-nombre">
                        <label for="proveedor_nombre_edit">Nombre del proveedor:</label>
                        <input type="text" name="nombre_proveedor" id="proveedor_nombre_edit" placeholder="Stocksoft Productos" autocomplete="off" required>
                    </div>
                    <div class="contenedor_input ctn-contacto">
                        <label for="proveedor_contacto_edit">Contacto del proveedor:</label>
                        <input type="number" name="contacto_proveedor" id="proveedor_contacto_edit" placeholder="3001112233" autocomplete="off" required>
                    </div>
                    <div class="contenedor_input ctn-direccion">
                        <label for="proveedor_direccion_edit">Direccion del proveedor: </label>
                        <input type="text" name="direccion_proveedor" id="proveedor_direccion_edit" placeholder="Calle 0 # 00 - 00, Bogotá" autocomplete="off">
                    </div>
                    <div class="contenedor_input ctn-web">
                        <label for="proveedor_pagina_edit">Página web del proveedor: </label>
                        <input type="text" name="web_proveedor" id="proveedor_pagina_edit" placeholder="www.stocksoft.com" autocomplete="off">
                    </div>
                    <div class="contenedor_input ctn-correo">
                        <label for="proveedor_correo_edit">Correo del proveedor: </label>
                        <input type="email" name="correo_proveedor" id="proveedor_correo_edit" placeholder="stocksoft@example.com" autocomplete="off">
                    </div>

                    <div class="contenedor_input btn_enviar">
                        <button type="submit">Actualizar Proveedor</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <footer>
        <?php include ROOT_PATH . 'inc/footer.php' ?>
    </footer>
</body>

</html>