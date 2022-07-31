
<?php 
define('DB_SERVER', 'LOCALHOST');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'CRUD');


try{
	$pdo=new PDO('mysql:host='.DB_SERVER.';dbname='.DB_NAME, DB_USERNAME, DB_PASSWORD);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//echo ('Hurray, Database connected!!');

}catch(PDOException $e){
	dir('ERROR: Could not connect'.$e->getMessage());
}//database connection



 ?>