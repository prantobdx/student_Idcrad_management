
<?php

require_once ("conn.php");

// Create database
$sql = "CREATE DATABASE students_idcard_information";
if ($conn->query($sql) === TRUE)
{
  echo "Database created successfully";
} else 
{
  echo "Error creating database: " . $conn->error;
}

//create table
$sql = "CREATE TABLE student  (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    address VARCHAR(255) NOT NULL,
    image VARCHAR(20) NOT NULL
    institute VARCHAR(255) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

if ($conn->query($sql) === TRUE) {
  echo "Table student created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}


$conn->close();
?>