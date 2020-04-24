<?php
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Inicio</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>



<div class="container">        	
<div style="margin-left: 10px;">
<h1 style="text-align: center;margin-top: 20px;">Bienvenido <?php echo $_SESSION['nombre']; ?>!</h1>
<div class="shadow-none p-3 mb-5 bg-light rounded" style="margin-top: 25px;max-height:45px">
        <ul>
          <a href="menu.php">Menú</a><span> / </span>
        </ul>
</div>
<p style="text-align: center;margin-bottom: 20px;margin-top: 40px;">Menu de gestion</p>
<div align="center"><a class="btn btn-primary" href="index.php" role="button">Gestionar articulos</a><br><br></div>
<div align="center"><a class="btn btn-primary" href="empleados.php" role="button">Gestionar empleados</a><br><br></div>
<div align="center"><a class="btn btn-danger" href="logout.php" role="button">Cerrar sesion</a></div>
</div>
</div>
</body>
</html>