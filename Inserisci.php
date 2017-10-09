<html>
	<head>
	</head>
	<body>
		<?php
	//inserisco le variabili che utilizzo per la connessione e le query
			session_start();
			include 'Connection.php';
			$tabella = $_POST["aggiornaTabella"];
			
			$info = array_slice($_POST, 1);
			$colonne = "(";
			$valori = "(";
			$isFirst = true;
			foreach (array_keys($info) as $key => $campo) {
				if($isFirst){
					$colonne .= $campo;
					if(is_numeric($info[$campo])){
						$valori .= $info[$campo];
					}
					else{
						$valori .= "'".$info[$campo]."'";
					}
					$isFirst = false;
				}
				else{
					$colonne .= ",".$campo;
					if(is_numeric($info[$campo])){
						$valori .= ",".$info[$campo];
					}
					else{
						$valori .= ",'".$info[$campo]."'";

					}
				}
				echo $campo."-".$info[$campo]."<br/>";

			}
			$colonne .= ")";
			$valori .= ")";
			$connessione = connectDB();
			//echo 'Connected successfully'.'<br/>';
			
			$query = "insert into ".$tabella." ".$colonne." values".$valori;
			//echo $query.'<br/>';
			$result = mysqli_query($connessione,$query) or die("Query failed : " . mysqli_error($connessione)); 
			mysqli_close($connessione);
			if($_SESSION['tipo']==A){
				header("Location: Aggiungi.html");
				exit;	
			}
			else{
				header("Location: AggiungiSviluppatore.html");
				exit;
			}	
	?>
	</body>
</html>