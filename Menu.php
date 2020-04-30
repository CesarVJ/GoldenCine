<?php
    session_start();
	$cartelera="";
	if($_SESSION['tipo']=='Administrador'){
		$cartelera="carteleraAdmin.php";
	}else{
		$cartelera="carteleraCliente.php";
    }
?>


<nav id="navegacion">
    <ul id="menu">
        <li><a href="../index.php">Cartelera</a></li>
        <li name="categorias" id="categorias"><a href="">Categorias</a>
            <ul>
                <li><a href="<?php echo $cartelera.'?categoria=accion'?>">Acción</a></li>
                <li><a href="<?php echo $cartelera.'?categoria=aventura'?>">Aventura</a></li>
                <li><a href="<?php echo $cartelera.'?categoria=CienciaFiccion'?>">Ciencia Ficción</a></li>
                <li><a href="<?php echo $cartelera.'?categoria=terror'?>">Terror</a></li>
                <li><a href="<?php echo $cartelera.'?categoria=drama'?>">Drama</a></li>
                <li><a href="<?php echo $cartelera.'?categoria=comedia'?>">Comedia</a></li>
                <li><a href="<?php echo $cartelera.'?categoria=infantiles'?>">Infantiles</a></li>
                <li><a href="<?php echo $cartelera.'?categoria=otro'?>">Otro</a></li>
            </ul>
        </li>
        <li id="cerrar-sesion"><a href="../cerrarSesion.php">Cerrar Sesión</a></li>
    </ul>
</nav>