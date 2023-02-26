<?PHP
include_once '../lib/ConexionBD.php';
$IDS = $_GET['idprod'];
$ConsCarrito = "SELECT * FROM productos WHERE idProductos = '$IDS'";
?>
<!DOCTYPE html>
<!-- saved from url=(0052)https://getbootstrap.com/docs/5.0/examples/checkout/ -->
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PAGOS</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/LibCSSBootstrap/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="theme-color" content="#F50087">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


    <!-- Custom styles for this template -->
    <link href="../css/Carrito/form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">

<div class="container">
  <main>
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="../recursos/IMG/LogoOfi.png" alt="" width="300" height="100">
      <h2>Metodo de pago</h2>
      <p class="lead"> <i>Meditación, yoga, ejercicio y comer bien. Ese es mi bienestar. Y creo que de vez en cuando hay que darse un gusto, así que si necesitas ir de compras, ven a hacerte las compras.</i></p>
    </div>
    <?PHP
$Total = 0;
$ResCompra = mysqli_query($conexion, $ConsCarrito);
if ($sentencia = mysqli_prepare($conexion, $ConsCarrito)) {
    /* ejecutar la consulta */
    $sentencia->execute();

    /* almacenar el resultado */
    $sentencia->store_result();

    ?>
    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Su Compra</span>
          <span class="badge bg-primary rounded-pill"><?PHP echo $sentencia->num_rows; ?></span>
        </h4>
        <ul class="list-group mb-3">
<?PHP
/* cerrar la sentencia */
    $sentencia->close();
}
while ($row = mysqli_fetch_assoc($ResCompra)) {?>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0"><?PHP echo $row['NombreProduc']; ?></h6>
            </div>
            <span class="text-muted">$<?PHP echo $row['PrecioProducto']; ?></span>
          </li>

          <?PHP
$Total += $row['PrecioProducto'];
}
mysqli_free_result($ResCompra);?>
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (MXN)</span>
            <strong>$<?PHP echo $Total; ?></strong>
          </li>
        </ul>
      </div>


<?PHP
#$idUsers = $_GET['idUsuario'];
#$ConsUser = "SELECT * FROM usuarios WHERE idUsuarios = ''";
$ConsUser = "SELECT * FROM usuarios limit 1";
$ResCliente = mysqli_query($conexion, $ConsUser);
while ($rowN = mysqli_fetch_assoc($ResCliente)) {?>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Datos del usuario</h4>
        <form class="needs-validation" action="HomeUser.php" novalidate="" wtx-context="8ACBC284-1001-4440-9BBF-093F627521D0">
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" class="form-control" id="firstName" value="<?PHP echo $rowN['Nombre']; ?>" disabled>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" class="form-control" id="lastName" placeholder="" value="<?PHP echo $rowN['ApePat']; ?>" disabled>
            </div>
            <div class="col-12">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" value="<?PHP echo $rowN['Correo']; ?>" disabled>
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" value="<?PHP echo $rowN['Direccion']; ?>" disabled>
            </div>
            <div class="col-md-5">
              <label for="country" class="form-label">Country</label>
              <input type="text" class="form-control" id="address2" value="<?PHP echo $rowN['Municipio']; ?>" placeholder="" disabled>
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label">State</label>
              <input type="text" class="form-control" id="address2" value="<?PHP echo $rowN['Estado']; ?>" placeholder="" disabled>
            </div>

            <div class="col-md-3">
              <label for="zip" class="form-label">Zip</label>
              <input type="text" class="form-control" id="address2" value="<?PHP echo $rowN['CodPostal']; ?>" placeholder="" disabled>
            </div>
          </div>
<?PHP }
mysqli_free_result($ResCliente);?>
          <hr class="my-4">

          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="same-address" wtx-context="A922E9A9-C082-4567-B93E-A5B758337A42">
            <label class="form-check-label" for="same-address">La dirección de envío es la misma que mi dirección de facturación.</label>
          </div>

          <hr class="my-4">

          <h4 class="mb-3">Metodos de pago</h4>

          <div class="my-3">
            <div class="form-check">
              <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked="" required="" wtx-context="46A49905-D10F-447B-851B-F549E8CE7493">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card-2-back-fill" viewBox="0 0 16 16">
                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5H0V4zm11.5 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2zM0 11v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1H0z"/>
              </svg>
              <label class="form-check-label" for="credit">Tarjeta Credito</label>
            </div>
            <div class="form-check">
              <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required="" wtx-context="B7EC7426-A827-4AD1-AE7B-2EECD1357BEF">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card-2-front-fill" viewBox="0 0 16 16">
                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2.5 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2zm0 3a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z"/>
              </svg>
              <label class="form-check-label" for="debit">Tarjeta Debito</label>
            </div>
            <div class="form-check">
              <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required="" wtx-context="65533DF6-B4EC-46BB-8972-F6300A87E214">
              <label class="form-check-label" for="paypal">PayPal</label>
            </div>
          </div>

          <div class="row gy-3">
            <div class="col-md-6">
              <label for="cc-name" class="form-label">Nombre de la tarjeta</label>
              <input type="text" class="form-control" id="cc-name" placeholder="" required="" wtx-context="0241BD90-71A4-456C-856D-F45154775A04">
              <div class="invalid-feedback">
                El nombre es requerido
              </div>
            </div>

            <div class="col-md-6">
              <label for="cc-number" class="form-label">Numero de Tarjeta</label>
              <input type="text" class="form-control" id="cc-number" placeholder="" required="" wtx-context="A92C8E35-AB53-4A72-8F70-8A9E31BA053E">
              <div class="invalid-feedback">
                El número es requerido
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-expiration" class="form-label">Expiración</label>
              <input type="text" class="form-control" id="cc-expiration" placeholder="" required="" wtx-context="B4EEC55C-8338-4104-8273-D271A6568D4D">
              <div class="invalid-feedback">
                La Caducidad es requerido
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-cvv" class="form-label">CVV</label>
              <input type="text" class="form-control" id="cc-cvv" placeholder="" required="" wtx-context="017EFE70-5EB8-41F0-896B-2AC04697846F">
              <div class="invalid-feedback">
                El código de seguridad es requerido
              </div>
            </div>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Continuar</button>
        </form>
        <a href="VistaProductsUsers.php">Regresar</a>
      </div>
    </div>
  </main>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">© 2021 Jats'uts Nook MANRIQUE</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacidad</a></li>
      <li class="list-inline-item"><a href="#">Terminos</a></li>
      <li class="list-inline-item"><a href="#">Soporte</a></li>
    </ul>
  </footer>
</div>


    <script src="../js/CarritoJS/bootstrap.bundle.min.js.descarga" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      <script src="../js/CarritoJS/form-validation.js.descarga"></script>


</body></html>
