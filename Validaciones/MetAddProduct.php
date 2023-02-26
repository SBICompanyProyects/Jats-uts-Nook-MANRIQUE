<?php
include_once '../lib/ConexionBD.php';
if (isset($_FILES['FormFimg']['name'])) {
    $TipoArchivo = $_FILES['FormFimg']['type'];
    $NombreArchivo = $_FILES['FormFimg']['name'];
    $TamanoArchivo = $_FILES['FormFimg']['size'];
    $ImagenSubida = fopen($_FILES['FormFimg']['tmp_name'], 'r');
    $BinariosImagen = fread($ImagenSubida, $TamanoArchivo);
    $WipeBinarios = mysqli_escape_string($conexion, $BinariosImagen);

    $Categoria = trim($_POST['FormScat']);
    $SubCategoria = trim($_POST['FormSsubcat']);
    $Nombre = trim($_POST['FormTnomb']);
    $Talla = trim($_POST['FormStalla']);
    $Color = trim($_POST['FormTcol']);
    $Precio = trim($_POST['FormTprec']);
    $Detalles = trim($_POST['FormTdesc']);
    $Existencias = trim($_POST['FormTpza']);

    $query = "INSERT INTO productos (Categoria,SubCateg,NombreProduc,Talla,ColorProduc,PrecioProducto,DetalleProducto,Existencia,ImgProducto,ExtImg)
        VALUES ('" . $Categoria . "','" . $SubCategoria . "','" . $Nombre . "','" . $Talla . "','" . $Color . "','" . $Precio . "','" . $Detalles . "','" . $Existencias . "','" . $WipeBinarios . "','" . $TipoArchivo . "')";

    $ResulRegistro = mysqli_query($conexion, $query);
    if ($ResulRegistro) {
        header('location:../1Admin/AdminProductos.php');
    } else {
        echo '<script>alert("ERROR al registrar");}</script>', mysqli_error($conexion);
    }
}
