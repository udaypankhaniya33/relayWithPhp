<?php include "../include/dbconnection.php";
$userId=$_POST["CustomerId"]||"";
$text=$_POST["value"]||"";

$user = mysqli_query($connection,"SELECT * FROM  `user` WHERE `userId`='".base64_decode($_POST["CustomerId"])."' ");
if(mysqli_num_rows($user)>0){
$update=mysqli_query($connection,"UPDATE  `user` SET `is_driver`='0',`is_requested`='3',`rejectionReason`='".$_POST["value"]."' WHERE `userId`='".base64_decode($_POST["CustomerId"])."' ");
    if($update){
    echo "1";
    }
}else{
    echo "2";
}
