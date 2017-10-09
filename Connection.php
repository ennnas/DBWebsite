<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		define('DB_HOST','localhost');   //DATABASE HOST
		define('DB_USERNAME','root');   //DATABASE USERNAME
		define('DB_PASSWORD','');   //DATABSE PASSWORD
		define('DB_NAME','sito_web');   //DATABASE NAME

		function connectDB(){
			$connessione=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die("Could not connect : " . mysqli_error($connessione)); //
			return $connessione;
		}
?>
</body>
</html>
