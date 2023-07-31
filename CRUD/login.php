<?php
session_start();

if(isset($_SESSION["usuario"])) {
    header("Location: index.php");
    exit();
}
require_once("php/database.php");

if(isset($_POST['submit'])){
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $usuario = mysqli_real_escape_string($conn, $usuario);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) == 1){
        $_SESSION['usuario'] = $row['usuario'];
        header("Location: index.php"); // redirige al archivo principal
    }else{
        $error = "El nombre de usuario o la contraseña son incorrectos. Por favor, intenta nuevamente.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>TGestiona</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/fondo1.css">
</head>

<body>
	<!-- Cuadrados flotantes -->
	<ul class="glass">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
	<!-- /.Cuadrados flotantes -->
	<!-- Contenedor principal -->
	<div class="d-flex justify-content-center align-items-center colorBackground ">
		<!-- Tarjeta Login -->
		<div>
			<!-- Encabezado de tarjeta -->
			<div class="d-flex justify-content-center align-items-center mb-5">
				<div class="circle">
					<img src="img/pato1.jpg" alt="Logo" class="rounded-circle img-fluid">
				</div>
			</div>
			<!-- /.Encabezado de tarjeta -->

			<!-- Cuerpo de la tarjeta -->
			<div class="card fat">
				<div class="card-body">
					<h4 class="card-title">Iniciar sesión</h4>
					<form method="GET" class="my-login-validation" novalidate="">
						<div class="form-group">
							<label for="username">Correo</label>
							<input id="username" type="username" class="form-control" name="username" value="" required autofocus>
							<div class="invalid-feedback">
								Correo valido
							</div>
						</div>
						<div class="form-group">
							<label for="password">Contraseña</label>
							<input id="password" type="password" class="form-control" name="password" required data-eye>
							<div class="invalid-feedback">
								se requiere contraseña
							</div>
						</div>
						<div class="form-group">
							<div class="custom-checkbox custom-control">
								<input type="checkbox" name="remember" id="remember" class="custom-control-input">
								<label for="remember" class="custom-control-label">Recuérdame</label>
							</div>
						</div>
						<div class="form-group m-0">
							<button type="submit" class="btn btn-primary btn-block">
								Iniciar sesión
							</button>
						</div>
					</form>
				</div>
			</div>
			<!-- Cuerpo de la tarjeta -->

			<!-- Pie de Tarjeta -->
			<div class="footer">
				Desarrollado por: <a href="https://www.facebook.com/julian.ocola">1302519@senati.pe
				</a>|| Copyright &copy;
				<?php echo date('Y'); ?> &mdash; SENATI</a>
			</div>
			<!-- /.Pie de Tarjeta -->
		</div>
		<!-- /.Tarjeta Login -->
	</div>
	<!-- /.Contenedor principal -->
</body>

</html>