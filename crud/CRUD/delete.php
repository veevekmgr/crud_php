<?php 
	//$param_id = trim($_GET('id'));
	if (isset($_GET['id']) && !empty($_GET['id'])) {
	//if (isset($param_id) && !empty($param_id)) {
		require_once('dbconnection.php');
		$param_id = trim($_GET['id']);
		
		$sql = 'DELETE FROM users WHERE id =:id';
		if ($stmt =$pdo -> prepare($sql)) {
			$stmt ->bindParam(':id',$param_id);

			if ($stmt->execute()) {
				header('Location: index.php');
				exit();

			}else{
				echo "Something went wrong. Please try again later.";
				echo "<a href='index.php'>Back to Homepage </a>";
			}
		}
		unset($stmt);
		unset($pdo);

	}
 ?>
