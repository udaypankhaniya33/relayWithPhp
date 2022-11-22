<?php
include "../include/dbconnection.php";
$chatId = $_POST["chatId"] || "";

$getChats = mysqli_fetch_array(mysqli_query($connection, "SELECT * FROM `chat` LEFT JOIN `user`ON `user`.`userId`=`chat`.`driverId` WHERE `chatId`='" . $_POST["chatId"] . "' AND `chat`.`delete`='0'"));




$query = mysqli_query($connection, "SELECT * FROM `chatdetail` WHERE `chatId`='" . $_POST["chatId"] . "' AND `delete`='0'");



?>


<div class="chat">
  <div class="chat-header clearfix">
    <div class="row">
      <div class="col-lg-6">

        <a href="javascript:void(0);">
          <img src="<?php

                    if ($getChats["profile"] == "") {
                      echo "../static/images/favicon.ico";
                    } else {
                      echo $getChats["profile"];
                    }

                    ?>" alt="avatar" style="
              border-radius: 5px;
              width: 45px;
              border-radius: 50%;
              height: 40px;
            " />
        </a>
        <div class="chat-about">
          <h6 class="m-b-0"><?php echo $getChats["fullName"] ?> </h6>
        </div>

      </div>
    </div>
  </div>
  <div class="chat-history">
    <ul class="m-b-0 h-300px" style="overflow: scroll;">



      <?php if (mysqli_num_rows($query) != 0) {
        while ($row = mysqli_fetch_array($query)) {

          if ($row["senderType"] == "user") {
            if ($row["messageType"] == "text") {
      ?>

              <li class="clearfix">
                <div class="message-data text-right">
                  <span class="message-data-time"><?php echo $row["created"] ?> </span>
                </div>
                <div class="message other-message float-right"><?php echo $row["message"] ?></div>
              </li>
            <?php }
            if ($row["messageType"] == "audio") { ?>

              <li class="clearfix">
                <div class="message-data text-right">
                  <span class="message-data-time"><?php echo $row["created"] ?> </span>
                </div>
                <audio controls class="text-right">
                  <source src="<?php echo $row["message"] ?>" type="audio/ogg">


                </audio>
              </li>

            <?php }
            if ($row["messageType"] == "image") { ?>
              <div class="symbol symbol-100 mr-5  text-right">
                <div class="symbol-label" style="background-image:url('<?php echo $row["message"] ?>')"></div>
              </div>

            <?php }
            if ($row["messageType"] == "price") { ?>



              <div class="symbol symbol-100 mr-5  ">

                <div class="card card-1" style="min-height: 200px;">
                  <h3 class="card-header" style="text-align: center;">Order Request Sent to Customer </h3>
                  <h2 class="card-body">Price $: <?php echo $row["message"] ?></h2>
                </div>

              </div>

          <?php }
          } ?>




          <?php if ($row["senderType"] == "driver") {
            if ($row["messageType"] == "text") {
          ?>





              <li class="clearfix">
                <div class="message-data">
                  <span class="message-data-time"><?php echo $row["created"] ?></span>
                </div>
                <div class="message my-message"><?php echo $row["message"] ?></div>
              </li>
            <?php }
            if ($row["messageType"] == "image") { ?>


              <div class="symbol symbol-100 mr-5 ">


                <div class="symbol-label" style="background-image:url('<?php echo $row["message"] ?>')"></div>
              </div>
            <?php }
            if ($row["messageType"] == "price") { ?>



              <div class="message-data">
                <span class="message-data-time"><?php echo $row["created"] ?></span>
              </div>

              <div class="symbol symbol-100 mr-5  ">

                <div class="card card-1" style="min-height: 200px;">
                  <h3 class="card-header" style="text-align: center;">Order Request Sent to Customer </h3>
                  <h2 class="card-body">Price $: <?php echo $row["message"] ?></h2>
                </div>

              </div>

            <?php }

            if ($row["messageType"] == "audio") { ?>

              <li class="clearfix">
                <div class="message-data ">
                  <span class="message-data-time"><?php echo $row["created"] ?></span>
                </div>
                <audio controls>
                  <source src="<?php echo $row["message"] ?>" type="audio/ogg">

                  Your browser does not support the audio element.
                </audio>

              </li>
            <?php } ?>



        <?php }
        }
      } else { ?>


        <h3>No Chats avaliable</h3>

      <?php } ?>
    </ul>
  </div>
</div>