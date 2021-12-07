
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "students_idcard_information";


// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

