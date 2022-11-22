<?php
include "../include/dbconnection.php";
$chatId = $_POST["chatId"] || "";

$getChats = mysqli_fetch_array(mysqli_query($connection, "SELECT * FROM `chat` LEFT JOIN `user`ON `user`.`userId`=`chat`.`driverId` WHERE `chatId`='" . $_POST["chatId"] . "' AND `chat`.`delete`='0'"));

$getOrderDetails = mysqli_query($connection, "SELECT * FROM `orderdetail` WHERE `orderId`='" . $getChats["orderId"] . "'");


$query = mysqli_query($connection, "SELECT * FROM `chatdetail` WHERE `chatId`='" . $_POST["chatId"] . "' AND `delete`='0'");



?>





<style>
  .bg-light-success {

    background-color: #f2f2f2 !important;
  }

  .bg-light-primary {
    background-color: #ccc !important;
    color: #000 !important;
  }
</style>
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
        <div class="text-dark-75 font-weight-bold font-size-h5">

          <h2>
            <?php echo $getChats["fullName"] ?>
          </h2>
        </div>


      </div>

    </div>
    <div class="text-center flex-grow-1">


    </div>

  </div>
  <!--end::Header-->

  <!--begin::Body-->
  <div class="card-body">
    <!--begin::Scroll-->
    <div class="scroll scroll-pull" data-mobile-height="350">
      <!--begin::Messages-->
      <div class="messages">


        <!-- orderDetails -->

        <?php if (mysqli_num_rows($getOrderDetails)) {
          while ($result = mysqli_fetch_array($getOrderDetails)) {

            if ($result["messageType"] == "text") {
        ?>



              <!--begin::Message Out-->
              <div class="d-flex flex-column mb-5 align-items-end">
                <div class="d-flex align-items-center">
                  <div>
                    <span class="text-muted font-size-sm"><?php $date = date_create($result["created"]);
                                                          echo date_format($date, "d/m/Y H:i A"); ?> </span>
                    <!-- <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">You</a> -->
                  </div>
                  <!-- <div class="symbol symbol-circle symbol-40 ml-3">
                <img alt="Pic" src="assets/media/users/300_21.jpg" />
              </div> -->
                </div>
                <div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
                  <p><?php echo $result["message"] ?></p>
                  <h6 class="text-muted font-size-sm" style="margin-block-end: -12px;">Name Test</h6>
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



        <!-- chats -->
        <?php if (mysqli_num_rows($query) != 0) {
          while ($row = mysqli_fetch_array($query)) {

            if ($row["senderType"] == "user") {
              if ($row["messageType"] == "text") { ?>

                <!--begin::Message Out-->
                <div class="d-flex flex-column mb-5 align-items-end">
                  <div class="d-flex align-items-center">
                    <div>
                      <span class="text-muted font-size-sm"><?php $date = date_create($row["created"]);
                                                            echo date_format($date, "d/m/Y H:i A"); ?> </span>
                      <!-- <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">You</a> -->
                    </div>
                    <!-- <div class="symbol symbol-circle symbol-40 ml-3">
                      <img alt="Pic" src="assets/media/users/300_21.jpg" />
                    </div> -->
                  </div>
                  <div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
                    <?php echo $row["message"] ?>
                  </div>
                </div>
                <!--end::Message Out-->
              <?php }
              if ($row["messageType"] == "image") { ?>
                <div class="d-flex flex-column mb-5 align-items-end">
                  <div class="d-flex align-items-center">


                  </div>
                  <div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
                    <div class="symbol symbol-100 mr-5 ">
                      <div class="symbol-label" style="background-image:url('<?php echo $row["message"] ?>')"></div>
                    </div>
                  </div>

                </div>
              <?php }
              if ($row["messageType"] == "audio") { ?>

                <div class="d-flex flex-column mb-5 align-items-end">
                  <div class="d-flex align-items-center">


                  </div>
                  <div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
                    <audio controls class="text-right">
                      <source src="<?php echo $row["message"] ?>" type="audio/ogg">


                    </audio>
                  </div>

                </div>


              <?php }

              if ($row["messageType"] == "doc") { ?>

                <div class="d-flex flex-column mb-5 align-items-end">
                  <div class="d-flex align-items-center">


                  </div>
                  <div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
                    <a href="<?php echo $row["message"] ?>" target="_blank">Document</a>
                  </div>

                </div>


            <?php }
            } ?>
            <?php if ($row["senderType"] == "driver") {


              if ($row["messageType"] == "text") { ?>
                <!--begin::Message In-->
                <div class="d-flex flex-column mb-5 ">
                  <div class="d-flex align-items-center">

                    <div>
                      <span class="text-muted font-size-sm"><?php $date = date_create($row["created"]);
                                                            echo date_format($date, "d/m/Y H:i A"); ?></span>
                    </div>
                  </div>
                  <div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">
                    <?php echo $row["message"] ?>
                  </div>
                </div>
                <!--end::Message In-->


              <?php }

              if ($row["messageType"] == "image") { ?>

                <div class="d-flex flex-column mb-5 ">
                  <div class="d-flex align-items-center">

                    <div>
                      <span class="text-muted font-size-sm"><?php
                                                            $date = date_create($row["created"]);
                                                            echo date_format($date, "d/m/Y H:i A");

                                                            ?></span>
                    </div>
                  </div>
                  <div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">

                    <div class="symbol symbol-100 mr-5 ">


                      <div class="symbol-label" style="background-image:url('<?php echo $row["message"] ?>')">
                      </div>
                    </div>
                  </div>
                </div>

              <?php }

              if ($row["messageType"] == "audio") { ?>
                <div class="d-flex flex-column mb-5 ">
                  <div class="d-flex align-items-center">

                    <div>
                      <span class="text-muted font-size-sm"><?php $date = date_create($row["created"]);
                                                            echo date_format($date, "d/m/Y H:i A"); ?></span>
                    </div>
                  </div>
                  <div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">

                    <audio controls>
                      <source src="<?php echo $row["message"] ?>" type="audio/ogg">

                      Your browser does not support the audio element.
                    </audio>
                  </div>
                </div>

              <?php }


              if ($row["messageType"] == "doc") { ?>
                <div class="d-flex flex-column mb-5 ">
                  <div class="d-flex align-items-center">

                    <div>
                      <span class="text-muted font-size-sm"><?php $date = date_create($row["created"]);
                                                            echo date_format($date, "d/m/Y H:i A"); ?></span>
                    </div>
                  </div>
                  <div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">

                    <a href="<?php echo $row["message"] ?>" target="_blank">Document</a>
                  </div>
                </div>

              <?php }
              if ($row["messageType"] == "price") { ?>

                <div class="d-flex flex-column mb-5 ">
                  <div class="d-flex align-items-center">

                    <div>
                      <span class="text-muted font-size-sm"><?php $date = date_create($row["created"]);
                                                            echo date_format($date, "d/m/Y H:i A"); ?></span>
                    </div>
                  </div>
                  <div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">
                    <div class="symbol symbol-100 mr-5  ">

                      <div class="card card-1" style="min-height: 200px;">
                        <h3 class="card-header" style="text-align: center;">Order Request Sent to Customer </h3>
                        <div class="card-body">
                          <h2>Price ILS: <?php echo $row["message"] ?></h2>
                          <!-- 0 pending , 1 withdraw , 2 accepted ,4 decline -->
                          <?php if ($row["chatOrderStatus"] == 0) { ?>
                            <h3>Waiting For Response</h3>
                          <?php } else if ($row["chatOrderStatus"] == 1) { ?>
                            <h3>withdraw By Driver</h3>

                          <?php } else if ($row["chatOrderStatus"] == 2) { ?>
                            <h3>Accepted By Customer</h3>


                          <?php } else if ($row["chatOrderStatus"] == 4) { ?>
                            <h3>Decline By Customer</h3>
                          <?php } ?>
                        </div>

                      </div>
                    </div>
                  </div>
          <?php }
            }
          }
        } ?>

                </div>
                <!--end::Messages-->
      </div>
      <!--end::Scroll-->
    </div>
    <!--end::Body-->

  </div>