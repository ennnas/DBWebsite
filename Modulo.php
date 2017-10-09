<?php
$conn=mysqli_connect('localhost','root','','sito_web') or die("Could not connect : " . mysqli_error($connessione)); 
$query = "select ID,Nome from modulo";
$result = mysqli_query($conn, $query);
$res = array();
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
   $res[] = array(
	  'ID'=> $row['ID'],
	  'Nome' => $row['Nome'],
   );
}
$json = json_encode($res);
echo $json;
?>