<?php
function abrirConexion(){
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpassword = "";
    $database = "GoldenCine";

    $conexion = new mysqli($dbhost, $dbuser, $dbpassword, $database) or die("Fallo la conexión:%s\n".$conexion ->error);
    return $conexion;
}

function cerrarConexion($conexion){
    $conexion -> close();
}

function ejecutarConsulta($consulta, $Conexion){
    $resultados = $result = $tupla = null;
    $valor = "";
    $i = $j =0;
    if ($consulta == ""){
           throw new Exception("No se especifico ninguna consulta");
        }
        if ($Conexion == null){
            echo "null error";
            throw new Exception("Error de conexión");
        }
        try{
            $result = $Conexion->query($consulta); 
        }catch(Exception $error){
            throw $error;
        }
        if ($result){
            
            foreach($result as $tupla){ 
                foreach($tupla as $clave=>$columna){
                    if (is_string($clave)){
                        $resultados[$i][$j] = $columna;
                        $j++;
                    }
                }
                $j=0;
                $i++;
            }
        }
        return $resultados;
}


?>