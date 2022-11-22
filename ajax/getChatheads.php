<?php
include "../include/dbconnection.php";

$orderId=isset($_REQUEST["orderId"])? base64_decode($_REQUEST["orderId"]):"";
$text=isset($_REQUEST["text"])?$_REQUEST["text"]:"";




$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt_array($curl, array(
    CURLOPT_URL => base . "getChatHeads",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{
			\"orderId\": \"$orderId\"\r\n,
			\"text\": \"$text\"\r\n
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
    exit;
} else {
    // echo $response;

    $resData= json_decode($response,true);
    $getOrderDetails =$resData["data"];


}

if (count($getOrderDetails) != 0) {




    foreach ($getOrderDetails as $key => $row) {
        # code...
    
?>

        <!--begin:User-->
        <div class="d-flex align-items-center justify-content-between mb-5 objects" >
            <div class="d-flex align-items-center" onclick="chats( '<?php echo $row['chatId'] ?>' )">
                <div class="symbol symbol-circle symbol-50 mr-3">
                    <img alt="Pic" src="<?php
                                        if ($row["profile"] == "") {
                                            echo "../static/images/favicon.ico";
                                        } else {
                                            echo $row["profile"];
                                        } ?>" />
                </div>
                <div class="d-flex flex-column ">
                    <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg"><?php echo $row['fullName'] ?></a>
                    <!-- <span class="text-muted font-weight-bold font-size-sm"></span> -->
                </div>
            </div>
        </div>
        <!--end:User-->


    <?php 
    }
} else {
    ?>
    <div class="name">Messages Not Avaliable At Moment</div>
<?php 

}
 ?>

