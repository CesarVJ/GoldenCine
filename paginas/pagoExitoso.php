<?php 
session_start();
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
                if ($conexion->query($sql) === TRUE) {
                  echo "Se realizo la compra";
                } else {
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