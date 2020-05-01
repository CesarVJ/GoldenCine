<?php
    #Proceso de almacenado de imagen
    $imagenes = 'img/portadas/';
    $imagenSubida = $imagenes . basename($_FILES['portada']['name']);                                        
    if (move_uploaded_file($_FILES['portada']['tmp_name'], $imagenSubida)) {
        echo "Imagen Guardada";
    } else {
       echo "Error al descargar imagen";
    }
?>