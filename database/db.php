<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = mysqli_connect("pg-db1","root","root","campus_stay");


if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}
?>
