<?php include "../include/dbconnection.php";

$ticketId = isset($_POST["ticketId"]) ? $_POST["ticketId"] : 0;
$offset= isset($_POST["offset"]) ? $_POST["offset"] : '';





$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL =>base. 'get_chat_in_firebase',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{
         \"ticketId\": $ticketId \r\n,
         \"offset\":\" $offset \"\r\n
        }",
    CURLOPT_HTTPHEADER => array(
        "apitoken: " . $token,
        "Content-Type: application/json"
    ),
));



// echobase. 'get_chat_in_firebase';exit;
$response = (curl_exec($curl));


curl_close($curl);


echo $response;exit;