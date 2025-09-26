<?php
include '../config.php';
require ROOT_PATH . 'php/main.php';

session_start();
$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnIngresar'])) {
    $email = $_POST['correo-usuario'];
    $contrasena = $_POST['clave-usuario'];

    if (!empty($errores)) {
        $_SESSION['errores'] = $errores;
        header('Location: ../frontend/iniciar_sesion_form.php');
        exit();
    }

    $private = $conn->prepare("SELECT * FROM cuenta_usuario WHERE email = :correo");
    $private->execute(['correo' => $email]);
    $privateUsu = $private->fetch(PDO::FETCH_ASSOC);

    if ($email === $privateUsu['email'] && $contrasena === $privateUsu['contrasena']) {

        $userId = $privateUsu['cc_id'];
        $newStmt = $conn->prepare("SELECT * FROM datos_usuario WHERE cc_id = :id");
        $newStmt->execute(['id' => $userId]);
        $usuarioInfo = $newStmt->fetch();

        $_SESSION['usuario'] = [
            'id' => $usuarioInfo['cc_id'],
            'nombre' => $usuarioInfo['nombre_completo'],
            'correo' => $usuarioInfo['email'],
            'contacto' => $usuarioInfo['contacto'],
        ];
        header('Location: ../index.php');
        exit();
    } else {
        $errores['ingreso'] = "Usuario o contrasena invalidos";
        $_SESSION['errores'] = $errores;
        header('Location: ../frontend/iniciar_sesion_form.php');
        exit();
    }
}
