<?php include "../include/dbconnection.php";

$ticketId = isset($_POST["ticketId"]) ? $_POST["ticketId"] : 0;
$chatlength= isset($_POST["chatlength"]) ? $_POST["chatlength"] : 0;
$id=$chatlength + 1;
$time=date("m/d/Y|H:i");
$message=isset($_POST["message"]) ? $_POST["message"] :"";



// echo  "{
//     \"id\": $id\r\n ,
//      \"ticketId\": $ticketId \r\n,
//      \"message\":\"$message\"\r\n,
//      \"time\":\"$time\"\r\n
//     }";exit;
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL =>base. 'add_chat_in_firebase',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{
        \"id\": $id\r\n ,
         \"ticketId\": $ticketId \r\n,
         \"message\":\"$message\"\r\n,
         \"time\":\"$time\"\r\n
        }",
    CURLOPT_HTTPHEADER => array(
        "apitoken: " . $token,
        "Content-Type: application/json"
    ),
));







$response =( curl_exec($curl));


curl_close($curl);



echo ($response);
?>


