<?php
$conn=mysqli_connect('localhost','root','','sito_web') or die("Could not connect : " . mysqli_error($connessione)); 
$query = "select codice,username from utenti join cliente on codice=id"; 
$result = mysqli_query($conn, $query);
$res = array();
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
   $res[] = array(
	  'Codice'=> $row['codice'],
      'Username' => $row['username'],
   );
}
$json = json_encode($res);
echo $json;
?>