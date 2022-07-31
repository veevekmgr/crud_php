
<?php 
	//$param_id = trim($_GET('id'));
	if (isset($_GET['id']) && !empty($_GET['id'])) {
	//if (isset($param_id) && !empty($param_id)) {
		require_once('dbconnection.php');
		$param_id = trim($_GET['id']);
		
		$sql = 'SELECT * FROM users WHERE id =:id';
		if ($stmt =$pdo -> prepare($sql)) {
			$stmt ->bindParam(':id',$param_id);

			if ($stmt->execute()) {
				if($stmt -> rowCount() == 1){
					$row= $stmt->fetch();
				echo 'First Name:'.$row['f_name'].'<br>';
				echo 'Last Name:'.$row['l_name'].'<br>';
				echo 'Address:'.$row['address'].'<br>';
			}

			}else{
				echo "Something went wrong. Please try again later.";
				echo "<a href='index.php'>Back to Homepage </a>";
			}
		}

	}
 ?>