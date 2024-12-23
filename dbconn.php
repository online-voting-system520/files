<?php
$conn=new mysqli('localhost','root','','voters data');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>