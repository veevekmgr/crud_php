<?php 
	$f_name_val = $l_name_val = $address_val='';
	if (isset($_GET['id']) && !empty($_GET['id'])) {
		require_once('dbconnection.php');
		$param_id = trim($_GET['id']);
		
		$sql = 'SELECT * FROM users WHERE id =:id';
		if ($stmt =$pdo -> prepare($sql)) {
			$stmt ->bindParam(':id',$param_id);

			if ($stmt->execute()) {
				if($stmt -> rowCount() == 1){
					$row= $stmt->fetch();
					$f_name_val=$row['f_name'];
					$l_name_val=$row['l_name'];
					$address_val=$row['address'];
			}

			}else{
				echo "Something went wrong. Please try again later.";
				echo "<a href='index.php'>Back to Homepage </a>";
			}
		}

	}
 ?>
 <!--php create.php code-->

 <?php 
	$f_name= $l_name= $address='';
	$f_name_err = $l_name_err =$address_err ='';
	if($_SERVER['REQUEST_METHOD']=='POST'){
		require_once('dbconnection.php');
		$f_name= trim($_POST['f_name']);
		$l_name=trim($_POST['l_name']);
		$address=trim($_POST['address']);

		if(empty($f_name)){
			$f_name_err = 'Please add first name.';
		}

		if(empty($l_name)){
			$l_name_err = 'Please add last name.';
		}

		if(empty($address)){
			$address_err = 'Please add address.';
		}

		if(empty($f_name_err) && empty($l_name_err) && empty($address_err)){
			$sql = "UPDATE users ". "SET f_name = $f_name"."SET l_name = $l_name"."SET address = $address"."WHERE id = :id"/:f_name for dyamic value insert garna
			if ($stmt = $pdo->prepare($sql)) {
				$stmt->bindParam(':f_name', $f_name);
				$stmt->bindParam(':l_name', $l_name);
				$stmt->bindParam(':address', $address);

				if ($stmt->execute()) {
					header('location: index.php');
					exit();
				}
				else{
					echo "Something went wrong. Please try again later.";
				}
			}
			unset($stmt);
		}
		unset($pdo);
	}
 ?>
 <!--php create.php code ends here-->



<!DOCTYPE html>
<html>
<head>
	<title>Update User</title>
</head>
<body>

<form action="" method="POST">
	<?php if (!empty($f_name_err)) echo $f_name_err."<br>"?>
	<label for="f_name">First Name:</label>
	<input type="text" id="f_name" name="f_name" value="<?php echo $f_name_val?>" /><br><br>
	<?php if (!empty($l_name_err)) echo $l_name_err."<br>"?>
	<label for="l_name">Last Name:</label>
	<input type="text" id="l_name" name="l_name" value="<?php echo $l_name_val?>"/><br><br>
	<?php if (!empty($address_err)) echo $address_err."<br>"?>
	<label for="address"> Address:</label>
	<input type="text" id="address" name="address" value="<?php echo $address_val?>"/><br><br>
	<button type="submit">Add</button>


	
</form>
</body>
</html>