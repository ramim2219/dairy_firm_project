<?php 
$username = "root";
$password = "";
$hostname = "localhost"; 
$db = "dairy_firm_management_system";

$conn = mysqli_connect($hostname, $username, $password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}