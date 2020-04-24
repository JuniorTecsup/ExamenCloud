<!DOCTYPE html>
<!--PHP login System by WEBDEVTRICK (https://webdevtrick.com) -->
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
require('db.php');//aqui llama a la conecion
//require ('MySqlDrive.php');
//$db_con = new mysqldrive();

session_start();
if (isset($_POST['nombre'])){
	$nombre = stripslashes($_REQUEST['nombre']);
	$nombre = mysqli_real_escape_string($con,$nombre);
	$clave = stripslashes($_REQUEST['clave']);
	$clave = mysqli_real_escape_string($con,$clave);
        $query = "SELECT * FROM empleados WHERE nombre='$nombre'
and clave='".md5($clave)."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['nombre'] = $nombre;
	    header("Location: menu.php");
         }else{
	echo "<div class='form'>
<h3>Nombre/Contraseña son incorrectas.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
	}
    }else{
?>
	<form class="login" action="" method="post" name="login">
    <h1 class="login-title">Login | vilchez.com</h1>
    <input type="text" class="login-input" name="nombre" placeholder="Usuario" autofocus>
    <input type="password" class="login-input" name="clave" placeholder="Clave">
    <input type="submit" value="Login" name="submit" class="login-button">
  </form>
 
<?php } ?>
</body>
</html>