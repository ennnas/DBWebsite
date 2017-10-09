<?php
$conn=mysqli_connect('localhost','root','','sito_web') or die("Could not connect : " . mysqli_error($connessione)); 
$query = "select PIVA,Nome,Cognome from sviluppatore";
$result = mysqli_query($conn, $query);
$res = array();
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
   $res[] = array(
	  'Piva'=> $row['PIVA'],
      'Nome' => $row['Nome'],
      'Cognome' => $row['Cognome'],
   );
}
$json = json_encode($res);
echo $json;
?>