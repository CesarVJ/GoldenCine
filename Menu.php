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
                <li><a href="<?php echo $cartelera.'?categoria=Accion'?>">Acción</a></li>
                <li><a href="<?php echo $cartelera.'?categoria=Aventura'?>">Aventura</a></li>
                <li><a href="<?php echo $cartelera.'?categoria=CienciaFiccion'?>">Ciencia Ficción</a></li>
                <li><a href="<?php echo $cartelera.'?categoria=Terror'?>">Terror</a></li>
                <li><a href="<?php echo $cartelera.'?categoria=Drama'?>">Drama</a></li>
                <li><a href="<?php echo $cartelera.'?categoria=Comedia'?>">Comedia</a></li>
                <li><a href="<?php echo $cartelera.'?categoria=Infantiles'?>">Infantiles</a></li>
                <li><a href="<?php echo $cartelera.'?categoria=Otro'?>">Otro</a></li>
            </ul>
        </li>
        <li id="cerrar-sesion"><a href="../cerrarSesion.php">Cerrar Sesión</a></li>
    </ul>
</nav>