<?php

$servername = "sdp.db";
$username = "khalidalawar";
$password = "toor";

$conn = mysql_connect($servername, $username, $password);

mysql_select_db('SDP');


// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//else echo "Connected successfully";
?>
