<?php
require ('MySqlDrive.php');
$db_con = new mysqldrive();

//session_start();
$nombre = "";
$email = "";
$clave = "";
$cifrada = "";
$update = FALSE;

if(isset($_POST['save'])){
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $clave = $_POST['clave'];
    $cifrada = md5($clave);
    //return $decifrada;
    //$query = "INSERT INTO users (username) VALUES ('".$username."')";
    //$query = "insert into users (descripcion,precio,stock) values('".$username."')";
    $query = "insert into empleados (nombre,email,clave) values('$nombre','$email','$cifrada')";

    $db_con = new MySqlDrive();

    $db_con->insert($query);
    
    $_SESSION['message'] = "Record Has been saved!";
    $_SESSION['msg_type'] = "success";
    
    header('location: empleados.php');

}

if(isset($_GET['delete'])){

    $id = $_GET['delete'];

    $query = "delete from empleados WHERE id=$id";

    $db_con->excute_query($query);

    $_SESSION['message'] = "Record Has been deleted!";
    $_SESSION['msg_type'] = "success";

    header("location: empleados.php");

}

if(isset($_GET['edit'])){

    $id = $_GET['edit'];

    $query = "select * from empleados WHERE id=$id";

    $result = mysqli_query($db_con->db_connect(), $query);

    if(mysqli_num_rows($result) == 1){
        $row = $result->fetch_array();
        $nombre = $row['nombre'];
        $email = $row['email'];
        $clave = $row['clave'];
        $id = $row['id'];
        $update = TRUE;
    }

}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $query2 = "update empleados SET nombre='$nombre',email='$email' WHERE id=$id";
    //$query = "update users set username='"+$username+"' where id=$id";
    //$query = "update users set username='"+$username+"' where id=$id";
    //$query = 'update users set username="'.$username.'" where id="'.$id.'"';
    //-->$query = "update users set username='".$username."' where id='".$id."'";
    $result = mysqli_query($db_con->db_connect(), $query2) or die("Error: " . $mysqli->error);
    header('location: empleados.php');
}