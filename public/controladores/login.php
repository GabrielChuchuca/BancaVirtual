<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Banquito</title>
</head>

<body>
    <?php
    session_start();
    include '../../config/conexionBD.php';
    $usuario = isset($_POST["correo"]) ? mb_strtoupper(trim($_POST["correo"])) : null;
    $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
    $codigo = 0;
    $correctos = 0;
    $incorrectos = 0;
    $codigoCliente = 0;
    $codigoClienteFinal = 0;
    $pass = MD5($contrasena);
    $sql = "SELECT * FROM bv_persona WHERE per_correo = '$usuario' and per_password = '$pass'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['cod'] = "$row[per_id]";
            $_SESSION['nom'] = "$row[per_nombre]";
            $_SESSION['ape'] = "$row[per_apellido]";
            $_SESSION['rol'] = "$row[per_rol]";
            $_SESSION['cor'] = "$usuario";
        }
        $codigo = $_SESSION['cod'];

        $_SESSION['isLogged'] = TRUE;

        if ($_SESSION['rol'] == "admin") {
            header("Location: ../../admin/vista/admin/index.php");
        } else {
            if ($_SESSION['rol'] == "usuario") {
                $sqlAccesoCorrecto = "SELECT * FROM bv_cliente WHERE cli_persona=$codigo";
                $result = $conn->query($sqlAccesoCorrecto);
                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {
                        $codigoCliente = $row["cli_id"];
                        $correctos = $row["cli_num_login"];
                    }
                    $correctos = $correctos + 1;
                    $sql3 = "UPDATE bv_cliente SET cli_num_login=$correctos WHERE cli_id=$codigoCliente;";
                    if ($conn->query($sql3) === TRUE) {

                        $to_email = "margoalexaguirre@gmail.com";
                        $subject = "Web transaccional: Inicio de sesion";
                        $body = "Se registo un ingreso al servicio Web Transaccional \nSi usted no realizo esta operacion dirijase a cualquiera de nuestras oficinas o comuniquese con nuestro Call Center
                        \nCALL CENTER: (07) 2222836\nCelular:  0986694444\nEscríbanos a: info@banquito.fin.ec";
                        $headers = "Banquito";

                        if (mail($to_email, $subject, $body, $headers)) {
                            header("Location: ../../admin/vista/user/index.php");
                        } else {
                            echo "Email sending failed...";
                        }
                    }
                }
            } else {
                header("Location: ../../admin/vista/empleado/index.php");
            }
        }
    } else {


        $sqlAccesoIncorrecto = "SELECT * FROM bv_persona WHERE per_correo='$usuario'";
        $result = $conn->query($sqlAccesoIncorrecto);
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $codigoCliente = $row["per_id"];
            }
            $sqlAccesoIncorrecto2 = "SELECT * FROM bv_cliente WHERE cli_persona=$codigoCliente";
            $result2 = $conn->query($sqlAccesoIncorrecto2);
            if ($result2->num_rows > 0) {

                while ($row = $result2->fetch_assoc()) {
                    $codigoClienteFinal = $row["cli_id"];
                    $incorrectos = $row["cli_num_inco"];
                }
                $incorrectos = $incorrectos + 1;
                $sql3 = "UPDATE bv_cliente SET cli_num_inco=$incorrectos WHERE cli_id=$codigoClienteFinal;";
                if ($conn->query($sql3) === TRUE) {

                    $to_email = "margoalexaguirre@gmail.com";
                    $subject = "Web transaccional: Inicio de sesion Fallido";
                    $body = "Se registo un ingreso fallido al servicio Web Transaccional \nSi usted no realizo esta operacion dirijase a cualquiera de nuestras oficinas o comuniquese con nuestro Call Center
                    \nCALL CENTER: (07) 2222836\nCelular:  0986694444\nEscríbanos a: info@banquito.fin.ec";
                    $headers = "Banquito";

                    if (mail($to_email, $subject, $body, $headers)) {
                        header("Location: ../../admin/vista/user/index.php");
                    } else {
                        echo "Email sending failed...";
                    }
                }
            }
        }






        header("Location: ../vista/login.html");
    }
    $conn->close();
    ?>
</body>

</html>