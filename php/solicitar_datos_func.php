<?php

function solicitarDatos($datos, $tabla, $conexion)
{
    $sql = "SELECT $datos FROM $tabla";
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    $row = $stmt->rowCount();
    $resultados = ($row > 0) ? $stmt->fetchAll(PDO::FETCH_ASSOC) : 0;
    return ['row' => $row, 'resultado' => $resultados];
}
