<?php include "../include/dbconnection.php";

$userId = base64_decode($_POST["CustomerId"]);

$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt_array($curl, array(
        CURLOPT_URL => base."approveDriver",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS =>"{
            \"userId\": \"".base64_decode($_POST["CustomerId"])."\"\r\n
        }",
        CURLOPT_HTTPHEADER => array(

            "Content-Type: application/json"
        ),
    ));


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