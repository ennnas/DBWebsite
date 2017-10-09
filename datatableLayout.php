<?php

// Avvia la sessione


// Controlla ruolo


// Include dati DB
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_database = "sito_web"; //Il nome del DB coincide con lo username

// Crea connessione al DB
$conn = mysqli_connect($db_host, $db_user, $db_password);
mysqli_select_db($conn, $db_database);

 
$result = mysqli_query($conn, "SELECT * FROM layout");
 
$num_rows = mysqli_num_rows($result);
  
$res = array();

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
   $res[] = array(
	  'ID'=> $row['ID'],
      'Sviluppatore' => $row['SVILUPPATORE'],
	  'Costo'=>$row['COSTO_TOTALE'],	  
	  'button'=>''
   );
}

$json_data = array(
                "draw"            => 1,
                "recordsTotal"    => $num_rows,
                "recordsFiltered" => $num_rows,
                "data"            => $res
            );
$json = json_encode($json_data);
echo $json;
?>