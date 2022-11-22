<?php
include "../include/dbconnection.php";

$email = $_POST['email'];
$flag = 1;
$otp = $_POST['OTP'];
$password = $_POST['password'];



if ($flag == 1) {
    $user = mysqli_query($connection, "select * from `admins_admin` where `email`='$email'  AND `otp`='$otp'   ");

    $count = mysqli_num_rows($user);
    // $row = mysqli_fetch_array($user);

    if ($count > 0) {
        $user = mysqli_query($connection, "UPDATE `admins_admin` SET `password`='" .md5( $password ). "' where `email`='$email' AND `otp`='$otp' ");

	
        echo "1";


		unset($_SESSION["forgetEmail"]);
    } else {
        echo "2";
    }
}


