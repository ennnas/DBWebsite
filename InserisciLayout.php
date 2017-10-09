<html>
	<head>
	</head>
	<body>
		<?php
	//inserisco le variabili che utilizzo per la connessione e le query
			include 'Connection.php';
			session_start();
			$connessione = connectDB();
			$tabella = $_POST["aggiornaTabella"];
			
			$layout = array_slice($_POST, 1,2);
			$composizione = array_slice($_POST,3);
			$colonne_layout = "(";
			$valori_layout = "(";
			$isFirst = true;
			foreach (array_keys($layout) as $key => $campo) {
				if($isFirst){
					$colonne_layout .= $campo;
					if(is_numeric($layout[$campo])){
						$valori_layout .= $layout[$campo];
					}
					else{
						$valori_layout .= "'".$layout[$campo]."'";
					}
					$isFirst = false;
				}
				else{
					$colonne_layout .= ",".$campo;
					if(is_numeric($layout[$campo])){
						$valori_layout .= ",".$layout[$campo];
					}
					else{
						$valori_layout .= ",'".$layout[$campo]."'";

					}
				}
				echo $campo."-".$layout[$campo]."<br/>";

			}
			$colonne_layout .= ")";
			$valori_layout .= ")";
			//echo $colonne_layout."<br/>";
			//echo $valori_layout."<br/>";
			// crea il nuovo layout
			$query = "insert into ".$tabella." ".$colonne_layout." values".$valori_layout;
			$result = mysqli_query($connessione,$query) or die("Query failed : " . mysqli_error($connessione)); 
			
			// prendo l'id del layout appena creato, poiche si autoincrementa sarà il massimo
			$query = "select max(id) as ID from ".$tabella;
			$result = mysqli_query($connessione,$query) or die("Query failed : " . mysqli_error($connessione));
			$row = mysqli_fetch_array($result, MYSQL_ASSOC);
			$id = $row["ID"];
			//echo $id."<br/>";
			
			foreach (array_keys($composizione) as $key => $value) {
				$query = "insert into componente (id_layout,id_modulo) values(".$id.",".$composizione[$value].")";
				$result = mysqli_query($connessione,$query) or die("Query failed : ". mysqli_error($connessione));
				//echo $query."<br/>";
			}
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