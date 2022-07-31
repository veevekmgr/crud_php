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
			$sql = 'INSERT INTO users(f_name, l_name, address) VALUES(:f_name, :l_name, :address)';//:f_name for dyamic value insert garna
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

<!DOCTYPE html>
<html>
<head>
	<title>Add user</title>
</head>
<body>

<form action="" method="POST">
	<?php if (!empty($f_name_err)) echo $f_name_err."<br>"?>
	<label for="f_name">First Name:</label>
	<input type="text" id="f_name" name="f_name" /><br><br>
	<?php if (!empty($l_name_err)) echo $l_name_err."<br>"?>
	<label for="l_name">Last Name:</label>
	<input type="text" id="l_name" name="l_name" /><br><br>
	<?php if (!empty($address_err)) echo $address_err."<br>"?>
	<label for="address"> Address:</label>
	<input type="text" id="address" name="address" /><br><br>
	<button type="submit">Add</button>


	
</form>
</body>
</html>