<?PHP
include_once '../lib/ConexionBD.php';
#$IdRecived = $_POST['id'];
$IdRecived = '4';

$ConsultProduct = "SELECT * FROM productos  WHERE idProductos='$IdRecived'";
#$ConsultComent = "SELECT * FROM comentarios WHERE Productos_idProductos='$IdRecived";

?>
<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/LibCSSBootstrap/bootstrap.min.css">
    <script src="../js/LibJSBootstrap/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/EstilosUsers/EstiloProductos.css">
    <style>
        *{
            box-sizing: border-box;
        }
        /* Header/logo Title */
        .header {
            background: #1abc9c;
            color: white;
        }
        /* Column container */
        .row {
            display: flex;
            flex-wrap: wrap;
        }

        /* Create two unequal columns that sits next to each other */
        /* Sidebar/left column */
        .side {
            flex: 25%;
            background-color: white;
            padding: 20px;
        }
        .s{
            margin-top: 50px;
            background-color: #f9e6f9;
        }
        #carouselExampleSlidesOnly{
            max-width: 900px;
            width: 100%;
        }
        .carr_Act{
            max-width: 850px;
            width: 100%;
        }
        /* Main column */
        .main1 {
            flex: 65%;
            background-color: white;
            padding: 20px;
        }
        /* Main column */
        .main2 {
            flex: 65%;
            background-color: white;
            padding: 20px;
        }

        /* Fake image, just for this example */
        .fakeimg {
            background-color: #f9e6f9;
            width: 100%;
            padding: 20px;
        }
        .CarIMG{
            margin-left: 225px;
        }

        /* Responsive layout - when the screen is less than 700px wide, make the two columns stack on top of each other instead of next to each other */
        @media (max-width: 700px) {
            .row, .navbar {
                flex-direction: column;
            }
        }
        @media (max-width: 1200px) {
          .CarIMG{
              margin-left: 180px;
          }
        }
        @media (max-width: 1000px) {
          .CarIMG{
            margin-left: 110px;
          }
        }
        @media (max-width: 900px) {
          .CarIMG{
            margin-left: 80px;
          }
        }
        @media (max-width: 500px) {
          .CarIMG{
            margin-left: 30px;
          }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="../recursos/IMG/LogoOfi.png" alt="" id="Img__Oficial"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="nav-link btn btn-outline-success NavBarIndex__GrupBTNs" aria-current="page" href="VistaProductsUsers.php">HOME</a>
            </div>
        </nav>
    </div>

    <!-- The flexible grid (content) -->
    <div class="row">
    <?PHP
$ResultDetalles = mysqli_query($conexion, $ConsultProduct);
while ($ROWdetalle = mysqli_fetch_assoc($ResultDetalles)) {?>
        <div class="main1">
            <h2><?PHP echo $ROWdetalle['NombreProduc']; ?></h2>
            <div class="fakeimg" style="height:500px;">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner ">
                        <div class="carousel-item active carr_Act">
                            <img class="img-fluid d-block w-100 CarIMG" style="max-width: 400px; max-height: 450px;" src="data:<?php echo $ROWdetalle['ExtImg']; ?>;base64,<?php echo base64_encode($ROWdetalle['ImgProducto']); ?>"alt="...">
                        </div>
                        <div class="carousel-item carr_Act">
                            <img class="img-fluid d-block w-100 CarIMG" style="max-width: 400px; max-height: 450px;" src="data:<?php echo $ROWdetalle['ExtImg']; ?>;base64,<?php echo base64_encode($ROWdetalle['ImgProducto']); ?>"alt="...">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="side">
            <div class="s">
                <!--Contenedor donde muestra precio.nombre,y un boton de comprar(Que redirige al login)-->
                <div class="Cont_Nombre">
                    <?PHP echo $ROWdetalle['NombreProduc']; ?>
                </div>
                <div class="Cont_Precio">
                    <?PHP echo $ROWdetalle['PrecioProducto']; ?>
                </div>
                <div class="Cont_Btn">
                    <a class="btn btn-outline-primary" href="LogIn.php">Comprar</a>
                </div>
                <div class="Cont_Reseñas"></div>
            </div>
        </div>
        <div class="main2">
            <h2>Descripcion</h2>
            <div style="height:200px; width:70%;">
                <div class="Cont_Talla">
                    <?PHP echo $ROWdetalle['Talla']; ?>
                </div>
                <div class="Cont_Color">
                    <input type="color" class="form-control form-control-color" id="exampleColorInput" value="<?PHP echo $ROWdetalle['ColorProduc']; ?>" title="Choose your color">
                </div>
                <div class="Cont_Detalle">
                    <?PHP echo $ROWdetalle['DetalleProducto']; ?>
                </div>
            </div>
        </div>
        <?PHP }
mysqli_free_result($ResultDetalles);?>
    </div>
</body>
</html>

