<?php include "../include/dbconnection.php";

$userId = $_REQUEST["userId"] ;
$WidthdrawRequestId =$_REQUEST["WidthdrawRequestId"];


// $users = mysqli_query($connection, "SELECT *  FROM  `user` WHERE `userId`='" .$userId . "' ");
// if (mysqli_num_rows($users) > 0) {
//     $update = mysqli_query($connection, "UPDATE  `user` SET `withdrawAmount`='0' WHERE `userId`='" .$userId . "' ");
//     if ($update) {

//         $update = mysqli_query($connection, "UPDATE  `widthdrawrequest` SET `isRequestd`='1' WHERE `WidthdrawRequestId`='" .$WidthdrawRequestId . "' ");

//         $requestData = mysqli_fetch_array(mysqli_query($connection, "SELECT * FROM  `widthdrawrequest` WHERE `WidthdrawRequestId`='" .$WidthdrawRequestId . "' "));




//         $user = mysqli_fetch_array($users);
//         $message = "Hi " . $user["fullName"] . " , Your Payment WithDraw Request  ".$requestData["requestId"]." Has  been Approved, Best Wishes From Team Relay. ";
//         $title = "Driver Request Accept";
 
//         echo "1";
//     }else{
//         echo "3";
//     }
// } else {
//     echo "2";
// }



$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt_array($curl, array(
        CURLOPT_URL => base."approveWithdrawRequest",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS =>"{
            \"userId\": \"".($_POST["userId"])."\"\r\n,
            \"WidthdrawRequestId\":\"$WidthdrawRequestId\"
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



