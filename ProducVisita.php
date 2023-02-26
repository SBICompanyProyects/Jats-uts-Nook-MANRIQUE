<?PHP
include_once 'lib/ConexionBD.php';

#$VarBusqueda = $_POST['BuscarProd'];
$MisProduc = "SELECT * FROM productos";
#$Misbusquedas = "SELECT * FROM productos WHERE NombreProduc = '$VarBusqueda'";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jats'uts Nook MANRIQUE products</title>
    <link rel="stylesheet" href="css/LibCSSBootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/StyleIndex.css">
    <script src="js/LibJSBootstrap/bootstrap.min.js"></script>
</head>

<body>
    <!--//////////////////////////OBJETOS DE LA CABECERA\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><img src="recursos/IMG/LogoOfi.png" alt="" id="Img__Oficial"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse DIV__BTNsINDEX" id="navbarScroll">
                    <form class="d-flex">
                        <input class="form-control me-2 NavBarIndex__InputBuscar" type="search" placeholder="Buscar producto..." aria-label="Search">
                        <button class="btn btn-outline-success NavBarIndex__GrupBTNs" type="submit">Buscar&#128270;</button>
                    </form>
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                        <li class="nav-item">
                        <a class="nav-link btn btn-outline-success NavBarIndex__GrupBTNs" aria-current="page" href="LogIn.php">Registrar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>



    <div class="row row-cols-1 row-cols-md-3 g-4 Div__produc__visita">
    <?PHP
$Busqueda = mysqli_query($conexion, $MisProduc);
while ($rowBusqueda = mysqli_fetch_assoc($Busqueda)) {?>
        <div class="col-2">
            <div class="card h-100">
                <a href="DetallesVisita.php" class="A__Products">
                    <img class="card-img-top" width="150" height="200" src="data:<?php echo $rowBusqueda['ExtImg']; ?>;base64,<?php echo base64_encode($rowBusqueda['ImgProducto']); ?>"alt="...">
                </a>
                <div class="card-body">
                    <h5 class="card-title"><a href="DetallesVisita.php" class="A__Products"><?php echo $rowBusqueda['NombreProduc']; ?></a></h5>
                    <p class="card-text">
                        Precio: <?php echo $rowBusqueda['PrecioProducto']; ?>
                        <svg src="recursos/BT_Icon/tags-fill.svg" width="16" height="16" fill="currentColor" class="bi bi-tags-fill" viewBox="0 0 16 16">
                            <path d="M2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2zm3.5 4a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                            <path d="M1.293 7.793A1 1 0 0 1 1 7.086V2a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l.043-.043-7.457-7.457z"/>
                        </svg>
                    </p>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-outline-info btn_Info">
                        <svg src="recursos/BT_Icon/info-circle.svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                        </svg>
                        <a href="DetallesVisita.php" class="A__Products">Más Detalles</a>
                    </button>
                </div>
            </div>
        </div>
        <?php }
mysqli_free_result($Busqueda);?>
    </div>

</body>

</html>
