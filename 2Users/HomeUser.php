<?PHP
include_once '../lib/ConexionBD.php';
$MisFavoritos = "SELECT * FROM productos limit 9";
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

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jats'uts Nook MANRIQUE</title>
    <link rel="stylesheet" href="../css/EstilosUsers/StylesUsersHome.css">
    <link rel="stylesheet" href="../css/LibCSSBootstrap/bootstrap.min.css">
    <link href="../css/LibCSSExtras/lightbox.min.css" rel="stylesheet" />
    <script src="../js/LibJSExtras/jquery.min.js"></script>
    <script src="../js/LibJSBootstrap/bootstrap.min.js"></script>
</head>
<body>
    <!--//////////////////////////OBJETOS DE LA CABECERA\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="../recursos/IMG/LogoOfi.png" alt="" id="Img__Oficial"></a>
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
                        <a class="nav-link btn btn-outline-success NavBarIndex__GrupBTNs" aria-current="page" href="VistaProductsUsers.php">PRODUCTOS</a>
                    </li>
                </ul>
                <form method="POST" class="carrito btn__Principal form-inline justify-content-md-end">
                    <input type="hidden" name="LogOut" value="1">
					<input type="submit" class="btn btn-danger" value="Cerrar Sesión">
                </form>
            </div>
        </div>
    </nav>

        <!--//////////////////////////OBJETOS DEL CUERPO\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->
    <div class="container-fluid ContenedorPortada">
        <!--Seccion del Quienes somos-->
        <section class="Secciones__Portada">
            <header class="pb-3 mb-4 border-bottom">
                <a href="#" class="d-flex align-items-center text-dark text-decoration-none">
                    <span class="fs-4">Bienvenido</span>
                </a>
            </header>
            <div class="p-5 mb-4 rounded-3 Jumbo">
                <div class="container-fluid py-5 Jumbo">
                    <div class="ImgHome">
                        <img src="../recursos/IMG/post.png" class="ImgHome" alt="">
                    </div>
                    <div class="ImgHome">
                        <h1 class="display-5 fw-bold">¿Quiénes somos?</h1>
                    </div>
                    <div class="ImgHome">
                        <p class="col-md-12 fs-4">Una empresa dedicada a la promocion y venta de ropa artesanal, elaborada por manos de artesanos Yucatecos y Campechanos.</p>
                    </div>
                </div>
            </div>
        </section>
        <!--Seccion Se muestra la galeria de mas vendidos-->
        <section class="Secciones__Portada">
            <div class="container__Galeria">
                <h3>
                    <img src="../recursos/BT_Icon/star-fill.svg" alt="Bootstrap" width="12" height="12">
                    <img src="../recursos/BT_Icon/star-fill.svg" alt="Bootstrap" width="25" height="25">
                    <img src="../recursos/BT_Icon/star-fill.svg" alt="Bootstrap" width="32" height="32"> RECOMENDADOS
                    <img src="../recursos/BT_Icon/star-fill.svg" alt="Bootstrap" width="32" height="32">
                    <img src="../recursos/BT_Icon/star-fill.svg" alt="Bootstrap" width="32" height="25">
                    <img src="../recursos/BT_Icon/star-fill.svg" alt="Bootstrap" width="32" height="12">
                </h3>
            </div>
            <div class="container__Galeria">
                <?PHP
$ResFav = mysqli_query($conexion, $MisFavoritos);
while ($rowFav = mysqli_fetch_assoc($ResFav)) {?>
                    <a class="example-image-link" href="#" data-lightbox="example-set" data-title="">
                    <img class="example-image IMG_Gallery" width="200" height="300" src="data:<?php echo $rowFav['ExtImg']; ?>;base64,<?php echo base64_encode($rowFav['ImgProducto']); ?>"alt="...">
                </a>
                    <?PHP }
mysqli_free_result($ResFav);?>
            </div>
        </section>
        <!--Seccion De los VALORES que rigen nuestra empresa-->
        <section class="Secciones__Portada">
            <div class="container__Valores">
                <div class="row">
                    <div class="col ContPortada">
                        <div class="card-body">
                            <h5 class="card-title">MISIÓN</h5>
                            <p class="card-text">"Transmitir el gusto y la pasión por la cultura Maya y tradicional a través de la ropa artesanal".</p>
                        </div>
                    </div>
                    <div class="col ContPortada">
                        <div class="card-body">
                            <h5 class="card-title">VISIÓN</h5>
                            <p class="card-text">"Ser lideres en la categoría de venta de ropa y accesorios artesanales para Damas y Caballeros, lográndolo con trabajo continuo en la calidad de nuestras prendas".</p>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col ContPortada">
                        <div class="card-body">
                            <h5 class="card-title">VALORES IMPORTANTES</h5>
                            <p class="card-text">
                                <ul>
                                    <li>Respeto</li>
                                    <li>Responsabilidad</li>
                                    <li>Amabilidad</li>
                                    <li>Higiene</li>
                                    <li>Eficiencia</li>
                                    <li>Integridad</li>
                                </ul>
                            </p>
                        </div>
                    </div>
                    <div class="col ContPortada">
                        <h5 class="card-title">UBICACIÓN</h5>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d778.1627150035471!2d-90.7249823708374!3d19.343506964582684!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85f7705ad1ed94ef%3A0x7fea2a80a600916a!2sC.%205%20850%2C%20Venustiano%20Carranza%2C%2024400%20Champot%C3%B3n%2C%20Camp.!5e1!3m2!1ses!2smx!4v1619407075849!5m2!1ses!2smx"
                            width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        <p>Calle 5 entre Av.Luis Donaldo y Calle 8, Colonia Champotón, Campeche</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!--//////////////////////////OBJETOS DEL PIE DE PÁGINA\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->
    <div class="container-fluid">
        <footer class="pt-3 mt-4 text-muted border-top Footer__Portada">
            <div class="contenedor__Footer">
                <h6>&copy; 2021. SBI Company. <i>Terminos & condiciones.</i></h6>
            </div>
            <div class="contenedor__Footer">
                <ul class="Lista__Footer">
                    <li class="ItemLista__Footer">
                        <a href="" class="LinkLista__Footer" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Email</a>
                        <img src="../recursos/BT_Icon/envelope-open-fill.svg" alt="Bootstrap" width="20" height="20">
                    </li>
                    <li class="ItemLista__Footer">
                        <a href="#" class="LinkLista__Footer" type="button" data-bs-toggle="modal" data-bs-target="#exampleModa2" data-bs-whatever="@getbootstrap">Teléfono</a>
                        <img src="../recursos/BT_Icon/headset.svg" alt="Bootstrap" width="20" height="20">
                    </li>
                    <li class="ItemLista__Footer">
                        <a href="https://www.facebook.com/Jats'uts%20nook'Manrique" class="LinkLista__Footer" target="_blank"><img src="../recursos/BT_Icon/facebook.svg" alt="Bootstrap" width="20" height="20"></a>
                        <a href="https://www.instagram.com/jats_uts_nook_manrique/" class="LinkLista__Footer" target="_blank"><img src="../recursos/BT_Icon/instagram.svg" alt="Bootstrap" width="20" height="20"></a>
                        <a href="https://web.whatsapp.com/" class="LinkLista__Footer" target="_blank"><img src="../recursos/BT_Icon/whatsapp.svg" alt="Bootstrap" width="20" height="20"></a>
                    </li>
                </ul>
            </div>
        </footer>
    </div>
    <!-- ÁREA DE LOS MODALS UTILIZADOS-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Contactanos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Destinatario:</label>
                            <input type="text" class="form-control" id="recipient-name" value="suppotteam@Jatsutsnookmanrique" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Mensaje:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Enviar Mensaje</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModa2" tabindex="-1" aria-labelledby="exampleModalLabe2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabe2">Contactanos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Destinatario:</label>
                            <input type="text" class="form-control" id="recipient-name2" value="+52 982-119-4973" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Mensaje:</label>
                            <textarea class="form-control" id="message-text2"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Enviar Mensaje</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ÁREA DE LOS ESCRIPTS UTILIZADOS-->
    <script src="../js/LibJSExtras/lightbox.min.js"></script>
</body>
</html>