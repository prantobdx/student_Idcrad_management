
<?php
require_once ("conn.php");

$conn = new DbConnection();

 $results = mysqli_query($conn->connect(), "SELECT * FROM student"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Student-id Info managment</title>

	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<h2 style="text-align:center;width:60%;
    margin: 20px auto; color:black;"><u>Students Id-Card Information Manage </u></h2>

<table>
	<?php  
 	session_start();
    if(isset($_SESSION['success']) && $_SESSION['success'] !='')
    {
    	echo'<h2 style="text-align:center; background-color:green;width:60%;
    margin: 30px auto; color:white;"> '.$_SESSION['success'].' </h2>';
    	unset($_SESSION['success']);
    }

     if(isset($_SESSION['status']) && $_SESSION['status'] !='')
    {
    	echo'<h2 style="text-align:center; background-color:red;width:60%;
    margin:30px auto; color:white;"> '.$_SESSION['status'].' </h2>';
    	unset($_SESSION['status']);
    }

    ?>

	<thead>
		<tr>
			<th>SL</th>
			<th>Name</th>
			<th>Address</th>
			<th>Institu</th>
			<th>Image</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php $count=0;
	 while ($row = mysqli_fetch_array($results)) { $count++ ?>
		<tr>
			<td><?php echo $count; ?></td>

			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['address']; ?></td>
			<td><?php echo $row['institute']; ?></td>

		<td> <img src="<?php echo "student-image/".$row['image']; ?>" width="100px" height="60px" alt="image"> </td>

			<td>
				<form action="update_info.php" method="POST" style="border:none;">
					<input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>" >
					<button type="submit" name="edit_data_btn" class="edit_btn">Edit</button>
				</form>
			</td>

			<td>
				<form action="manage_info.php" method="POST" style="border:none;">
					<input type="hidden" name="delete_id" value="<?php echo $row['id'] ?>" >
					<input type="hidden" name="delete_image" value="<?php echo $row['image'] ?>" >

					<button type="submit" name="delete_btn" class="del_btn" onclick="return confirm('Are you sure to delete this data')">Delete</button>
				</form>
			</td>
		</tr>
	<?php } ?>
	<tfoot>
		<tr>
			<th>SL</th>
			<th>Name</th>
			<th>Address</th>
			<th>Institute</th>
			<th>Image</th>
			<th colspan="2">Action</th>
		</tr>
	</tfoot>
	</table>

</body>
</html>