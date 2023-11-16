<?php

//connection to the db server
$host = "localhost"; //IP address of remote server
$user = "developer";
$password = "12345678";
$dbname = "Chef60";

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// mysqli_close($local_conn);
?>