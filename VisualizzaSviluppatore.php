<?php
session_start();
$conn=mysqli_connect('localhost','root','','sito_web') or die("Could not connect : " . mysqli_error($connessione)); 
$query = "select * from sito_web where layout in (select id from layout where sviluppatore='".$_SESSION["id"]."')";
$result = mysqli_query($conn, $query);
 
$num_rows = mysqli_num_rows($result);
  
$res = array();

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
   $res[] = array(
	  'CODICE'=> $row['CODICE'],
    'URL' => $row['URL'],
	  'DATA_PUBBLICAZIONE'=>$row['DATA_PUBBLICAZIONE'],
    'CLIENTE' =>$row['CLIENTE'],
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