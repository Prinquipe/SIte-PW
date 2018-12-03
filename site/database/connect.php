<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name="forum";

$db = mysqli_connect($servername, $username, $password,$db_name) or die("Connection failed: " . $conn->connect_error);
 
?>