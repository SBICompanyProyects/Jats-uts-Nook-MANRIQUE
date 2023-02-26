<?php
$host = 'localhost';
$user = 'root';
$key = '1111';
$NameDB = 'bdjatsutsnookmanrique';
$Charset = 'utf8';

$conexion = mysqli_connect($host, $user, $key, $NameDB);
mysqli_set_charset($conexion, $Charset);
/*
if (!$conexion) {
# code...
echo "Error al conectarse a la BD: '$NameDB'";
} else {
echo "Conectado a la Base de datos: '$NameDB' ";
}
 */
