<?php include "../include/dbconnection.php";

$_POST["cityName"];


$check = mysqli_query($connection, "SELECT * FROM `city` WHERE `cityName`='" . trim($_POST["cityName"]) . "' AND `delete`='0'");


if (mysqli_num_rows($check) == 0) {


    $check = mysqli_query($connection, "INSERT INTO  `city`SET `cityName`='" . trim($_POST["cityName"]) . "'");
    if ($check) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "exist";
}
