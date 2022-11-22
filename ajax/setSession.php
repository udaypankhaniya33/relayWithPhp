<?php include "../include/dbconnection.php" 
;


$userId=$_REQUEST["userId"];

$_SESSION["id"]=$userId;

if(isset($_SESSION["id"])){
    echo "1";
}



?>