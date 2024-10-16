<?php
include '../config.php';

$servername = 'localhost';
$dbname = 'stocksoft';
$username = 'root';
$password = 'santi123';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exp) {

    echo "Error de conexión: " . $exp->getMessage();
}

function limpiar_cadena($cadena)
{
    $cadena = trim($cadena);
    $cadena = stripslashes($cadena);

    $patrones_peligrosos = [
        "<script>",
        "</script>",
        "<script src",
        "<script type=",
        "<?php",
        "?>",
        "--",
        "^",
        "<",
        "[",
        "]",
        "==",
        ";",
        "::",
        "SELECT * FROM",
        "DELETE FROM",
        "INSERT INTO",
        "DROP TABLE",
        "DROP DATABASE",
        "TRUNCATE TABLE",
        "SHOW TABLES;",
        "SHOW DATABASES;"
    ];

    $cadena = str_ireplace($patrones_peligrosos, "", $cadena);

    return $cadena;
}
