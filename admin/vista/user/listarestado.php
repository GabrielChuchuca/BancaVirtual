<?php
session_start();
$nombresui = explode(" ", $_SESSION['nom']);
$apellidosui =  explode(" ", $_SESSION['ape']);
$codigoui = $_SESSION['cod'];
$usurol = $_SESSION['rol'];
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
    header("Location: /examen/public/vista/login.html");
}
if ($usurol == 'usuario') {
?>
    <!DOCTYPE html>
    <html class="no-js">
    <?php
    include '../../../config/conexionBD.php';
    $sqlu = "SELECT  tp.per_nombre per_nombre, tp.per_apellido per_apellido , tc.cli_id cli_id, tca.cue_ncuenta cue_ncuenta FROM bv_persona tp, bv_cliente tc , bv_cuenta tca ,bv_transferencia tt WHERE tp.per_id='$codigoui'  and tp.per_id = tc.cli_persona and  tc.cli_id = tca.cli_id and tca.cli_id = tt.cli_id;";
    $resultu = $conn->query($sqlu);
    $row = $resultu->fetch_assoc();
    $codigoc = $row["cli_id"];
    $numeroc = $row["cue_ncuenta"];
    $nombres = $row["per_nombre"];
    $apellidos = $row["per_apellido"]

    ?>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>BANQUITO | Inicio</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="../../../css/bootstrap.min.css">
        <link rel="stylesheet" href="../../../css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="../../../css/font-awesome.min.css">
        <link rel="stylesheet" href="../../../css/main.css">
        <link rel="stylesheet" href="../../../css/sl-slide.css">
        <link rel="stylesheet" href="../../../css/img-efect.css">
        <link rel="stylesheet" href="../../../css/accordion.css">
        <link rel="stylesheet" href="../../../css/social.css">
        <link rel="stylesheet" href="../../../css/social.css">
        <script type="text/javascript" src="../../../js/validar.js"></script>
        <script src="../../../js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="images/ico/icon.png">
        <script src="../../../js/jquery-3.2.1.min.js"></script>
        <!--carousel-->
        <script src="../../../js/jssor.slider-26.1.5.min.js" type="text/javascript"></script>
        <script src="../../../js/funciones.js" type="text/javascript"></script>
        <script type="text/javascript" src="../../../js/objetoAjax.js"></script>
        <script>
            $(document).ready(function() {
                $('.myCarousel').carousel()

                //$('#modal-13').modal({ keyboard: false }).load   // initialized with no keyboard
            });
        </script>
        <script>


</script>
        <style>
            .contenedor-slider {
                margin: auto;
                width: 100%;
                position: relative;
                overflow: hidden;
            }

            .slider {
                display: flex;
                width: 400%;
            }

            .slider__section {
                width: 100%;
            }

            .slider__img {
                display: block;
                width: 100%;
                height: 100%;
            }

            .btn-prev,
            .btn-next {
                width: 40px;
                height: 40px;
                background: rgba(255, 255, 255, 0.7);
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                line-height: 40px;
                font-size: 30px;
                font-weight: bold;
                text-align: center;
                border-radius: 50%;
                font-family: monospace;
                cursor: pointer;
            }

            .btn-prev:hover,
            .btn-next:hover {
                background: white;
            }

            .btn-prev {
                left: 5%;
            }

            .btn-next {
                right: 5%;
            }

            .modal-body {
                height: 550px;
            }
        </style>
        <style>
            table {
                width: 100%;
                border: 1px solid #000;
            }

            th,
            td {
                height: 50px;
                text-align: center;
                border: 1px solid #000;
                border-collapse: collapse;
                padding: 0.3em;
                caption-side: bottom;
            }

            caption {
                padding: 0.3em;
                color: #fff;
                background: #000;
            }

            th {
                background: #eee;
            }
        </style>
    </head>

    <body oncontextmenu="return false" style="background-color: #fff">
        <script>
            fbq('track', 'PaginaPrincipal');
        </script>
        <!--Header-->
        <header class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a id="logo" class="pull-left" href="index.html"></a>
                    <div class="nav-collapse collapse pull-right">
                        <ul class="nav">
                            <li><a href="../../../index.html">Cerrar Sesion</a></li>
                            <li class="active"><a href="../../index.html">Inicio</a></li>
                        <li><a href="../../calCredito.php">Calcule su Crédito</a></li>
                        <li><a href="../../solitudCredito.php">Solicite su Crédito</a></li>
                        <li><a href="estadocuenta.php">Consulte su Cuenta</a></li>
                        <li><a href="registrosaccesos.php">Consulta de registros</a></li>
                        
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>


        </header>
        <!-- /header -->
        <!--Slider-->
        <br>
        <br>
        <br>
        <br>
        <br>

<section>
<?php
echo "<h1>N. de Cuenta: $numeroc&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Nombres:  $nombres&nbsp;&nbsp;$apellidos</h1>"
        ?>
       
<?php

  include '../../../config/conexionBD.php';
  $q = $_POST["txttipo"];
  $fd = $_POST["fechad"];
  $fh = $_POST["fechah"];
  echo "<br><br>";
  $sql = "SELECT tt.tra_tipo, tt.tra_fecha ,tt.tra_monto FROM bv_persona tp, bv_cliente tc , bv_cuenta tca ,bv_transferencia tt WHERE tca.cue_ncuenta='$numeroc' and tp.per_id = tc.cli_persona and tca.cue_ncuenta = tt.cue_ncuenta and tc.cli_id = tca.cli_id and UPPER(tt.tra_tipo) = '$q' and tt.tra_fecha BETWEEN '$fd' AND '$fh' ORDER BY tt.tra_fecha DESC ;
  ";

  $result = $conn->query($sql);
  if($result->num_rows > 0){
    
    echo "<table style='width:100%'>
    <tr>
    <th> TIPO DE MOVIMIENTO </th>
    <th> FECHA </th>
    <th> SALDO </th>
    </tr>";
    while ($row = $result->fetch_assoc()) {
        date_default_timezone_set("America/Guayaquil");
        $fecha = $row["tra_fecha"];
        $fecha = date('Y-m-d');
            $tipo = $row["tra_tipo"];
            $saldo = $row["tra_monto"];
            echo "<tr>
                 <td>" . $tipo . "</td>
                 <td>" . $fecha . "</td>
                 <td>" . $saldo . "</td>
                 </tr>";
       
    }
    echo "</table>";
} else {
    echo "<tr>
    <td colspan='7'> No existen usuarios registrados en el sistema </td>
    </tr>";
}
 echo "<br><br><a
  href='estadocuenta.php'>VOLVER</a>";
   $conn->close();
?>

</script>

                </div>

                <div class="row-fluid">

                </div>

                <div class="gap">

                </div>


            </div>

        </section>
        <br>
        <br>
        <br>
        <br>
        <br>
        <!--Bottom-->
        <section id="bottom" class="main">
            <!--Container-->
            <div class="container">
                <!--row-fluids-->
                <div class="row-fluid">
                    <!--Contact Form-->
                    <div class="span7">
                        <h4>UBIQUENOS</h4>
                        <ul class="unstyled address">
                            <li>
                                <i class="icon-home"></i><strong>Dirección:</strong> calle turuhuayco y calle vieja<br>
                            </li>
                            <li>
                                <i class="icon-envelope"></i>
                                <strong>Email: </strong> info@banquito.fin.ec
                            </li>
                            <li>
                                <i class="icon-phone"></i>
                                <strong>Teléfono:</strong> 072222836
                            </li>
                            <li>
                                <i class="icon-phone"></i>
                                <strong>Celular:</strong> 0986694444
                            </li>
                        </ul>
                    </div>
                    <!--End Contact Form-->

                </div>
                <!--/row-fluid-->
            </div>
            <!--/container-->
        </section>
        <!--/bottom-->

        <!--Footer-->
        <footer id="footer">
            <div class="container">
                <div class="row-fluid">
                    <div class="span5 cp">
                        &copy; 2019 <a target="_blank" href="#" title="Free Twitter Bootstrap WordPress Themes and HTML templates">BANQUITO</a>. Todos los derechos reservados
                    </div>
                </div>
            </div>
        </footer>
        <!--/Footer-->
        <!--  Login form -->
        <div class="modal hide fade in" id="loginForm" aria-hidden="false" style="height: 150px;background-color:#444444;">
            <div class="modal-header">
                <i class="icon-remove" data-dismiss="modal" aria-hidden="true"></i>
                <h4 style="text-align: center;color: aliceblue">Iniciar Sesion</h4>
            </div>
            <!--Modal Body-->
            <div class="modal-body" style="height:auto; text-align: center;background-color: #999">

                <input type="text" class="input-small" placeholder="Usuario" id="usuario">
                <input type="password" onkeypress="validar(event)" class="input-small" placeholder="Password" id="password">
                <br><button onclick="Login()" class="btn btn-primary zoom">Ingresar</button>

            </div>
            <!--/Modal Body-->
        </div>
        <!--  /Login form -->

        <script src="../../../js/vendor/jquery-1.9.1.min.js"></script>
        <script src="../../../js/vendor/bootstrap.min.js"></script>
        <script src="../../../js/main.js"></script>
        <!-- Required javascript files for Slider -->
        <script src="../../../js/jquery.ba-cond.min.js"></script>




        <style>
            input:invalid {
                border-color: red;
            }

            input,
            input:valid {
                border-color: #444;
            }
        </style>





    </body>

    </html>

<?php
} else {
    header("Location: /examen/public/vista/login.html");
}
?>