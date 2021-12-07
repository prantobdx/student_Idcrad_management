<?php
 session_start();

require_once ("conn.php");

//insert data  

	if (isset($_POST['save']))
	 {
		$name = $_POST['name'];
		$address = $_POST['address'];
        $institute = $_POST['institute'];

		$img = $_FILES['uploadfile']['name'];

		$sql = "INSERT INTO student (name, address, institute, image) VALUES ('$name', '$address','$institute', '$img') "; 

 		 $result = mysqli_query($conn,$sql);
 		  
 		  if($result)
 		  {
 		  	move_uploaded_file($_FILES["uploadfile"]["tmp_name"], "student-image/".$img);
 		  	$_SESSION['success'] ="Data added sucessfully";
 		  	header("Location: index.php");
 		  }
 		  else{
 		  	$_SESSION['success'] = "Data not Inserted";
 		  	header("Location: index.php");
 		  }
	}

//Update data with image changes.

if (isset($_POST['Update']))	   
{

$edit_id = $_POST['edit_id'];
$edit_name = $_POST['name'];
$edit_address = $_POST['address'];
$edit_institute = $_POST['institute'];
$edit_image = $_FILES['uploadfile']['name'];

$query = "UPDATE student SET name='$edit_name',address='$edit_address', institute='$edit_institute',image='$edit_image' WHERE id='$edit_id'";
$query_run = mysqli_query($conn,$query);

if($query_run)
 {
 	move_uploaded_file($_FILES["uploadfile"]["tmp_name"], "student-image/".$edit_image);
 		  	$_SESSION['success'] ="Data Updated sucessfully";
 		  	header("Location: index.php");
 }
 else
 {
 	$_SESSION['success'] = "Data not Updated";
 	header("Location: index.php");
 }
}

//Delete data
if(isset($_POST['delete_btn']))
{
	$id = $_POST['delete_id'];
	$s_image = $_POST['delete_image']; 

	$query ="DELETE FROM student WHERE id='$id' ";
	$query_run = mysqli_query($conn,$query);
	if ($query_run)
	{
	 unlink("student-image/".$s_image);	
	$_SESSION['status'] = "Data deleted Sucessfully";
 	header("Location: index.php");
	}
	else 
	{
	$_SESSION['status'] = "Data not deleted";
 	header("Location: index.php");	
	}

}

