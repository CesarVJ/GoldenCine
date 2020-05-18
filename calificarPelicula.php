<?php
if(isset($_GET["id"])){
    if(!empty(trim($_POST["estrella-actual"]))){
        require("conexion.php");    
        $conexion= abrirConexion();
        $consultaNumCalif = "select num_calif, calificacion from Pelicula where id_pelicula = '".$_GET['id']."'";
        $numCalif = $conexion -> query($consultaNumCalif);
        $row = $numCalif->fetch_assoc();
        $numCalif = $row["num_calif"];
        $calificacionActual= $row["calificacion"];
        $calificacionEntrante = trim($_POST["estrella-actual"]);
        echo "Nueva= ". $calificacionEntrante;

        echo "Calificacion Actual: ". $calificacionActual;
        echo "Num calificacoos: ".$numCalif;


        $sql = "UPDATE Pelicula SET num_calif = num_calif + 1 WHERE id_pelicula = ".$_GET['id']; // Se actualiza el numero de calificaciones
        $sql2 = "UPDATE Pelicula SET calificacion = calificacion + ".$calificacionEntrante."  WHERE id_pelicula = ".$_GET['id'];


        /*if($numCalif == '0' || $numCalif == 0){
            $sql2 = "UPDATE Pelicula SET calificacion = ".$calificacionEntrante."  WHERE id_pelicula = ".$_GET['id'];
        }else{
            $sql2 = "UPDATE Pelicula SET calificacion = (calificacion + ".$calificacionEntrante." ) / num_calif WHERE id_pelicula = ".$_GET['id'];
        }*/


        if ($conexion->query($sql) === TRUE) {
            echo "Se ha actualizado el numero de calificaciones";
          } else {
            echo "Error al actualizar ";
          }

          if ($conexion->query($sql2) === TRUE) {
            echo "Se ha actualizado la calificacion";
          } else {
            echo "Error al actualizar ";
          }
          header("location: paginas/carteleraCliente.php?calificacion=valida");

    }
}


?>