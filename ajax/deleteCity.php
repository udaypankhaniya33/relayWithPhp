<?php include "../include/dbconnection.php";
$userId = $_POST["cityId"] || "";

$user = mysqli_query($connection, "SELECT * FROM  `city` WHERE `cityId`='" . $_POST["cityId"] . "' ");
if (mysqli_num_rows($user) != 0) {
    $update = mysqli_query($connection, "UPDATE  `city` SET `delete`='1' WHERE `cityId`='" . $_POST["cityId"] . "' ");
    if ($update) {
        echo "1";
    }
} else {
    echo "2";
}
