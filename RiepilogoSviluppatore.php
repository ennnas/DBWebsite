<?php

$conn=mysqli_connect('localhost','root','','sito_web') or die("Could not connect : " . mysqli_error($connessione)); 
$result = mysqli_query($conn, "SELECT ID,COSTO_TOTALE FROM layout where SVILUPPATORE='".$_GET['ID']."'");
$num_rows = mysqli_num_rows($result);
  
$res = array();

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
   $valore=[];
   foreach ($row as $key => $value) {
     $valore[$key]=$value;
   }
   $res[]=$valore;
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