<?php

require 'clases/conexion.php';
session_start();

$sql = "select sp_presentacion(" . $_REQUEST['accion'] . "," . $_REQUEST['vpre_id']
    . ",'" . $_REQUEST['vpre_descri'] . "'," . (!empty($_REQUEST['vmed_id']) ? $_REQUEST['vmed_id'] : "0") . ") as resul";

$resultado = consultas::get_datos($sql);

if ($resultado[0]['resul'] != null) {
    $_SESSION['mensaje'] = $resultado[0]['resul'];
    header("location:presentaciones_index.php");
} else {
    $_SESSION['mensaje'] = "Error:" . $sql;
    header("location:presentaciones_index.php");
}
