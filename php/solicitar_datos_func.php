<?php

function solicitarDatos($tabla, $conexion)
{
    $sql = "SELECT * FROM $tabla";
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    $row = $stmt->rowCount();
    $resultados = ($row > 0) ? $stmt->fetchAll(PDO::FETCH_ASSOC) : 0;
    return ['row' => $row, 'resultado' => $resultados];
}
