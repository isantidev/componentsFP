<?php
include '../config.php';

require ROOT_PATH . 'php/main.php';

if ($_POST) {
    // Recolección de datos
    $nombre_usu = (isset($_POST["nombre_usuario"]) ? $_POST["nombre_usuario"] : "");
    $apellido_usu = (isset($_POST["apellido_usuario"]) ? $_POST["apellido_usuario"] : "");
    $identificador_usu = (isset($_POST["identificador_usuario"]) ? $_POST["identificador_usuario"] : "");
    $contacto_usu = (isset($_POST["contacto_usuario"]) ? $_POST["contacto_usuario"] : "");
    $correo_usu = (isset($_POST["correo_usuario"]) ? $_POST["correo_usuario"] : "");
    $contrasena_usu = (isset($_POST["contrasena_usuario"]) ? $_POST["contrasena_usuario"] : "");

    $nombre_usu = limpiar_cadena($nombre_usu);
    $apellido_usu = limpiar_cadena($apellido_usu);
    $identificador_usu = limpiar_cadena($identificador_usu);
    $contacto_usu = limpiar_cadena($contacto_usu);
    $correo_usu = limpiar_cadena($correo_usu);

    $sql = "SELECT cc_id, email FROM datos_usuario;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $respuesta = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $validacion = "";
    foreach ($respuesta as $result) {
        if ($result['cc_id'] === $identificador_usu || $result['email'] === $correo_usu) {
            $validacion = true;
            exit();
        }
    }

    $nombre_completo_usu = $nombre_usu . " " . $apellido_usu;

    // Inserción de datos
    if ($validacion === "") {
        $sql2 = "INSERT INTO datos_usuario (cc_id, nombre_completo, email, contacto) VALUES (:id, :nombreCompleto, :correo, :contacto)";
        $stmt2 = $conn->prepare($sql2);

        if ($stmt2->execute([':id' => $identificador_usu, ':nombreCompleto' => $nombre_completo_usu, ':correo' => $correo_usu, ':contacto' => $contacto_usu])) {

            $sql_cuenta = "INSERT INTO cuenta_usuario (cc_id, email, contrasena) VALUES (:id, :email, :pass)";
            $stmt_cuenta = $conn->prepare($sql_cuenta);
            $stmt_cuenta->execute([':id' => $identificador_usu, ':email' => $correo_usu, ':pass' => $contrasena_usu]);

            $message = '<p class="aviso_correcto"> El usuario ha sido registrado correctamente </p>';
            header("Location: ../index.php");
        } else {
            $message = '<p class="aviso_incorrecto"> Ha sucedido un problema al registrar el usuario </p>';
            echo $message;
        }
    } else {
        $message = '<p class="aviso_incorrecto"> El usuario ya se encuentra registrado </p>';
        header("Location: ../index.php");
    }
}
