<?PHP
include_once '../lib/ConexionBD.php';
$ConsultaProductos = "SELECT * FROM productos";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jats'uts Nook MANRIQUE</title>
    <!--Librerias externas-->
    <link rel="stylesheet" href="../css/LibCSSBootstrap/bootstrap.min.css">
    <link href="../css/LibCSSExtras/lightbox.min.css" rel="stylesheet" />
    <script src="../js/LibJSExtras/jquery.min.js"></script>
    <script src="../js/LibJSBootstrap/bootstrap.min.js"></script>
    <!--Librerias Propias-->
    <link rel="stylesheet" href="../css/Admindashboard.css">
    <script type="text/javascript" src="../js/DatosdelSelect.js"></script>

</head>
<body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-3 me-0 px-3" href="#">Jats'uts Nook MANRIQUE</a>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3 btn-danger" href="HomeAdmin.php">HOME</a>
            </div>
        </div>
    </header>

    <!--Contenedor registro de producto-->
    <div class="container-fuid Cont__NewProduct">
        <form id="form1" name="form1" class="was-validated FormularioNewProduc" action="../Validaciones/MetAddProduct.php" method="POST" enctype="multipart/form-data">
            <div class="TitleFormRegistro">
                <h4>Registrar nuevo producto</h4>
            </div>
            <div class="MisSelects">
                <!--CATEGORIAS-->
                <select id="SelectCat" name="FormScat" class="form-select SelectsForm_Register" aria-label="Default select example" onchange="SeleccionarSubcat(),SeleccionarTalla()">
                    <option value="0" selected>Categorias</option>
                    <option value="Infantiles">Infantiles</option>
                    <option value="Damas">Damas</option>
                    <option value="Caballeros">Caballeros</option>
                </select>
                <!--SUBCATEGORIAS-->
                <select id="SelectSubCat" name="FormSsubcat" class="form-select SelectsForm_Register" aria-label="Default select example">
                    <option value="0" selected>Subcategoria</option>
                </select>
            </div>
            <div class="Inputs1">
                <!--NOMBRE DEL PRODUCTO-->
                <input class="form-control"  name="FormTnomb" type="text" value="" accept="a-z" placeholder="Nombre del producto" aria-label="form-control">
            </div>
            <div class="Inputs2">
                <!--COLOR DEL PRODUCTO-->
                <div class="input-group mb-3 SeccionesRegistro">
                    <label for="exampleColorInput" class="form-label">Color</label>
                    <input type="color" name="FormTcol" class="form-control form-control-color Input__Color" id="exampleColorInput" value="" title="Seleccione el Color">
                </div>
                <!--PRECIO DEL PRODUCTO-->
                <div class="input-group mb-3 SeccionesRegistro">
                    <span class="input-group-text">$</span>
                    <input type="number" name="FormTprec" class="form-control" aria-label="Amount" value="" placeholder="Precio">
                    <span class="input-group-text">.00</span>
                </div>
                <!--TALLA DEL PRODUCTO-->
                <div class="mb-3 SeccionesRegistro">
                    <select id="SelectTalla" name="FormStalla" class="form-select" required aria-label="select example">
                        <option value="0" selected>Talla</option>
                    </select>
                    <div class="invalid-feedback">Validos{S, XS, L,...}</div>
                </div>
                <!--PIEZAS DEL PRODUCTO-->
                <div class="input-group mb-3 SeccionesRegistro">
                    <input type="number" name="FormTpza" class="form-control" aria-label="Amount" value="" placeholder="Cantidad">
                    <span class="input-group-text">Pzas.</span>
                </div>
            </div>
            <!--DESCRIPCION DEL PRODUCTO-->
            <div class="mb-3">
                <label for="validationTextarea" class="SubCat form-label">DESCRIPCIÓN</label>
                <textarea class="form-control is-invalid" name="FormTdesc" id="validationTextarea" value="" placeholder="Detalles del producto" rows="5" cols="50"required></textarea>
                <div class="invalid-feedback"></div>
            </div>
            <!--IMAGENES DEL PRODUCTO-->
            <div class="mb-3">
                <input id="ArchivoSeleccionado" name="FormFimg" type="file" class="form-control form-control-file" aria-label="file example" accept=".png,.jpeg,.jpg" value="" required>
                <div class="invalid-feedback">Seleccionar imagen {.png,.jpeg,.jpg}</div>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" name="btn_regisProd" type="submit">Registrar producto</button>
            </div>
        </form>
        <!--Contenedor Visualizar imagen seleccionada-->
        <div class="contenedorImagen">
            <img id="imagenPreview">
        </div>
    </div>





    <!--Contenedor Tabla para edicion de producto-->
    <div class="table-responsive Tabla__EditProd">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">Categoria</th>
                    <th scope="col">Subcategoria</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Talla</th>
                    <th scope="col">Color</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Piezas</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Accion</th>
                </tr>
            </thead>
            <tbody>
            <?PHP
$Contador = 0;
$ResConsulta = mysqli_query($conexion, $ConsultaProductos);
while ($rowAdProd = mysqli_fetch_assoc($ResConsulta)) {
    ?>
                <tr>
                    <td>
                        <?php echo $rowAdProd['Categoria']; ?>
                    </td>
                    <td>
                        <?php echo $rowAdProd['SubCateg']; ?>
                    </td>
                    <td>
                        <?php echo $rowAdProd['NombreProduc']; ?>
                    </td>
                    <td>
                        <?php echo $rowAdProd['Talla']; ?>
                    </td>
                    <td>
                        <?php echo $rowAdProd['ColorProduc']; ?>
                    </td>
                    <td>
                        <?php echo $rowAdProd['PrecioProducto']; ?>
                    </td>
                    <td>
                        <?php echo $rowAdProd['DetalleProducto']; ?>
                    </td>
                    <td>
                        <?php echo $rowAdProd['Existencia']; ?>
                    </td>
                    <td>
                        <img class="example-image IMG_Gallery" width="200" height="300" src="data:<?php echo $rowAdProd['ExtImg']; ?>;base64,<?php echo base64_encode($rowAdProd['ImgProducto']); ?>" alt="...">
                    </td>
                    <td>
                        <a href="#" class="actionLink">Update</a>
                        <a href="#" class="actionLink">Delete</a>
                    </td>
                </tr>
                    <?PHP
}
mysqli_free_result($ResConsulta);?>

            </tbody>
        </table>
    </div>

<!--///////////////////////////// Scripts para funciones  \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->
<!-- Scrip llenado contenedor previsualizacion imagen-->
    <script src="../js/PreviewImagenes.js"></script>
</body>
</html>