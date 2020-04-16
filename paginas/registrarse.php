<!DOCTYPE html>
<html>
<head>
	<title>Registrarse</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/estilos1.css">
</head>
<body>

	<div class="contenedor tab-pane fade" id="registrarse" role="tabpanel" aria-labelledby="profile-tab">
		<form action="post" class="formulario">
            <h1 class="encabezado">Registrarse</h1>
			<input type="text" name="nombre" class="item" placeholder="Ingrese su nombre">
			<input type="date" name="nacimiento" class="item">
			<input type="text" name="correo" class="item" placeholder="Correo">
			<input type="tel" name="telefono" class="item" placeholder="271-000-00-00">
			<input type="password" name="password" class="item" placeholder="Contraseña">
			<input type="password" name="confirmar-password" class="item" placeholder="Confirmar contraseña">
			<input type="submit" name="registrarse" value="Registrarse" class="jumbotron">
			
        </form>
	</div>

</body>
</html>