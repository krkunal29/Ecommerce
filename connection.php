<?php
$serverName = 'localhost';
$username   = 'root';
$password   = '';
$databaseName = 'e-commerce';
$conn = new mysqli($serverName,$username,$password,$databaseName)or die(mysqli_connect_error());
?>
