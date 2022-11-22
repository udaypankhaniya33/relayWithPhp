<?php include "../include/dbconnection.php";


$remarks = $_REQUEST["remarks"] ;

$userId = $_REQUEST["userId"];
$WidthdrawRequestId =$_REQUEST["WidthdrawRequestId"];


$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt_array($curl, array(
        CURLOPT_URL => base."rejectWithdrawRequest",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS =>"{
            \"userId\": \"".($_POST["userId"])."\"\r\n,
            \"WidthdrawRequestId\":\"$WidthdrawRequestId\",
            \"rejectionReason\":\"$remarks\"
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

     $data=json_decode($response,true);


     if($data["status"]==200){
        echo "1";
     }else{
        echo "3";
     }

}

curl_close($curl);



