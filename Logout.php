<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
    session_start();
    
    $_SESSION["user"]="";
    header("Location: index.html");
    exit;

?>
</body>
</html>