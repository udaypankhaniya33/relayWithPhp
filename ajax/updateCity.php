<?php include "../include/dbconnection.php";
$_POST["cityName"];
$_POST["cityId"];


$check = mysqli_query($connection, "SELECT * FROM `city` WHERE `cityName`='" . trim($_POST["cityName"]) . "' AND `delete`='0'");


if (mysqli_num_rows($check) == 0) {


    $check = mysqli_query($connection, "UPDATE `city` SET `cityName`='" . trim($_POST["cityName"]) . "' WHERE `cityId`='".$_POST["cityId"]."' AND `delete`=''");
    if ($check) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "exist";
}
