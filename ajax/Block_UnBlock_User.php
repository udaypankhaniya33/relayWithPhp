<?php include "../include/dbconnection.php";
$userId =isset($_POST["CustomerId"])?base64_decode( $_POST["CustomerId"]):"";


$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt_array($curl, array(
        CURLOPT_URL => base."blockUnBlock",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS =>"{
            \"userId\": \"$userId\"\r\n
    
        }",
        CURLOPT_HTTPHEADER => array(

            "Content-Type: application/json"
        ),
    ));


    // echo base."login";exit;

$response = (curl_exec($curl));




if (curl_errno($curl)) {
    $error_msg = curl_error($curl);
}

if (isset($error_msg)) {
    echo $error_msg;
} else {
    echo $response;
}

curl_close($curl);



// $user = mysqli_query($connection, "SELECT * FROM  `user` WHERE `userId`='" . base64_decode($_POST["CustomerId"]) . "' ");
// if (mysqli_num_rows($user) > 0) {
//     $row = mysqli_fetch_array($user);


//     if ($row["status"] == 1) {
//         $update = mysqli_query($connection, "UPDATE  `user` SET `status`='0' WHERE `userId`='" .base64_decode($_POST["CustomerId"]) . "' AND `delete`='0'");
//         if ($update) {
//             echo "1";
//         }
//     } else {
//         $update = mysqli_query($connection, "UPDATE  `user` SET `status`='1' WHERE `userId`='" . base64_decode($_POST["CustomerId"] ). "' AND `delete`='0'");
//         if ($update) {
//             echo "2";
//         }
//     }
// }
