<?php include '../include/header1.php';

// // echo $_GET["id"];exit;

// $getOrderDetails = mysqli_query($connection, "SELECT * FROM `orderdetail` WHERE `orderId`='" .  $_GET["id"] . "'");
$id = isset($_REQUEST["id"]) ? base64_decode($_REQUEST["id"]) : "";




$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt_array($curl, array(
    CURLOPT_URL => base . "getOrderDetails",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{
			\"orderId\": \"$id\"\r\n
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

curl_close($curl);







?>





<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
        <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">

                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                    Orders</h5>
                <!--end::Page Title-->

                <!--begin::Actions-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200">

                </div>
                <span class="text-muted font-weight-bold mr-4"> Orders Chats</span>
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container ">

            <div class="card card-custom gutter-b">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">
                            Chats
                        </h3>
                    </div>

                </div>

                <div class="card-body">







                    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />




                </div>
            </div>
        </div>
    </div>


    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">

        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container ">
                <!--begin::Chat-->
                <div class="d-flex flex-row">
                    <!--begin::Aside-->
                    <div class="flex-row-auto offcanvas-mobile w-350px w-xl-400px" id="kt_chat_aside">
                        <!--begin::Card-->
                        <div class="card card-custom">
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin:Search-->
                                <div class="input-group input-group-solid">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <span class="svg-icon svg-icon-lg">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                        <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span> </span>
                                    </div>
                                    <input type="text" class="form-control py-4 h-auto" id="mySearch" placeholder="" />
                                </div>
                                <!--end:Search-->

                                <!--begin:Users-->
                                <div class="mt-7 scroll scroll-pull" id="Users">

                                </div>
                                <!--end:Users-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Aside-->

                    <!--begin::Content-->
                    <div class="flex-row-fluid ml-lg-8" id="kt_chat_content">
                        <div class="card card-custom">
                            <!--begin::Header-->
                            <div class="card-header align-items-center px-4 py-3">
                                <div class="text-left flex-grow-1">
                                    <!--begin::Aside Mobile Toggle-->

                                    <div class="text-left flex-grow-1">
                                        <!--begin::Aside Mobile Toggle-->
                                        <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md d-lg-none" id="kt_app_chat_toggle">
                                            <span class="svg-icon svg-icon-lg">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Adress-book2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path d="M18,2 L20,2 C21.6568542,2 23,3.34314575 23,5 L23,19 C23,20.6568542 21.6568542,22 20,22 L18,22 L18,2 Z" fill="#000000" opacity="0.3" />
                                                        <path d="M5,2 L17,2 C18.6568542,2 20,3.34314575 20,5 L20,19 C20,20.6568542 18.6568542,22 17,22 L5,22 C4.44771525,22 4,21.5522847 4,21 L4,3 C4,2.44771525 4.44771525,2 5,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z" fill="#000000" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span> </button>
                                        <!--end::Aside Mobile Toggle-->



                                    </div>

                                </div>
                                <div class="text-center flex-grow-1">
                                    <div class="text-dark-75 font-weight-bold font-size-h5">
                                        Click On Image To See The Chats
                                    </div>
                                    <div>

                                    </div>
                                </div>

                            </div>
                            <!--end::Header-->

                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Scroll-->
                                <div class="scroll scroll-pull" data-mobile-height="350">
                                    <!--begin::Messages-->
                                    <div class="messages">

                                        <?php if (count($getOrderDetails) != 0) {


                                            foreach ($getOrderDetails as $result) {
                                                if ($result["messageType"] == "text") {
                                        ?>



                                                    <!--begin::Message Out-->
                                                    <div class="d-flex flex-column mb-5 align-items-end">
                                                        <div class="d-flex align-items-center">
                                                            <div>
                                                                <span class="text-muted font-size-sm"><?php $date = date_create($result["messageTime"]);
                                                                                                        echo date_format($date, "d/m/Y H:i A"); ?> </span>
                                                                <!-- <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">You</a> -->
                                                            </div>

                                                        </div>
                                                        <div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
                                                            <p><?php echo $result["message"] ?></p>

                                                        </div>
                                                    </div>
                                                    <!--end::Message Out-->
                                                <?php }
                                                if ($result["messageType"] == "image") { ?>
                                                    <div class="d-flex flex-column mb-5 align-items-end">
                                                        <div class="d-flex align-items-center">


                                                        </div>
                                                        <div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
                                                            <div class="symbol symbol-100 mr-5 ">
                                                                <div class="symbol-label" style="background-image:url('<?php echo $result["message"] ?>')"></div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                <?php }
                                                if ($result["messageType"] == "audio") { ?>
                                                    <div class="d-flex flex-column mb-5 align-items-end">
                                                        <div class="d-flex align-items-center">


                                                        </div>
                                                        <div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
                                                            <audio controls class="text-right">
                                                                <source src="<?php echo $result["message"] ?>" type="audio/ogg">


                                                            </audio>
                                                        </div>

                                                    </div>
                                                <?php }

                                                if ($result["messageType"] == "doc") { ?>
                                                    <div class="d-flex flex-column mb-5 align-items-end">
                                                        <div class="d-flex align-items-center">


                                                        </div>
                                                        <div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
                                                            <a href="<?php echo $result["message"] ?>" target="_blank">Document</a>
                                                        </div>

                                                    </div>
                                        <?php }
                                            }
                                        } ?>


                                    </div>
                                    <!--end::Messages-->
                                </div>
                                <!--end::Scroll-->
                            </div>
                            <!--end::Body-->

                        </div>
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Chat-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>



</div>


<?php include "../include/footer1.php" ?>

<script src="../static/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script src="../static/assets/js/pages/crud/datatables/basic/scrollable.js"></script>

<script src="../static/assets/js/pages/custom/chat/chat.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css" integrity="sha512-cyIcYOviYhF0bHIhzXWJQ/7xnaBuIIOecYoPZBgJHQKFPo+TOBA+BY1EnTpmM8yKDU4ZdI3UGccNGCEUdfbBqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js" integrity="sha512-IZ95TbsPTDl3eT5GwqTJH/14xZ2feLEGJRbII6bRKtE/HC6x3N4cHye7yyikadgAsuiddCY2+6gMntpVHL1gHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<!-- filter result from page  -->
<script>
    $("#mySearch").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        // $(" #Users div").filter(function() {
        // 	$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        // 	if($(".objects:visible").length <= 0)
        // 	{
        // 		$(".objects").show();
        // 	}
        // });



        getChatHeads(value)
    });


    getChatHeads()

    function getChatHeads(text) {


        $.ajax({
            url: '../ajax/getChatheads.php',
            method: "POST",
            data: {
                'orderId': '<?php echo ($_GET["id"]) ?>',
                text: text
            },
            success: function(result) {

                $("#Users").html(result);


            },
            error: function(er) {
                toastr.error("failed");
            }
        });
    }
</script>
<script type="text/javascript">
    function WatchDocument(Name) {
        Swal.fire({
            imageUrl: 'media/' + Name,
            imageHeight: 400,
            imageAlt: 'A tall image'
        })
    }

    $(document).ready(function() {
        $('#metarial').dataTable({});
    });
    var avatar1 = new KTImageInput('kt_image_1');

    function chats(chatId) {

        $.ajax({
            url: '../ajax/ajaxChat.php ',
            method: "POST",
            data: {
                'chatId': chatId
            },
            success: function(result) {

                $("#kt_chat_content").html(result);




                $(document).scrollTop($(document).height());

                // $(document).scrollTop($("#kt_chat_content").height())
            },
            error: function(er) {
                toastr.error("failed");
            }
        });

    }
</script>