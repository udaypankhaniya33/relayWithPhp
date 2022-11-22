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




$response = json_decode(curl_exec($curl), true);


curl_close($curl);


$data = $response["data"];

if ($data != null) {

if (count($data) != 0) {


    ?>
    
    <input type="hidden" id="chatLength" value="<?php echo count($data)?>">
 



    <?php 
    foreach ($data as $key => $value) {


        // print_r($value);
        if ($value["receiverType"] == "admin") {

            $userData = mysqli_fetch_array(mysqli_query($connection, "SELECT * FROM `user` WHERE `userId`='" . $value["senderId"] . "'"))
                            ?>

            <div class="d-flex flex-column mb-5 align-items-start">
                <div class="d-flex align-items-center">

                    <div>
                        <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6"><?php echo $userData["fullName"] ?></a>
                        <span class="text-muted font-size-sm"><?php echo $value["time"] ?></span>
                    </div>
                </div>
                <div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px"><?php echo $value["message"] ?></div>
            </div>

        <?php } else { ?>
            <div class="d-flex flex-column mb-5 align-items-end">
                <div class="d-flex align-items-center">
                    <div>
                        <span class="text-muted font-size-sm"><?php echo $value["time"] ?></span>
                        <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">You</a>
                    </div>

                </div>
                <div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
                    <?php echo $value["message"] ?>
                </div>
            </div>
<?php }
    }



    
}else{?><input type="hidden" id="chatLength" value="0"><?php }
}else{?><input type="hidden" id="chatLength" value="0"><?php }
?>