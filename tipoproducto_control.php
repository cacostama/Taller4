<?php

require 'clases/conexion.php';

session_start();

$sql = "select sp_tipoproductos(" . $_REQUEST['accion'] . "," . $_REQUEST['vtip_id'] . ",'" . $_REQUEST['vtip_descri'] . "') as resul";

$resultado = consultas::get_datos($sql);

if ($resultado[0]['resul'] != null) {
    $_SESSION['mensaje'] = $resultado[0]['resul'];
    header("location:tipoproducto_index.php");
} else {
    $_SESSION['mensaje'] = "Error:" . $sql;
    header("location:tipoproducto_index.php");
}
