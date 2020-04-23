<?php
require ('core/MySqlDrive.php');
$db_con = new MySqlDrive();

session_start();
$name = "";
$phone = "";
$roll = "";
$id = "";
$update = FALSE;

if(isset($_POST['save'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $roll = $_POST['roll'];

    $query = "INSERT INTO student (name, phone, roll) VALUES ('$name', '$phone', '$roll')";

    $db_con = new MySqlDrive();

    $db_con->insert($query);

    $_SESSION['message'] = "Record Has been saved!";
    $_SESSION['msg_type'] = "success";

    header('location: index.php');

}

if(isset($_GET['delete'])){

    $id = $_GET['delete'];

    $query = "DELETE FROM student WHERE id=$id";

    $db_con->excute_query($query);

    $_SESSION['message'] = "Record Has been deleted!";
    $_SESSION['msg_type'] = "success";

    header("location: index.php");

}

if(isset($_GET['edit'])){

    $id = $_GET['edit'];

    $query = "SELECT * FROM student WHERE id=$id";

    $result = mysqli_query($db_con->db_connect(), $query);

    if(mysqli_num_rows($result) == 1){
        $row = $result->fetch_array();
        $name = $row['name'];
        $phone = $row['phone'];
        $roll = $row['roll'];
        $id = $row['id'];
        $update = TRUE;
    }

}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $query = "UPDATE student SET name='$name' WHERE id=$id";
    $result = mysqli_query($db_con->db_connect(), $query) or die("Error: " . $mysqli->error);
    header('location: index.php');
}