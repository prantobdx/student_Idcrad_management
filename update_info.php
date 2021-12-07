<?php
	session_start();
	include_once("conn.php");	
?> 

<!DOCTYPE html>
<html>
<head>
	<title>Student-id Info managment</title>

	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<?php 
	if(isset($_POST['edit_data_btn']))
	{
		$id = $_POST['edit_id'];

		$query = "SELECT * FROM student WHERE id='$id' ";
		$query_run = mysqli_query($conn,$query);
		foreach($query_run as $row)
		{
       ?>
		<form method="POST" action="manage_info.php"  enctype="multipart/form-data">
		<h2>Update Student information</h2>

		<input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>" >

		<div class="input-group">
			<label>Name</label>
			<input type="text" name="name" value="<?php echo $row['name'] ?>" required>
		</div>
		<div class="input-group">
			<label>Address</label>
			<input type="text" name="address" value="<?php echo $row['address'] ?>" required>
		</div>

		<div class="input-group">
			<label>Institute</label>
			<input type="text" name="institute" value="<?php echo $row['institute'] ?>" required>
		</div>

		<div class="input-group-img">
			<label>Image Upload</label>
			<input type="file" name="uploadfile" value="<?php echo $row['image'] ?>" id="image" required>
		</div>

		<div class="input-group">

			<button class="btn" type="submit" name="Update" >Update</button>
		</div>
	</form>
<?php
		}
	}
?>
	
</body>
</html>