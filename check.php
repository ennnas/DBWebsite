<?php
  session_start();
  if (isset($_SESSION['user'])){
  	if($_SESSION['user']==""){
  		echo 0;
  	}
  	else{
    	echo $_SESSION['tipo'];
    }
  }
  else{
  	echo 0;
  }
?>