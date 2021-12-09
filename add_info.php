<?php
	session_start();
	include_once "conn.php";
?> 

<!DOCTYPE html>
<html>
<head>
	<title>Student-id Info managment</title>

	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<form method="POST" action="manage_info.php"  enctype="multipart/form-data">
		<h2>Add Student information</h2>
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="name" value="" required>
		</div>
		<div class="input-group">
			<label>Address</label>
			<input type="text" name="address" value="" required>
		</div>

		<div class="input-group">
			<label>Institute</label>
			<input type="text" name="institute" value="" required>
		</div>

		<div class="input-group-img">
			<label>Image Upload</label>
			<input type="file" name="uploadfile" value="" id="image" required>
		</div>

		<div class="input-group">
			<button class="btn" type="submit" name="save" >Save</button>
		</div>
	</form>
</body>
</html>