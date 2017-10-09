<?php
session_start();
$conn=mysqli_connect('localhost','root','','sito_web') or die("Could not connect : " . mysqli_error($connessione)); 
 
$result = mysqli_query($conn, "SELECT * FROM sito_web where cliente=".$_SESSION['id']);
 
$num_rows = mysqli_num_rows($result);
  
$res = array();

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
   $res[] = array(
	  'CODICE'=> $row['CODICE'],
    'URL' => $row['URL'],
	  'DATA_PUBBLICAZIONE'=>$row['DATA_PUBBLICAZIONE'],
	  'LAYOUT'=> $row['LAYOUT'],
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