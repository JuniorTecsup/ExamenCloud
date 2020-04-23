<?php
//$connection_obj = mysqli_connect("{MYSQL_HOSTNAME}", "{MYSQL_USERNAME}", "{MYSQL_PASSWORD}", "{MYSQL_DATABASE}");

$connection_obj = mysqli_connect("ocvwlym0zv3tcn68.cbetxkdyhwsb.us-east-1.rds.amazonaws.com","hba90vutj8x99kac","np0qawe93yjdcgld","b83b60bwal8v2w60"); 

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