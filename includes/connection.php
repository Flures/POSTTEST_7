<?php

$conn = mysqli_connect("localhost", "root", "", "accessories");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . mysqli_connect_error());
}
?>