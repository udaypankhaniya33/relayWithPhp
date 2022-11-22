<?php include '../include/header1.php';

$getOrderDetails = mysqli_query($connection, "SELECT * FROM `orderdetail` WHERE `orderId`='" . $_GET["id"] . "'AND `delete`='0'")
?>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<style>
    .form-control {

        width: 100% !important;
    }
</style>

<style>
    body {
        background-color: #f4f7f6;
        margin-top: 20px;
    }

    .text-right {
        text-align: right !important;
        float: right;
    }

    .card {
        background: #fff;
        transition: .5s;
        border: 0;
        margin-bottom: 30px;
        border-radius: .55rem;
        position: relative;
        width: 100%;
        box-shadow: 0 1px 2px 0 rgb(0 0 0 / 10%);
    }

    .chat-app .people-list {
        width: 280px;
        position: absolute;
        left: 0;
        top: 0;
        padding: 20px;
        z-index: 7
    }

    .chat-app .chat {

        border-left: 1px solid #eaeaea
    }

    .people-list {
        -moz-transition: .5s;
        -o-transition: .5s;
        -webkit-transition: .5s;
        transition: .5s
    }

    .people-list .chat-list li {
        padding: 10px 15px;
        list-style: none;
        border-radius: 3px
    }

    .people-list .chat-list li:hover {
        background: #efefef;
        cursor: pointer
    }

    .people-list .chat-list li.active {
        background: #efefef
    }

    .people-list .chat-list li .name {
        font-size: 15px
    }

    .people-list .chat-list img {
        width: 45px;
        border-radius: 50%;
        height: 40px;
    }

    .people-list img {
        float: left;
        border-radius: 50%
    }

    .people-list .about {
        float: left;
        padding-left: 8px;
        padding-block-start: 5%;
    }

    .people-list .status {
        color: #999;
        font-size: 13px
    }

    .chat .chat-header {
        padding: 15px 20px;
        border-bottom: 2px solid #f4f7f6
    }

    .chat .chat-header img {
        float: left;
        border-radius: 40px;
        width: 40px
    }

    .chat .chat-header .chat-about {
        float: left;
        padding-left: 10px
    }

    .chat .chat-history {
        padding: 20px;
        border-bottom: 2px solid #fff
    }

    .chat .chat-history ul {
        padding: 0
    }

    .chat .chat-history ul li {
        list-style: none;
        margin-bottom: 30px
    }

    .chat .chat-history ul li:last-child {
        margin-bottom: 0px
    }

    .chat .chat-history .message-data {
        margin-bottom: 15px
    }

    .chat .chat-history .message-data img {
        border-radius: 40px;
        width: 40px
    }

    .chat .chat-history .message-data-time {
        color: #434651;
        padding-left: 6px
    }

    .chat .chat-history .message {
        color: #444;
        padding: 18px 20px;
        line-height: 26px;
        font-size: 16px;
        border-radius: 7px;
        display: inline-block;
        position: relative
    }

    .chat .chat-history .message:after {
        bottom: 100%;
        left: 7%;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;
        border-bottom-color: #fff;
        border-width: 10px;
        margin-left: -10px
    }

    .chat .chat-history .my-message {
        background: #efefef
    }

    .chat .chat-history .my-message:after {
        bottom: 100%;
        left: 30px;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;
        border-bottom-color: #efefef;
        border-width: 10px;
        margin-left: -10px
    }

    .chat .chat-history .other-message {
        background: #e8f1f3;
        text-align: right
    }

    .chat .chat-history .other-message:after {
        border-bottom-color: #e8f1f3;
        left: 93%
    }

    .chat .chat-message {
        padding: 20px
    }

    .online,
    .offline,
    .me {
        margin-right: 2px;
        font-size: 8px;
        vertical-align: middle
    }

    .online {
        color: #86c541
    }

    .offline {
        color: #e47297
    }

    .me {
        color: #1d8ecd
    }

    .float-right {
        float: right
    }

    .clearfix:after {
        visibility: hidden;
        display: block;
        font-size: 0;
        content: " ";
        clear: both;
        height: 0
    }

    @media only screen and (max-width: 767px) {
        .chat-app .people-list {
            height: 465px;
            width: 100%;
            overflow-x: auto;
            background: #fff;
            left: -400px;
            display: none
        }

        .chat-app .people-list.open {
            left: 0
        }

        .chat-app .chat {
            margin: 0
        }

        .chat-app .chat .chat-header {
            border-radius: 0.55rem 0.55rem 0 0
        }

        .chat-app .chat-history {
            height: 300px;
            overflow-x: auto
        }
    }

    @media only screen and (min-width: 768px) and (max-width: 992px) {
        .chat-app .chat-list {
            height: 650px;
            overflow-x: auto
        }

        .chat-app .chat-history {
            height: 600px;
            overflow-x: auto
        }
    }

    @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 1) {
        .chat-app .chat-list {
            height: 480px;
            overflow-x: auto
        }

        .chat-app .chat-history {
            height: calc(100vh - 350px);
            overflow-x: auto
        }
    }
</style>




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
                <span class="text-muted font-weight-bold mr-4"> Orders Details</span>
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
                            OrderDetails

                        </h3>
                    </div>

                </div>

                <div class="card-body">

                    <div class="tab-content mt-5" id="myTabContent">

                        <div class="container">
                            <div class="row ">

                                <div class="col-lg-12">

                                    <div class="card chat-app" id="chats">

                                        <div class="chat">
                                            <div class="chat-history" id="chat-history">
                                                <ul class="m-b-0 h-300px" style="overflow:scroll">


                               



                                                    <?php
                                                    if (mysqli_num_rows($getOrderDetails) != 0) {



                                                        while ($row = mysqli_fetch_array($getOrderDetails)) {
                                                    ?>


                                                            <li class="clearfix">
                                                                <div class="message-data text-right">
                                                                    <span class="message-data-time"><?php echo $row["created"] ?></span>
                                                                </div>

                                                                <br>
                                                                <br>
                                                                <?php if ($row["messageType"] == 'text') { ?>
                                                                    <div class="message other-message float-right"> <?php echo $row["message"] ?></div>
                                                                <?php } else if ($row["messageType"] == 'image') { ?>




                                                                    <div class="symbol symbol-100 mr-5  text-right">

                                                                        <div class="symbol-label" style="background-image:url('<?php echo $row["message"] ?>')"></div>


                                                                    </div>

                                                                <?php } elseif ($row["messageType"] == 'audio') { ?>



                                                                    <audio controls style="float: right;">
                                                                        <source src="<?php echo $row["message"] ?>" type="audio/ogg">

                                                                        Your browser does not support the audio element.
                                                                    </audio>

                                                                <?php } ?>
                                                            </li>

                                                        <?php }
                                                    } else { ?>

                                                        <h2>No Data avaliable at moment </h2>
                                                    <?php } ?>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



</div>

<?php include '../include/footer1.php' ?>

<script src="static/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script src="static/assets/js/pages/crud/datatables/basic/scrollable.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css" integrity="sha512-cyIcYOviYhF0bHIhzXWJQ/7xnaBuIIOecYoPZBgJHQKFPo+TOBA+BY1EnTpmM8yKDU4ZdI3UGccNGCEUdfbBqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js" integrity="sha512-IZ95TbsPTDl3eT5GwqTJH/14xZ2feLEGJRbII6bRKtE/HC6x3N4cHye7yyikadgAsuiddCY2+6gMntpVHL1gHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
    var objDiv = document.getElementById("chat-history");
    objDiv.scrollTop = objDiv.scrollHeight;

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

    function chats(orderDetailId) {
        data = {
            'OrderDetailId': orderDetailId
        }
        jsonText = JSON.stringify(data);
        $.ajax({
            url: '/getChats/',
            method: "POST",
            data: {
                'csrfmiddlewaretoken': '{{ csrf_token }}',
                'data': jsonText
            },
            success: function(result) {
                alert(result)
                $("#chats").html(result)
            },
            error: function(er) {
                toastr.error("failed");
            }
        });

    }
</script>