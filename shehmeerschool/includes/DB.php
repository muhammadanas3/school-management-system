<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stf_school";

$Connection=mysqli_connect($servername,$username,$password);
if (!$Connection)
 die("Connection failed: " . mysqli_connect_error() );

$ConnectingDB=new mysqli($servername, $username, $password, $dbname);
if ($ConnectingDB->connect_error)
 die("Connection failed: " . $ConnectingDB->connect_error);
?>