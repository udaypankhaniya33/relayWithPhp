<?php
include("../include/dbconnection.php");
$type=isset($_REQUEST["type"])?$_REQUEST["type"]:"";




$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt_array($curl, array(
        CURLOPT_URL => base."allUsers",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS =>"{
			\"status\": \"".($type)."\"\r\n
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


