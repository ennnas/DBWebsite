<html>
	<head>
	</head>
	<body>
		<?php
	//inserisco le variabili che utilizzo per la connessione e le query
			include 'Connection.php';
			$connessione = connectDB();
			//echo 'Connected successfully'.'<br/>';
			//mysqli_select_db($db) or die("Could not select database");
			$pwd = md5($_POST["Password"]);
			
			if($_POST["Tipo"]=="C"){
				$query = "insert into cliente (Citta,Indirizzo,Telefono,N_siti,spesa_totale) values('".$_POST["Citta"]."','".$_POST["Indirizzo"]."','".$_POST["Telefono"]."',0,0)";
				//echo $query.'<br/>';
				$result = mysqli_query($connessione,$query) or die("Query failed : " . mysqli_error($connessione));
				$query = "select max(codice) as ID from cliente";
				$result = mysqli_query($connessione,$query) or die("Query failed : " . mysqli_error($connessione));
				$row = mysqli_fetch_array($result, MYSQL_ASSOC);
				$id = $row["ID"];
				//echo $id."<br>";
			}
			else if($_POST["Tipo"]=="S"){
				$query = "insert into sviluppatore values('".$_POST["PIVA"]."','".$_POST["Nome"]."','".$_POST["Cognome"]."','".$_POST["Telefono"]."')";
				//echo $query.'<br/>';
				$result = mysqli_query($connessione,$query) or die("Query failed : " . mysqli_error($connessione));
				$id = $_POST["PIVA"];
			} 
			$query = "insert into utenti values('".$_POST["Username"]."','".$pwd."','".$_POST["Tipo"]."',".$id.")";
			//echo $query.'<br/>';
			$result = mysqli_query($connessione,$query) or die("Query failed : " . mysqli_error($connessione)); 
			mysqli_close($connessione);
			header("Location: index.html");
    		exit;
		?>
	</body>
</html>