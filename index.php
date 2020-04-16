<!DOCTYPE html>
<html>
<head>
	<title>GoldenCine</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="bootstrap\css\bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estilos1.css">
</head>
<body>
	<header>
		<nav class="menu">
			<p class="logo grid-element"><span class="span">GC</span><br> <strong>Tu cine ideal</strong></p>
			<a href="" class="grid-element" id="texto-invitado">Entrar como invitado</a>
	    </nav>
	</header>
	<ul class="nav nav-tabs" role="tablist">
  		<li class="nav-item">
    		<a class="nav-link active" id="iniciar-sesion-tab" href="#iniciar-sesion" data-toggle="tab" aria-selected="true">Iniciar Sesion</a>
  		</li>
  		<li class="nav-item">
    		<a class="nav-link" id="registro-tab" href="#registrarse" role="tab" data-toggle="tab" aria-selected="false">Registrarse</a>
  		</li>
	</ul>
	<div class="contenedor">

<div class="tab-content" id="myTabContent">
<div class="tab-pane fade" id="registrarse" role="tabpanel" aria-labelledby="registro-tab">
		<form action="post" class="formulario">
			<input type="text" name="nombre" class="item" placeholder="Ingrese su nombre">
			<div id="cont-calendario">
				<img class="icono" id="calendario" src="img/calendario.svg" alt="calendario">
				<input type="date" name="nacimiento" class="item">
				<input type="email" id="correo" name="correo" class="item" placeholder="Correo">
			</div>			
			<input type="tel" name="telefono" class="item" placeholder="271-000-00-00">
			<input type="password" name="password" class="item" placeholder="Contraseña">
			<input type="password" name="confirmar-password" class="item" placeholder="Confirmar contraseña">
			<input type="submit" name="registrarse" value="Registrarse" class="boton">
        </form>
	</div>
	<d class="tab-pane fade show active" id="iniciar-sesion" aria-labelledby="iniciar-sesion-tab">
	<form action="post" class="formulario " >
			<p class="texto">Correo</p>
			<img class="icono" src="img/usuario.svg" alt="usuario">
			<input type="email" name="correo" class="item-inicio" placeholder="example@gmail.com">
			<p class="texto">Contraseña</p>
			<img class="icono" src="img/contraseña.svg" alt="contraseña">
			<input type="password" name="password" class="item-inicio" placeholder="Contraseña">
			<input type="submit" name="entrar" value="Iniciar sesión" class="boton">
        </form>
	</div>

</div>

	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="bootstrap/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script></body>
</html>