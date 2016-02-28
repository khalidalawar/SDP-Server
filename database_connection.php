<?php

$servername = "sdp.db";
$username = "khalidalawar";
$password = "khalid7";

$conn = mysql_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>