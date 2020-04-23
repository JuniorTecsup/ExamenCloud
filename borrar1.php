<?php
//$connection_obj = mysqli_connect("{MYSQL_HOSTNAME}", "{MYSQL_USERNAME}", "{MYSQL_PASSWORD}", "{MYSQL_DATABASE}");
include("auth.php");

/*if (!$connection_obj) {
    echo "Error No: " . mysqli_connect_errno();
    echo "Error Description: " . mysqli_connect_error();
    exit;
^*/
 
// initialize variables for the delete query
$id = 1;
 
// prepare the insert query
$query = "DELETE FROM employee WHERE `id` = '". (int) $id ."'";
 
// run the delete query
mysqli_query($connection_obj, $query);
 
// close the db connection
mysqli_close($connection_obj);
?>