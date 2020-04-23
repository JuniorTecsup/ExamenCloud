<?php
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Inicio</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<div class="form">
<h1 >Bienvenido <?php echo $_SESSION['username']; ?>!</h1>
<p >Informate aqui de las ultimas noticias!</p>
<p><a href="dashboard.php">Ver noticias</a></p>
<a href="logout.php">Cerrar sesion</a>
</div>
</body>
</html>