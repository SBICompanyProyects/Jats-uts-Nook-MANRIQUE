<?PHP
include_once '../lib/ConexionBD.php';
$ConsultaProductos = "SELECT * FROM productos";

session_start();
/////////////////////////////Nos permite seleccionar que tipo de usuario entra\\\\\\\\\\\\\\\\\\\
if (!isset($_SESSION['rol'])) {
    header('location: ../Login.php');
} else {
    if ($_SESSION['rol'] != 1) {
        header('location: ../Login.php');
    }
}
if (isset($_POST['LogOut']) == 1) {
    # code...
    session_unset();
    session_destroy();
    header("location:../index.php");
} else {
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JNManrique-Admin</title>
    <link rel="stylesheet" href="../css/Admindashboard.css">
    <link rel="stylesheet" href="../css/LibCSSBootstrap/bootstrap.min.css">
    <link href="../css/LibCSSExtras/lightbox.min.css" rel="stylesheet" />
    <script src="../js/LibJSExtras/jquery.min.js"></script>
    <script src="../js/LibJSBootstrap/bootstrap.min.js"></script>
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
    <style type="text/css">
        /* Chart.js */

        @keyframes chartjs-render-animation {
            from {
                opacity: .99
            }
            to {
                opacity: 1
            }
        }

        .chartjs-render-monitor {
            animation: chartjs-render-animation 1ms
        }

        .chartjs-size-monitor,
        .chartjs-size-monitor-expand,
        .chartjs-size-monitor-shrink {
            position: absolute;
            direction: ltr;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            overflow: hidden;
            pointer-events: none;
            visibility: hidden;
            z-index: -1
        }

        .chartjs-size-monitor-expand>div {
            position: absolute;
            width: 1000000px;
            height: 1000000px;
            left: 0;
            top: 0
        }

        .chartjs-size-monitor-shrink>div {
            position: absolute;
            width: 200%;
            height: 200%;
            left: 0;
            top: 0
        }
    </style>
</head>

<body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-3 me-0 px-3" href="#">Jats'uts Nook MANRIQUE</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
        <div class="navbar-nav">
            <form method="POST" class="carrito btn__Principal nav-item text-nowrap form-inline justify-content-md-end">
                <input type="hidden" name="LogOut" value="1">
				<input type="submit" class="btn btn-danger nav-link px-3 btn-danger" value="Cerrar Sesión">
            </form>
        </div>
    </header>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home" aria-hidden="true"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>                                Estadisticas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="AdminProductos.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file" aria-hidden="true"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>                                Nuevo Productos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"  data-toggle="modal" data-target="#exampleModalLong">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>                                Usuarios
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2" aria-hidden="true"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>                                Reportes
                            </a>
                        </li>
                    </ul>
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Saved reports</span>
                        <a class="link-secondary" href="#" aria-label="Add a new report">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle" aria-hidden="true"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>                                Current month
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>


            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 MAIN_ADMIN">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                    </div>
                </div>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                      This week
                    </button>
                </div>
                <canvas class="my-4 w-100 chartjs-render-monitor" id="myChart" width="1080" height="456" style="display: block; height: 507px; width: 1201px;"></canvas>
                <h2>Productos</h2>
                <div class="table-responsive">
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
                            </tr>
                                <?PHP
}
mysqli_free_result($ResConsulta);?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <main class="containerNewUser" id="NewUser">
		<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h2 class="modal-title" id="exampleModalLongTitle">Ingresa Nuevo Usuario</h2>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="terminos">
							<div class="terminos-section">
								<form action="#" class="FormNewUserAdm" method="post">
									<div class="mb-3">
										<label for="exampleInputEmail1" class="form-label">Correo electronico</label>
											<input type="email" class="form-control" name="correo" aria-describedby="emailHelp">
									</div>
									<div class="mb-3">
										<label for="exampleInputPassword1" class="form-label">Contraseña</label>
										<input type="password" class="form-control" name="contraseña">
										<label for="exampleInputPassword1" class="form-label">Confirmar Contraseña</label>
										<input type="password" class="form-control" name="vercontraseña">
									</div>
									<input type="hidden" name="nombre" value="CoAdmin">
									<input type="hidden" name="primerapellido" value="x">
									<input type="hidden" name="segundoapellido"value="x">
									<input type="hidden" name="nacimiento"value="1999-01-01">
									<input type="hidden" name="codigopostal"value="00000">
									<input type="hidden" name="estado" value="x">
									<input type="hidden" name="municipio"value="x">
									<input type="hidden" name="colonia"value="x">
									<input type="hidden" name="direccion"value="x">
									<input type="hidden" name="telefono"value="0000000000">
									<input type="hidden" name="referencias" value="x">
									<input type="hidden" name="numint"value="x">
									<input type="hidden" name="numext"value="x">
									<input type="hidden" name="tipoUser" value="1">
									<button type="submit" class="btn btn-primary">Registrar</button>
								</form>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</main>


    <script src="../js/LibJSExtras/Dashboard_files/bootstrap.bundle.min.js.descarga" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../js/LibJSExtras/Dashboard_files/feather.min.js.descarga" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="../js/LibJSExtras/Dashboard_files/Chart.min.js.descarga" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="../js/LibJSExtras/Dashboard_files/dashboard.js.descarga"></script>


</body>

</html>