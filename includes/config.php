<?php
$servername = "localhost";
$database = "closetome";
$username = "team_closetome";
$password = "6Ic5z#4s";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
