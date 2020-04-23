<?php
$connection_obj = mysqli_connect("{MYSQL_HOSTNAME}", "{MYSQL_USERNAME}", "{MYSQL_PASSWORD}", "{MYSQL_DATABASE}");
 
if (!$connection_obj) {
    echo "Error No: " . mysqli_connect_errno();
    echo "Error Description: " . mysqli_connect_error();
    exit;
}
 
// prepare the select query
$query = "SELECT * FROM employee";
 
// execute the select query
$result = mysqli_query($connection_obj, $query) or die(mysqli_error($connection_obj));
 
// run the select query
while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
    echo "ID:" . $row['id'] . "<br/>";
    echo "Name:" . $row['name'] . "<br/>";
    echo "Phone:" . $row['phone'] . "<br/>";
    echo "Email:" . $row['email'] . "<br/>";
    echo "<br/>";
}
 
// close the db connection
mysqli_close($connection_obj);
?>