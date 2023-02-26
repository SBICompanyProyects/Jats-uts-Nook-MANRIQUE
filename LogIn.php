<?php
include_once 'lib/ConexionBD.php';

session_start();

if (isset($_GET['cerrar_sesion'])) {
    session_unset();

    // destroy the session
    session_destroy();
}

if (isset($_SESSION['rol'])) {
    switch ($_SESSION['rol']) {
        case 1:
            header('location: 1Admin/HomeAdmin.php');
            break;

        case 2:
            header('location: 2Users/HomeUser.php');
            break;

        default:
    }
}

if (isset($_POST['logusuario']) && isset($_POST['logcontrasena'])) {
    $md5pass = md5($_POST['logcontrasena']);
    $username = $_POST['logusuario'];

    $query = "SELECT *FROM usuarios WHERE Correo = '$username' AND ClaveSeguridad = '$md5pass'";
    $result = mysqli_query($conexion, $query);
    $row = mysqli_fetch_array($result, MYSQLI_NUM);
    if ($row == true) {
        $rol = $row[1];
        $NoUs = $row[2];

        $_SESSION['rol'] = $rol;
        switch ($rol) {
            case 1:
                header('location: 1Admin/HomeAdmin.php');
                break;

            case 2:

                header('location: 2Users/HomeUser.php');
                break;
            case 3:
                header('location: VentanaColav.php');
                break;

            default:
        }
    } else {
        // no existe el usuario
        echo "Nombre de usuario o contraseña incorrecto";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jats'uts nook' Manrique</title>
    <link rel="stylesheet" href="css/StyleLogIn.css">
    <link rel="stylesheet" href="css/LibCSSBootstrap/bootstrap.min.css">
    <script src="js/LibJSExtras/jquery.min.js"></script>
    <script src="js/LibJSBootstrap/bootstrap.min.js"></script>
</head>
<body>
    <main>
        <!-- contenedor de todo -->
        <div class="contenedor_todo">
            <!-- Vista tracera -->
            <div class="caja__tracera">
                    <!-- Vista tracera/fondo para login -->
                    <div class="cajatracera__login">
                        <h3>¿Ya tienes una cuenta?</h3>
                        <p>Inicia sesión para entrar a la página</p>
                        <button id="btn_login">Iniciar Sesión</button>
                    </div>
                    <!-- Vista tracera/fondo para registro -->
                    <div class="cajatracera__registro">
                        <h3>¿Aún NO tienes una cuenta?</h3>
                        <p>Registrese para disfrutar de los beneficios</p>
                        <button id="btn_register">Registrar</button>
                    </div>
            </div>
            <!-- Formularios -->
            <div class="contenedorLogin__Registro">
                <!-- Formulario para login -->
                <form id="Form__LOG__User" class="formulario__login" action="#" method="POST">
                        <h2>Iniciar Sesión
                            <svg src="recursos/BT_Icon/box-arrow-down-right.svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                            </svg>
                        </h2>
                        <input type="email" name="logusuario" value="" placeholder="&#128101;Correo Electronico" class="normBox Input__Login" required>
                        <input type="password" name="logcontrasena" value="" placeholder="&#128272;Contraseña" class="normBox Input__Login" required>
                        <input type="submit" class="btn_ingresar" name="ingresarlogin" value="&#128073;Ingresar" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top">
                        <a href="index.php" class="AReturnHome"> <i><br> O Regresar al inicio</i></a>
                </form>

                <!-- Formulario para Registro -->
                <form id="Form__Reg__User" class="formulario__register" action="Validaciones/MetAddUsers.php" method="POST">
                    <h2>Registrarse
                    <svg src="recursos/BT_Icon/pen-fill.svg" width="20" height="20" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                    </svg>
                    </h2>
                    <!-- NOMBRE -->
                    <input type="text" id="RegNombre" class="MiniBox Input__Login" name="nombre" value="" maxlength="30" placeholder="&#128100;Nombre/s" required>
                    <!-- APELLIDO PATERNO -->
                    <input type="text" id="RegPrApel" class="MiniBox Input__Login" name="primerapellido" value="" maxlength="30" placeholder="&#128101;Primer Apellido" required>
                    <!-- APELLIDO MATERNO -->
                    <input type="text" id="RegSegApe" class="MiniBox Input__Login" name="segundoapellido" value="" maxlength="30" placeholder="&#128101;Segundo Apellido" required>
                    <!-- FECHA DE NACIMIENTO -->
                    <input type="date" id="RegFNacim" class="MiniBox Input__Login" name="nacimiento" value="" min="1970-01-01" max="2099-12-31" required>
                    <!-- CODIGO POSTAL -->
                    <input type="tel" id="RegCodPos" class="MiniBox Input__Login" name="codigopostal" value="" maxlength="5" placeholder="&#129517;Código Postal:00000" required>
                    <!-- ESTADO -->
                    <input type="text" id="RegEstado" class="MiniBox Input__Login" name="estado" value="" maxlength="30" placeholder="&#127758;Estado" required>
                    <!-- MUNICIPIO -->
                    <input type="text" id="RegMunici" class="MiniBox Input__Login" name="municipio" value="" maxlength="30" placeholder="&#128510;Municipio" required>
                    <!-- DIRECCION -->
                    <input type="text" id="RegAddres" class="MiniBox Input__Login" name="direccion" value="" maxlength="30" placeholder="&#9943;Dirección" required>
                    <!-- NUMERO TELEFONICO -->
                    <input type="tel" id="RegTelefo" class="MiniBox Input__Login" name="telefono" value="" maxlength="10" placeholder="&#128222;Teléfono" required>
                    <!-- CORREO ELECTRONICO -->
                    <input type="email" id="RegCorreo" class="MiniBox Input__Login" name="correo" value="" maxlength="45" placeholder="&#128235;Correo:aaa@correo.zzz" required>
                    <!-- CONTRASEÑA -->
                    <input type="password" id="RegContra" class="MiniBox Input__Login" name="contraseña" value="" minlength="6" placeholder="&#128273;Contraseña" required>
                    <!-- VERIFICACION DE CONTRASEÑA -->
                    <input type="password" id="RegVerCon" class="MiniBox Input__Login" name="vercontraseña" value="" minlength="6" placeholder="Confirme contraseña" required>
                    <!-- REFERENCIAS DE RESIDENCIA -->
                    <input type="textarea" id="RegRefere" class="normBox Input__Login" name="referencias" value="" maxlength="200" placeholder="&#9968;Referencias" required>
                    <!-- ACEPTAR TERMINOS Y CONDICIONES -->
                    <input type="checkbox" id="TermyCond" name="aceptarterminos" value="" required>
                    <!-- BOTON PARA VER LOS TERMINOS Y CONDICIONES -->
                    <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModalLong">Terminos y condiciones</button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title" id="exampleModalLongTitle">TERMINOS Y CONDUCIONES DE USO</h2>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="terminos">
                                        <div class="terminos-section">
                                            <div class="DivSection">
                                                <p class="lead">Jats'uts nook' Manrique, con domicilio en Col. Venustiano Carranza CP. 24400 Champotón Campeche, expide los siguientes Términos y Condiciones para que a través de sus diversos medios electrónicos se
                                                        comercialicen y se oferten diversos productos físicos al público en general, identificados de manera individual como “Usuario”.<br>La página de Internet de la Empresa y sitio web de<em>Jatsutsnook</em>                                                        , bajo la denominación <u> https://www.Jatsutsnook.com/ </u>, en el cual Jats'uts nook' Manrique publica venta de Ropa Artesanal Mexicana y Accesorios Mexicanos, en donde se puede registrar el usuario
                                                        para adquirir los productos publicados, realizar pedidos, ponerse en contacto con Jats'uts nook' Manrique o en servicio de Atención al Cliente personalizado a través del correo electrónico: <u>jatsutsnook@gmail.com </u>                                                        o telefonos como 9821214756 o 9821194973. Cada producto de nuestra tienda en línea esta descrito detalladamente con la intención de resolver cualquier duda que pueda surgirte acerca del producto
                                                        o prenda.<br> Si tienes alguna pregunta no dudes en contactarnos vía correo electrónico a jatsutsnook@gmail.com o al WhatsApp 9821214756 o 9821194973 y con mucho gusto resolveremos cualquier duda
                                                        que tengas. Toma en cuenta que al ser productos están hechos a mano y los colores y medidas pueden variar ligeramente de prenda a prenda.
                                                </p>
                                            </div>
                                            <div class="DivSection">
                                                <h5 class="sech2">DECLARACIONES</h5>
                                                <p class="lead">Jats'uts nook' Manrique, declara que es una Empresa legalmente constituida bajo las leyes mexicanas, que tiene todos los permisos necesarios para cumplir su Objeto Social y que no tiene algún tipo de
                                                    impedimento o limitante para cumplir con el mencionado Objeto, que incluye, la celebración del Contrato. Jats nook' Manrique concede al Usuario una licencia personal limitada, no exclusiva, no transferible,
                                                    revocable, por plazo indeterminado, conforme a los presentes Términos y Condiciones, para utilizar el Sitio, a fin de avalar, manifestar o interesarse en adquirir y adquirir mediante Oferta de Venta
                                                    los productos que en la Página se encuentren publicados. La forma de utilizar el Sitio es personal e intransferible. Jats'uts nook' Manrique declara ser propietaria de los Bienes o Productos que
                                                    se encuentren en las Ofertas de Venta, además de todos los elementos amparados por normas de propiedad intelectual.<br> Todo lo anterior para efecto del Contrato. Jats'uts nook' Manrique declara
                                                    que el contenido neto del Producto publicado en la Oferta de Venta corresponde a la Calidad, Talla, Bordado, Color, Medidas y demás elementos que se señalen en la propia Oferta de Venta. Jats'uts
                                                    nook' Manrique se reserva todos los derechos no expresamente otorgados bajo el presente documento. Este contrato y cualesquiera derechos y licencias otorgadas aquí, no podrán ser transferidos o cedidos
                                                    por el Usuario pero Jats'uts nook' Manrique si estará en posibilidad de transferirlos o cederlos sin restricción alguna.<br>
                                                    <ul class="TermUl">
                                                        <li>
                                                            <p class="lead" style="font-size: 15px;">El Usuario acepta Términos y Condiciones y se obliga a todo lo señalado en los mismos.</p>
                                                        </li>
                                                        <li>
                                                            <p class="lead" style="font-size: 15px;">El Usuario está de acuerdo en que las exclusiones de garantía y limitaciones de responsabilidad establecidas con anterioridad son elementos fundamentales de la base de estos Términos y Condiciones.</p>
                                                        </li>
                                                        <li>
                                                            <p class="lead" style="font-size: 15px;">El Usuario está consciente de que el tráfico de datos que proporciona acceso al Sitio es apoyado por un servicio prestado por la operadora de servicios de telecomunicaciones seleccionada
                                                                y contratada por el Usuario y que dicha contratación es totalmente independiente del Sitio.</p>
                                                        </li>
                                                        <li>
                                                            <p class="lead" style="font-size: 15px;">El Usuario reconoce que las comisiones cobradas por la operadora de servicios de telecomunicaciones de su elección y los impuestos aplicables pueden afectar el tráfico de datos necesarios
                                                                para eventuales descargas y anuncios de un tercero en el dispositivo.</p>
                                                        </li>
                                                        <li>
                                                            <p class="lead" style="font-size: 15px;">El Usuario declara y reconoce que la descarga de cualquier contenido del Sitio no le confiere la propiedad sobre cualesquiera marcas exhibidas en el Sitio.</p>
                                                        </li>
                                                    </ul>
                                                </p>
                                            </div>
                                            <div class="DivSection">
                                                <h5 class="sech2">CONTRATO</h5>
                                                <p class="lead">Es aquel que la Empresa le transmite la propiedad de un bien mueble al Usuario con Registro que acepta una Oferta de Venta, creando así un pedido y pagando a cambio un precio cierto en moneda de curso
                                                    legal de los Estados Unidos Mexicanos. Dicho contrato se someterá a los presentes Términos y Condiciones.
                                                </p>
                                                <p class="lead"></p><br>
                                            </div>
                                            <div class="DivSection">
                                                <h5 class="sech2">OFERTA DE VENTA</h5>
                                                <p class="lead">Es toda aquella publicación de un Producto en la Página de la Empresa, que contenga un precio y descripción del Producto que puede constar de clasificación, denominación, serie, modelo, color, etc. El
                                                    precio señalado en la Oferta de Venta no es negociable, y se le respetará el descuento o promoción señalado en la propia Oferta de Venta.
                                                </p>
                                            </div>
                                            <div class="DivSection">
                                                <h5 class="sech2">PRECIOS</h5>
                                                <p class="lead">Los precios incluyen IVA, los gastos de envío se calcularán al momento de realizar la compra.</p>
                                                <p class="lead"></p><br>
                                            </div>
                                            <div class="DivSection">
                                                <h5 class="sech2">FORMAS DE PAGO</h5>
                                                <p class="lead">****Tarjeta Bancaria de Debito o Crédito (Protegido con Radar Transacción Antifraude y 3D).<br> ****El Usuario deberá notificar a la Empresa cualquier cargo indebido o fraudulento en la tarjeta o cuenta
                                                    bancaria utilizada para las compras, mediante correo dirigido a jatsutsnook@gmail.com o comunicarse ya sea via telefónica o WhatsApp 9821214756 en el menor plazo de tiempo posible para que la Empresa
                                                    realice las gestiones oportunas, así como del extravío, pérdida, hurto o robo, inmediatamente después de tener conocimiento del hecho, Deposito o Transferencia Bancaria, o Deposito en Oxxo.<br> ***En
                                                    compras por Whatsapp son las mismas condiciones de Términos y Condiciones de venta.<br> ****Es IMPORTANTE saber que AL FINALIZAR TU COMPRA EN TU CARRITO tienes que dar clic en Términos y Condiciones
                                                    donde se despliega nuestros términos (donde puedes leer y aceptar por tu propia cuenta y voluntad) al aceptar condiciones de nuestro sitio web <u> https://www.Jatsutsnook.com/ </u>, estas de ACUERDO
                                                    en: Que tus datos de envió y facturación son correctos, Que al pagar tu pedido tus prendas de vestir o productos artesanales son correctos en su color, tamaño, tipo de bordado y talla así como la
                                                    cantidad de cada uno de ellos, Aceptas tu pedido y lo finalizas en las pasarelas de pago autorizadas en nuestro sitio web y Aceptas que tu pedido fue realizado correcto y sin errores.
                                                </p>
                                            </div>
                                            <div class="DivSection">
                                                <h5 class="sech2">MÉTODO DE ENVÍO</h5>
                                                <p class="lead">El Usuario deberá cubrir los costos de transporte y envío de los productos, salvo que se señale explícitamente lo contrario. El envío gratis es aplicable únicamente en las compras que ascienden al monto
                                                    que la Empresa establezca en la Página de Internet. Se le informará al Usuario previamente el precio, fecha aproximada de entrega, costos de seguro y flete, este se erogará al momento de confirmar
                                                    el pedido.
                                                </p>
                                            </div>
                                            <div class="DivSection">
                                                <h5 class="sech2">RECLAMACIONES</h5>
                                                <p class="lead">Si por algún motivo el producto o prenda llega a tus manos con algún daño o faltante, envíanos de inmediato un WhatsApp 9821214756 o 9821194973 e incluso también al correo electrónico: jatsutsnook@gmail.com
                                                    durante las 24 horas posteriores a la entrega de tu paquete y solucionaremos el problema lo antes posible. Al dejar tu paquete en la paquetería con tus prendas se te hace llegar a tu whatsApp que
                                                    dejaste escrito en tu pedido tu número de rastreo, donde podrás ver en la pagina autorizada de la paquetería el día de entrega y días en que tu paquete esta en camino. En caso de un Rembolso se realiza
                                                    por el medio en que se pago su pedido. Para evitar estos Reclamos siempre se envía una fotografía de los productos que solicitaste para que puedas verificar que este correcto y así puedas observar
                                                    que será enviado sin problemas (es importante que nos confirmes de recibido al numero de WhatsApp 9821214756 o 9821194973 y que todo esta correcto y estés conforme con tu producto y que todo viajó
                                                    a su destino satisfactoriamente).
                                                </p>
                                            </div>
                                            <div class="DivSection">
                                                <h5 class="sech2">REMBOLSOS</h5>
                                                <p class="lead">Los Rembolsos se realizan cuando el Cliente nos comunica a nuestro WhatsApp 9821214756 o 9821194973 o por correo electrónico a jatsutsnook@gmail.com, que el articulo esta dañado o hay un faltante, tendrás
                                                    que avisarnos dentro de las primeras 24 horas de haber recibido tus artículos. Dicho Rembolso se realiza cuando se tiene un acuerdo con el cliente por escrito, y se haya llegado a un acuerdo satisfactorio.
                                                    El Rembolso se realizara conforme el medio de pago que hayas elegido en tu pedido. No hay Rembolsos cuando el cliente comete el error en sus datos de envió y no se comunico con nosotros. No hay Rembolsos
                                                    cuando el cliente erróneamente pide su producto (cada articulo describe talla, color, medidas, tipo de bordado, tipo de tela y origen).<br> Solo con los Términos que se encuentran en la sección de
                                                    Envíos y Devoluciones <u> https://www.Jatsutsnook.com//envios-y-devoluciones/ </u> Nosotros nos reservamos la fecha de entrega de su pedido, ya que lo determina la paquetería que se asigna en su
                                                    envió. En caso de un Rembolso se realiza por el medio en que se pago su pedido. Un Rembolso se realizara si el cliente lo solicitó al momento de recibir su mercancía por motivos de algún artículo
                                                    dañado o faltante enviando las evidencias a nuestro WhatsApp 9821214756 o 9821194973. Para evitar estos Rembolsos siempre se envía una fotografía de tu pedido para que puedas verificar que este correcto
                                                    y así puedas observar que será enviado sin problemas (es importante nos confirmes al numero de WhatsApp 9821214756 o 9821194973 que esta correcto y estés tranquil@ que todo viaja correctamente).<br>***NO
                                                    HAY CAMBIOS NI DEVOLUCIONES EN ARTICULOS CON REBAJAS EN PRECIO.
                                                </p>
                                            </div>
                                            <div class="DivSection">
                                                <h5 class="sech2">RESTRICCIONES</h5>
                                                <p class="lead">Cualquier trasgresión a los presentes Términos y Condiciones por parte del Usuario generarán el derecho en favor de Jats'uts nook' Manrique, en cualquier momento y sin necesidad de notificación previa
                                                    de ningún tipo, suspender o terminar la prestación de los servicios y/o de retirarle o denegarle el acceso al Sitio al Usuario trasgresor, así como quitarle o sacarlo del Registro.<br> El Sitio puede
                                                    ser utilizado únicamente con fines lícitos. Se encuentra terminantemente prohibido cualquier tipo de copia, distribución, transmisión, retransmisión, publicación, impresión, difusión y/o explotación
                                                    comercial del material y/o contenido puesto a disposición del público a través de este Sitio, sin el previo consentimiento expreso y por escrito de Jats'uts nook' Manrique o, en su caso, del titular
                                                    de los derechos de propiedad correspondientes. El incumplimiento de lo mencionado sujetará al infractor a todos los reclamos civiles y sanciones penales que pudieran corresponder.<br> LOS PADRES
                                                    O TUTORES DE MENORES DE EDAD SERÁN RESPONSABLES POR LOS ACTOS POR ELLOS REALIZADOS SEGÚN LO DISPUESTO POR ESTOS TÉRMINOS Y CONDICIONES, INCLUYENDO LOS DAÑOS CAUSADOS A TERCEROS, ACCIONES REALIZADAS
                                                    POR ELLOS Y QUE ESTÉN PROHIBIDAS POR LEY Y POR LAS DISPOSICIONES DE ESTE ACUERDO, SIN PERJUICIO DE LA RESPONSABILIDAD DEL USUARIO, SIEMPRE QUE ÉSTE NO FUESE PADRE O REPRESENTANTE LEGAL DEL MENOR
                                                    INFRACTOR.
                                                    <br> Al momento del Registro de Usuario no se aceptarán y podrán ser cancelados en cualquier momento, direcciones de correo electrónico (e-mails) o cualquier dato que contengan expresiones o conjuntos
                                                    gráficos-denominativos que ya hayan sido escogidos anteriormente por otro Usuario o, que de alguna otra forma, fuesen injuriosos, altisonantes, coincidentes con marcas, nombres comerciales, anuncios
                                                    de establecimientos, razones sociales de empresas, expresiones publicitarias, nombres y seudónimos de personas de relevancia pública, famosos o registrados por terceros, cuyo uso no esté autorizado
                                                    o que fuese en general, contrario a la ley o a las exigencias morales y de buenas costumbres generalmente aceptadas, así como expresiones que pudieran inducir a otras personas por error, quedando
                                                    claro que el Usuario responderá por el uso indebido tanto en el ámbito civil como penal, si aplicase. El Usuario no deberá hacer Upload, publicar o de cualquier otra forma disponer en el Sitio de
                                                    cualquier material protegido por derechos de autor, registro de marcas o cualquier otro derecho de propiedad intelectual sin previa y expresa autorización del titular del mencionado derecho.
                                                </p>
                                            </div>
                                            <div class="DivSection">
                                                <h5 class="sech2">TERMINACIÓN DEL CONTRATO</h5>
                                                <p class="lead">El Contrato que se perfecciona al contestar una oferta de venta termina en el momento que las partes cumplen con sus obligaciones. La Empresa podrá Terminar anticipadamente el Contrato si: El Precio
                                                    no es pagado puntualmente, a cuyo efecto las partes pactan expresamente que la falta de pago total o parcial producirá la rescisión de pleno derecho, Él Usuario incumple con cualquiera de las obligaciones
                                                    asumidas en este documento y Así lo convengan sus intereses cumpliendo previamente con sus obligaciones o indemnizarlo por dejar de hacerlo. A Empresa podrá optar por exigir la ejecución de su obligación
                                                    de pagar el precio o rescindir el Contrato y la indemnización, además podrá exigir resarcimiento de daños y perjuicios.
                                                </p>
                                            </div>
                                            <div class="DivSection">
                                                <h5 class="sech2">VIGENCIA DE TÉRMINOS Y CONDICIONES</h5>
                                                <p class="lead">La Empresa, así como el Usuario, reconocen que los Términos y Condiciones son de vigencia ilimitada. Jats'uts nook' Manrique se reserva el derecho de efectuar alteraciones al presente documento sin necesidad
                                                    de previo aviso. Por lo anterior Jats'uts nook' Manrique recomienda al Usuario que vuelva a leer con regularidad este documento, de forma que se mantenga siempre informado sobre eventuales modificaciones.
                                                    Las alteraciones al Contrato se volverán efectivas inmediatamente después de su publicación en el Sitio.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn_registrar" name="Registrar">&#128073;Registrarse</button>
                    <a href="index.php" class="AReturnHome"> <i ><br> O Regresar al inicio</i></a>
                </form>
            </div>
        </div>
    </main>
    <script src="js/ValidarLogin.js"></script>
    <script src="js/JSmovLogin.js" type="text/javascript" charset="utf-8" async defer></script>
</body>
</html>
