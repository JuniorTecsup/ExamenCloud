<?php
require ('mysqldrive.php');
$db_con = new MySqlDrive();
//session_start();
$descripcion = "";
$precio = "";
$stock = "";
$id = "";
$update = FALSE;

if(isset($_POST['save'])){
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    //$query = "INSERT INTO users (username) VALUES ('".$username."')";
    //$query = "insert into users (descripcion,precio,stock) values('".$username."')";
    $query = "insert into articulos (descripcion,precio,stock) values('$descripcion','$precio','$stock')";

    $db_con = new MySqlDrive();

    $db_con->insert($query);
    
    $_SESSION['message'] = "Record Has been saved!";
    $_SESSION['msg_type'] = "success";
    
    header('location: index.php');

}

if(isset($_GET['delete'])){

    $id = $_GET['delete'];

    $query = "delete from articulos WHERE id=$id";

    $db_con->excute_query($query);

    $_SESSION['message'] = "Record Has been deleted!";
    $_SESSION['msg_type'] = "success";

    header("location: index.php");

}

if(isset($_GET['edit'])){

    $id = $_GET['edit'];

    $query = "select * from articulos WHERE id=$id";

    $result = mysqli_query($db_con->db_connect(), $query);

    if(mysqli_num_rows($result) == 1){
        $row = $result->fetch_array();
        $descripcion = $row['descripcion'];
        $precio = $row['precio'];
        $stock = $row['stock'];
        $id = $row['id'];
        $update = TRUE;
    }

}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $query2 = "update articulos SET descripcion='$descripcion',precio='$precio',stock='$stock' WHERE id=$id";
    //$query = "update users set username='"+$username+"' where id=$id";
    //$query = "update users set username='"+$username+"' where id=$id";
    //$query = 'update users set username="'.$username.'" where id="'.$id.'"';
    //-->$query = "update users set username='".$username."' where id='".$id."'";
    $result = mysqli_query($db_con->db_connect(), $query2) or die("Error: " . $mysqli->error);
    header('location: index.php');
}