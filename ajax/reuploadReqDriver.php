<?php include "../include/dbconnection.php";
$userId=base64_decode($_POST["CustomerId"])||"";


function user_notification($connection, $message, $userId, $title)
{
    $customer = mysqli_query($connection, "SELECT * FROM `fcmtoken` where `recordType` = 'user' AND `recordId` = '" . $userId . "' AND `delete` = '0'");


    // echo "SELECT * FROM `fcmtoken` where `recordType` = 'user' AND `recordId` = '" . $userId . "' AND `delete` = '0'";exit;
    $token = array();

    while ($row = mysqli_fetch_array($customer)) {
        $token[] = $row['token'];
    }

    $url = 'https://fcm.googleapis.com/fcm/send';
    $fields['notification']['title'] = $title;
    $fields['notification']['body'] = ucwords($message);

    //$fields['notification']['click_action']="com.xpertlab.vamjaeducation.Vamja Education_TARGET_NOTIFICATION";
    $fields['notification']['sound'] = "default";
    $fields['notification']['icon'] = "fcm_push_icon";
    $fields['registration_ids'] = $token; // ARRAY FORMATE
    $fields['priority'] = "high";
    $fields['restricted_package_name'] = "";
    $json = json_encode($fields);


    $serverKey = "AAAAMMChQco:APA91bFi2bkgGuja1wGmY4XCpnT3HSkQ9_1Du8-F6sfuupVm5cniyQFmeN834KKSmhLErX2sTKXBaoETVYFva1IsWCnHNgnK9ybCxHSx5q5DKtO8WMmEVja-phtcHJJZNs6HfS6l-sMI"; // YOUR SERVER KEY

    $headers = array();
    $headers[] = 'Content-Type: application/json';
    $headers[] = 'Authorization: key=' . $serverKey;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($ch);

// echo $response;

        // die('FCM Send Error: ' . curl_error($ch));
    // }

    curl_close($ch);
}

// print_r($_POST);exit;

$user = mysqli_query($connection,"SELECT * FROM  `user` WHERE `userId`='".base64_decode( $_POST["CustomerId"]) ."' ");
if(mysqli_num_rows($user)>0){



$update=mysqli_query($connection,"UPDATE  `user` SET `is_driver`='0',`is_requested`='0',`rejectionReason`='".$_POST["value"]."' WHERE `userId`='".base64_decode( $_POST["CustomerId"]) ."' ");
    if($update){

        $user = mysqli_fetch_array(mysqli_query($connection, "SELECT * FROM    `user`  WHERE `userId`='" . base64_decode( $_POST["CustomerId"]) . "' "));
        $message = "Hi " . $user["fullName"] . " ,  Your Request of Become A Driver has been Decline by Admin But Dont Worry Reuploade Your Documents According To Admin Remarks , Best Wishes From Team Relay ";
        $title = "Driver Request Accept";
        echo user_notification($connection, $message, base64_decode( $_POST["CustomerId"]), $title);
    echo "1";
    }
}else{
    echo "2";
}
