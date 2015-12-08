<?php

$username = "root";
$password = "";
$hostname = "localhost"; 
$db_name = "dbtslpd";


//Create Connection
$db_con = mysqli_connect($hostname, $username, $password, $db_name);
if ($db_con->connect_error) {
    die("Connection failed: " . $db_con->connect_error);
} 

?>