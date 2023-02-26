<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Tienda </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="../css/StilCart/bootstrap.min.css">
    <link rel="stylesheet" href="../css/StilCart/magnific-popup.css">
    <link rel="stylesheet" href="../css/StilCart/jquery-ui.css">
    <link rel="stylesheet" href="../css/StilCart/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/StilCart/owl.theme.default.min.css">


    <link rel="stylesheet" href="../css/StilCart/aos.css">

    <link rel="stylesheet" href="../css/StilCart/style.css">

  </head>
  <body>
  <header class="site-navbar" role="banner">
      <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
              <form action="" class="site-block-top-search">
                <span class="icon icon-search2"></span>
                <input type="text" class="form-control border-0" placeholder="Search" disabled>
              </form>
            </div>
            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
              <div class="site-logo">
                <a href="index.php" class="js-logo-clone"><img src="../recursos/IMG/LogoOfi.png" width="300" height="100" alt=""></a>
              </div>
            </div>
            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
              <div class="site-top-icons">
                <ul>
                  <li><a href="#"><span class="icon icon-person"></span></a></li>
                  <li><a href="#"><span class="icon icon-heart-o"></span></a></li>
                  <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
  <div class="site-wrap">
    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail">Imagen</th>
                    <th class="product-name">Producto</th>
                    <th class="product-price">Precio</th>
                    <th class="product-quantity">Cantidad</th>
                    <th class="product-total">Total</th>
                    <th class="product-remove">Borrar</th>
                  </tr>
                </thead>
                <tbody>
<?PHP
include_once '../lib/ConexionBD.php';
$Cons = "SELECT * FROM productos limit 4";
$Total = 0;
$consQuery = mysqli_query($conexion, $Cons);

while ($row = mysqli_fetch_assoc($consQuery)) {?>
                  <tr>
                    <td class="product-thumbnail">
                      <img class="card-img-top" width="150" height="200" src="data:<?php echo $row['ExtImg']; ?>;base64,<?php echo base64_encode($row['ImgProducto']); ?>"alt="...">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black"><?PHP echo $row['NombreProduc']; ?></h2>
                    </td>
                    <td>
                      <?PHP echo $row['PrecioProducto']; ?>
                    </td>
                    <td>
                      <div class="input-group mb-3" style="max-width: 120px;">
                        <div class="input-group-prepend">
                          <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                        </div>
                        <input type="text" class="form-control text-center" value="<?PHP echo $row['Existencia']; ?>" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        <div class="input-group-append">
                          <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                        </div>
                      </div>
                    </td>
                    <td>
                        subtotal
                        <?PHP $Total += $row['PrecioProducto'];?>
                    </td>
                    <td>
                      <a href="#" class="btn btn-primary btn-sm">X</a>
                    </td>
                  </tr>
                    <?PHP }
mysqli_free_result($consQuery);?>
                </tbody>
              </table>
            </div>
          </form>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-6">
                <button class="btn btn-outline-primary btn-sm btn-block" onclick="location.href='VistaProductsUsers.php'" >Seguir comprando</button>
              </div>
            </div>
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">TOTAL</h3>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">Subtotal</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">$<?PHP echo $Total; ?></strong>
                  </div>
                </div>
                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Total</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">$<?PHP echo $Total; ?></strong>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black"></strong>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='PagosCarrito.php'">Proceder a Pagar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <script src="../js/StilJs/jquery-3.3.1.min.js"></script>
  <script src="../js/StilJs/jquery-ui.js"></script>
  <script src="../js/StilJs/popper.min.js"></script>
  <script src="../js/StilJs/bootstrap.min.js"></script>
  <script src="../js/StilJs/owl.carousel.min.js"></script>
  <script src="../js/StilJs/jquery.magnific-popup.min.js"></script>
  <script src="../js/StilJs/aos.js"></script>

  <script src="../js/StilJs/main.js"></script>

  </body>
</html>
