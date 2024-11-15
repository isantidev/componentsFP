<?php
include '../config.php';
require_once ROOT_PATH . 'php/main.php';

session_start();
$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnIngresar'])) {
    if ($conn) {
    }
}
