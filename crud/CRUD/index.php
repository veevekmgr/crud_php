<?php
require_once('dbconnection.php'); //database taneko 
?>

<!DOCTYPE html>
<html>
<head>
	<title> PHP CRUD</title>
</head>
<body>
	<h1>Users</h1> <!-- aafae halnako laagi -->
	<a href="create.php">Add User</a>
	<?php
	$sql = 'SELECT * from users';//data dekhaune ki nai vanera
	if ($result = $pdo ->query($sql)){
		if ($result ->rowCount() >0) {
			
	?>
	

	<table border="1" >
		<tr>
			<th>ID</th>
			<th>First Name</th>
			<th>Last name</th>
			<th>Address</th>
			<th>Action</th>
		</tr>
		<?php
		while ( $row =$result-> fetch()){//if data xa vane fetch gareko loop lagaira xa <tr> lai

			?>
		<tr>
			<td><?php echo $row ['id']?></td>
			<td><?php echo $row ['f_name']?></td>
			<td> <?php echo $row ['l_name']?></td>
			<td><?php echo $row ['address']?></td>
			<td>
				<a href="read.php?id=<?php echo $row['id'] ?>">View</a>
				<a href="update.php?id=<?php echo $row['id'] ?>">Edit</a>
				<a href="delete.php?id=<?php echo $row['id'] ?>">Delete</a>
			</td>
		</tr>
		<!-- </tr>
			<tr>
			<td>002</td>
			<td>Bibek</td>
			<td> Khatri</td>
			<td>Sanga</td>
		</tr> -->
		<?php
	         }
		?>
	</table>
	<?php
		}
	 }
	?>

</body>
</html>