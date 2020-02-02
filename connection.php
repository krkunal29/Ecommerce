<?php
$serverName = 'localhost';
$username   = 'kissan_agro';
$password   = 'kissan_agro';
$databaseName = 'kissan_agro';
$conn = new mysqli($serverName,$username,$password,$databaseName)or die(mysqli_connect_error());
?>