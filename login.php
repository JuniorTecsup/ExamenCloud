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
require('db.php');
session_start();
if (isset($_POST['username'])){
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($con,$username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
        $query = "SELECT * FROM `users` WHERE username='$username'
and password='".md5($password)."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['username'] = $username;
	    header("Location: index.php");
         }else{
	echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
	}
    }else{
?>
	<form class="login" action="" method="post" name="login">
    <h1 class="login-title">Login | vilchez.com</h1>
    <input type="text" class="login-input" name="username" placeholder="Usuario" autofocus>
    <input type="password" class="login-input" name="password" placeholder="Clave">
    <input type="submit" value="Login" name="submit" class="login-button">
  <p class="login-lost">Eres nuevo aqui? <a href="registration.php">Registrarse</a></p>
  </form>
 
<?php } ?>
</body>
</html>