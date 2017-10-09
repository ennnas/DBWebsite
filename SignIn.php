<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
    include 'Connection.php';
    session_start();

    $user = $_POST["Username"];
    $pwd = md5($_POST["Password"]);
    $connessione = connectDB();

    $query = "select Tipo,Id from utenti where username='".$user."' and password='".$pwd."'";
    $result = mysqli_query($connessione,$query) or die("Query failed : " . mysqli_error($connessione)); 
    if($row=mysqli_fetch_array($result,MYSQL_ASSOC)){
                echo "Login effettuato";
                $_SESSION["user"]=$user;
                $_SESSION["tipo"]=$row["Tipo"];
                $_SESSION["id"]=$row['Id'];
                if($row["Tipo"]=='A'){
                    header("Location: Home.html");
                    exit;
                }
                else if($row["Tipo"]=='S'){
                    header("Location: HomeSviluppatore.html");
                    exit;
                }
                else{
                    header("Location: HomeCliente.html");
                    exit;
                }
    }
    else{
        $_SESSION["error"]="<strong>Nome utente non valido riprova<storng/>";
	    $_SESSION["login"]=0;
    	header("Location: index.html");
	    exit;
    }
?>
</body>
</html>