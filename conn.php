
<?php
Class DbConnection{

var $servername = "localhost";
var $username = "root";
var $password = "";
var $database = "students_idcard_information";

public function connect(){
// Create connection
$conn = mysqli_connect ($this->servername, $this->username, $this->password, $this->database);
return $conn;

if($conn->connect_error)
{
  echo "failed".$conn->connect_error;
}
// Check connection
 else{
echo "Connection Successfull";

    }
  }

 } 
