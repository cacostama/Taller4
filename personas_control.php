<?php

require 'clases/conexion.php';

session_start();

$sql = "select sp_personas(" . $_REQUEST['accion'] . "," . $_REQUEST['vper_cod'] . ",'" . $_REQUEST['vper_tipo'] . "','" . $_REQUEST['vper_estado'] . "','" . $_REQUEST['vper_nombres'] . "','" . $_REQUEST['vper_apellido'] . "','" . $_REQUEST['vper_direcc'] . "','" . $_REQUEST['vper_telefono'] . "','" . $_REQUEST['vper_tipodocumento'] . "','" . $_REQUEST['vper_documento'] . "') as resul";

$resultado = consultas::get_datos($sql);

if ($resultado[0]['resul'] != null) {
    $_SESSION['mensaje'] = $resultado[0]['resul'];
    header("location:personas_index.php");
} else {
    $_SESSION['mensaje'] = "Error:" . $sql;
    header("location:personas_index.php");
}
