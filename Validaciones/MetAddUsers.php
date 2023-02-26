<?php
include_once '../lib/ConexionBD.php';
$TipoUser = trim('2');
$UsName = trim($_POST['nombre']);
$UsApePat = trim($_POST['primerapellido']);
$UsApeMat = trim($_POST['segundoapellido']);
$UsNacim = trim($_POST['nacimiento']);
$UsCP = trim($_POST['codigopostal']);
$UsState = trim($_POST['estado']);
$UsCountry = trim($_POST['municipio']);
$UsAddres = trim($_POST['direccion']);
$UsPhone = trim($_POST['telefono']);
$UsEmail = trim($_POST['correo']);
$UsPass = md5(trim($_POST['contraseña']));
$UsReference = trim($_POST['referencias']);
if ($_POST['contraseña'] == $_POST['vercontraseña']) {

    $queryNewUser = "INSERT INTO usuarios (TipoUsuario_idTipoUsuario,Nombre,ApePat,ApeMat,Nacimiento,CodPostal,Estado,Municipio,Direccion,Telefono,Correo,ClaveSeguridad,Referencia)
    VALUES ('" . $TipoUser . "','" . $UsName . "','" . $UsApePat . "','" . $UsApeMat . "','" . $UsNacim . "','" . $UsCP . "','" . $UsState . "','" . $UsCountry . "','" . $UsAddres . "','" . $UsPhone . "','" . $UsEmail . "','" . $UsPass . "','" . $UsReference . "')";

    $ResulRegistro = mysqli_query($conexion, $queryNewUser);
    if ($ResulRegistro) {
        echo '<script language="javascript">alert("Registro Exitoso"); return false;</script>';
        header('location:../LogIn.php');
    } else {
        echo '<script>alert("ERROR al registrar");}</script>', mysqli_error($conexion);
    }

}
