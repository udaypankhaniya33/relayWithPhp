<?php include "../include/dbconnection.php";
$termsandconditionId=$_POST["CustomerId"]||"";

$user = mysqli_query($connection,"SELECT * FROM  `termsandcondition` WHERE `termsandconditionId`='".$_POST["CustomerId"]."' ");
if(mysqli_num_rows($user)>0){
$update=mysqli_query($connection,"UPDATE  `termsandcondition` SET `delete`='1' WHERE `termsandconditionId`='".$_POST["CustomerId"]."' ");
    if($update){
    echo "1";
    }
}else{
    echo "2";
}
