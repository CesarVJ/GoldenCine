<?php
  if(!empty(trim($_POST["nombre-titular"])) & !empty(trim($_POST['numero-tarjeta'])) && !empty(trim($_POST['fecha-expiracion'])) && !empty(trim($_POST['codigo-seguridad']))){

    require '../conexion.php';
    $tarjeta = trim($_POST['numero-tarjeta']);
    $codigo = trim($_POST['codigo-seguridad']);
    $expiracion = trim($_POST['fecha-expiracion']);
    $arr=explode ("-", $expiracion); 
    $anio=$arr[0];
    $mes = $arr[1];

    $conexion=abrirConexion();
    $saldo= ejecutarConsulta("SELECT saldo FROM Tarjeta where Numero_tarjeta ='".$tarjeta."' and codigo_seguridad = '".$codigo."' and EXTRACT(MONTH FROM Fecha_vencimiento) = '".$mes."' and EXTRACT(YEAR FROM Fecha_vencimiento) = '".$anio."';", $conexion);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pagado</title>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.0.js"
        integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../css/carteleras.css?v=<?php echo time(); ?>">
</head>

<body>
<?php require_once("../Menu.php") ?>
    <div class="container">
    <?php 
#session_start();
        if($saldo !=null && $saldo!=""){
            $saldo= $saldo[0][0];

            if($saldo >= floatval(str_replace("$","",$_GET['precio']))){

                $reservaciones = "SELECT * from Reservacion";
                $resultado = mysqli_query($conexion, $reservaciones);
                if($resultado){
                    $num_reservas = mysqli_num_rows($resultado);
                    mysqli_free_result($resultado);
                }

                $sql = "INSERT INTO Reservacion values('".($num_reservas+1)."', '".substr($_GET['asientos'], 1)."', '".$_SESSION['id']."', '".$_GET['horario']."');";                
                if ($conexion->query($sql) === TRUE) { ?>
        <center>
            <h1>Su pago se ha realizado con exito</h1>
            <img src="../img/exitoso.png" alt="Pago exitoso" style="width=400px; margin-top:2rem;">
        </center>

 <?php } else {
                  echo "Error: ";
                  header("location:javascript://history.go(-1)");
                }
            }
        }else{
            echo "No existe";
            header("location:javascript://history.go(-1)");
        }
    }else{
        header("location:javascript://history.go(-1)");
    }

?>

</div>
</body>
</html>