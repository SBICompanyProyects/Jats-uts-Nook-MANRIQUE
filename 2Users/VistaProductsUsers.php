<?PHP
include_once '../lib/ConexionBD.php';
session_start();

if (!isset($_SESSION['rol'])) {
    header('location: ../Login.php');
} else {
    if ($_SESSION['rol'] != 2) {
        header('location: ../Login.php');
    }
}
if (isset($_POST['LogOut']) == 1) {
    # code...
    session_unset();
    session_destroy();
    header("location:../index.php");
}

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
    <link rel="stylesheet" href="../css/LibCSSBootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../css/EstilosUsers/EstiloProductos.css">
    <script src="js/LibJSBootstrap/bootstrap.min.js"></script>
</head>

<body>
    <!--//////////////////////////OBJETOS DE LA CABECERA\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="HomeUser.php"><img src="../recursos/IMG/LogoOfi.png" alt="" id="Img__Oficial"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse DIV__BTNsINDEX" id="navbarScroll">
                    <form class="d-flex">
                        <input class="form-control me-2 NavBarIndex__InputBuscar" type="search" placeholder="Buscar producto..." aria-label="Search">
                        <button class="btn btn-outline-success NavBarIndex__GrupBTNs" type="submit">Buscar&#128270;</button>
                    </form>
                    <form method="POST" class="carrito btn__Principal form-inline justify-content-md-end">
                        <input type="hidden" name="LogOut" value="1">
                        <input type="submit" class="btn btn-danger" value="Cerrar Sesión">
                    </form>
                    <button type="button" id="btn_Carrito" class="btn btn-primary position-relative" onclick="location.href = 'Carrito.php'">
                        <svg xmlns="../recursos/BT_Icon/Basket2.svg" width="16" height="16" fill="currentColor" class="bi bi-basket2" viewBox="0 0 16 16">
                            <path d="M4 10a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 1 1 2 0v2a1 1 0 0 1-2 0v-2z"/>
                            <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-.623l-1.844 6.456a.75.75 0 0 1-.722.544H3.69a.75.75 0 0 1-.722-.544L1.123 8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.163 8l1.714 6h8.246l1.714-6H2.163z"/>
                        </svg>
                        <span id="text" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    </button>
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
                    <h5 class="card-title"><a href="DetallesProductUsers.php" class="A__Products"><?php echo $rowBusqueda['NombreProduc']; ?></a></h5>
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
                        <svg src="recursos/BT_Icon/credit_cart_2_bllack_fill.svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card-2-back-fill" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5H0V4zm11.5 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2zM0 11v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1H0z"/>
                        </svg>
                        <a href="Pagos.php?idprod=<?PHP echo $rowBusqueda['idProductos']; ?>" class="A__Products">Comprar</a>
                    </button>
                    <button type="button" class="btn btn-outline-success btn_Info" onclick="Addspan()">
                        <svg src="recursos/BT_Icon/cart_plus_fill.svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                        <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z"/>
                        </svg>
                        Agregar
                    </button>
                </div>
            </div>
        </div>
        <?php }
mysqli_free_result($Busqueda);?>
    </div>
    <script src="../js/CarritoJS/Funciones.js"></script>
</body>
</html>