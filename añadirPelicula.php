<?php
    include 'conexion.php';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $conexion = abrirConexion();
        echo "Se abrio la conexion";

        if(empty(trim($_POST["titulo"])) || empty(trim($_POST["portada"]))
                || empty(trim($_POST["descripcion"])) || empty(trim($_POST["duracion"])) 
                    ||  empty(trim($_POST["actores"])) || empty(trim($_POST["categoria"]))){
                        

        }

    }






?>