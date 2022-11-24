<?php include '../include/header1.php';



?>
<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
        <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">

                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                    Help And Support</h5>
                <!--end::Page Title-->

                <!--begin::Actions-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200">

                </div>
                <span class="text-muted font-weight-bold mr-4"> Inquiries </span>
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->

    <style>
        .messages {
            max-height: 390px;
            overflow-y: scroll;
        }
    </style>
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container ">

            <div class="card card-custom gutter-b">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">
                            All Tickets

                        </h3>
                    </div>

                </div>

                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-checkable" id="metarial">
                        <thead>


                            <tr>
                                <th>#</th>
                                <th>Profile</th>
                                <th>Time</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>File</th>
                                <th>Descriptions</th>
                                <th>Action</th>

                            </tr>
                        </thead>


                        <tbody>


                            <?php

                            ?>
                        </tbody>



                    </table>
                    <!--end: Datatable-->
                </div>
            </div>

        </div>

    </div>

</div>



<div class="modal modal-sticky modal-sticky-bottom-right" id="kt_chat_modal" role="dialog" data-backdrop="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!--begin::Card-->
            <div class="card card-custom">
                <!--begin::Header-->
                <div class="card-header align-items-center px-4 py-3">

                    <div class="text-center flex-grow-1">
                        <div class="text-dark-75 font-weight-bold font-size-h5" Id="UserName">Matt Pears</div>
                        <div>
                            <!-- <span class="label label-dot label-success"></span> -->
                            <!-- <span class="font-weight-bold text-muted font-size-sm">Active</span> -->
                        </div>
                    </div>
                    <div class="text-right flex-grow-1">
                        <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-dismiss="modal">
                            <i class="ki ki-close icon-1x"></i>
                        </button>
                    </div>
                </div>
                <!--end::Header-->

                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Scroll-->
                    <div class="scroll scroll-pull" id="chatMassage" data-height="500" data-mobile-height="300">
                        <!--begin::Messages-->


                        <!--end::Messages-->
                    </div>
                    <input type="hidden" id="lastId">
                    <!--end::Scroll-->
                </div>
                <!--end::Body-->

                <!--begin::Footer-->
                <div class="card-footer align-items-center">



                    <!--begin::Compose-->
                    <input type="text" class="form-control border-0 p-0" id="textData" placeholder="Type a message" value="">
                    <div class="d-flex align-items-center justify-content-between mt-5">
                        <!-- <div class="mr-3">
                            <a href="#" class="btn btn-clean btn-icon btn-md mr-1"><i class="flaticon2-photograph icon-lg"></i></a>
                            <a href="#" class="btn btn-clean btn-icon btn-md"><i class="flaticon2-photo-camera  icon-lg"></i></a>
                        </div> -->

                        <input type="hidden" id="helpAndSupportId">


                        <div>
                            <button type="submit" onclick="insertChat()" class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-6">Send</button>
                        </div>
                    </div>


                    <!--begin::Compose-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Card-->
        </div>
    </div>
</div>
<?php include '../include/footer1.php'; ?>

<script src="../static/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script src="../static/assets/js/pages/crud/datatables/basic/scrollable.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/firebase/8.2.2/firebase-app.js">
</script>
<script src="https://www.gstatic.com/firebasejs/8.2.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.2.1/firebase-database.js"></script>


<script>
    // Give the service worker access to Firebase Messaging.
    // Note that you can only use Firebase Messaging here, other Firebase libraries
    // are not available in the service worker.
    // importScripts('https://www.gstatic.com/firebasejs/7.14.5/firebase-app.js');
    // importScripts('https://www.gstatic.com/firebasejs/7.14.5/firebase-messaging.js');

    const firebaseConfig = {
        apiKey: "AIzaSyA2VTXwqJx9rG0t-xx1b8ClwJYhx_vsbFM",
        authDomain: "relay-9e0a3.firebaseapp.com",
        databaseURL: "https://relay-9e0a3-default-rtdb.firebaseio.com",
        projectId: "relay-9e0a3",
        storageBucket: "relay-9e0a3.appspot.com",
        messagingSenderId: "209390223818",
        appId: "1:209390223818:web:2b380d9329dc8d80a80f33",
        measurementId: "G-91LVTZSELJ"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    const db = firebase.database()



    const get_chat_in_firebase = async (id, db) => {




        var responsed = []
        var ref = await db.ref('support').child("support" + id).get();
        var html = "";


        var data = ref.val()


        if (data == null || data == undefined || data == "") {


            $("#chatMassage").html(html)

        } else {


            rows = Object.entries(data)

            console.log(rows);
            if (Object.keys(rows).length != 0) {



                rows.forEach(element => {
                    // console.log(element[1]["message"]);
                    if (element[1]['senderType'] == 'admin') {
                        html += '<div class="d-flex flex-column mb-5 align-items-end messageChat" id="' + element[1]['id'] + '"><div class="d-flex align-items-center"><div><span class="text-muted font-size-sm">' + element[1]['time'] + '</span><a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6"> You </a></div></div><div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">' + element[1]['message'] + '</div></div>'
                    } else {
                        html += ' <div class="d-flex flex-column mb-5 align-items-start messageChat" id="' + element[1]['id'] + '"><div class="d-flex align-items-center"><div><a href="../userDetails/?id=' + btoa(element[1]['senderId']) + '" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6"> ' + (element[1]['fullName']) + '</a><span class="text-muted font-size-sm">' + element[1]['time'] + '</span></div></div><div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">' + element[1]['message'] + element[1]['senderType'] + '</div></div>'
                    }
                });



                // console.log();
                // $("#lastId").val()
            }
        }

        $("#chatMassage").html(html)



    }
</script>
<script language="javascript">
    $(document).ready(function() {




        $('#metarial').dataTable({

            "bDestroy": true,
            "ajax": "../serverresponse/getHelpAndSupport.php",
            columns: [{
                    data: 'count'
                },
                {
                    data: 'user'
                },

                {
                    data: 'description'
                },
                {
                    data: 'subject'
                },

                {
                    data: 'email'
                },
                {
                    data: 'created'
                },
                {
                    data: 'file'
                },

                {
                    data: 'action'
                },

            ],

        });
    });
    $(".BTN-model").on("click", function() {
        $("#kt_chat_modal").modal("toggle");

    })

    // function chat_module(id, lastId) {
    //     html = ""
    //     $.ajax({
    //         type: 'POST',
    //         dataType: "json",

    //         data: {
    //             ticketId: id,
    //             offset: lastId

    //         },
    //         url: '../ajax/getsupportchat2.php',
    //         success: function(data) {
    //             if (data["status"] == "200") {
    //                 data["data"].forEach(element => {
    //                     if (element['senderType'] == 'admin') {
    //                         html += '<div class="d-flex flex-column mb-5 align-items-end messageChat" id="' + element['id'] + '"><div class="d-flex align-items-center"><div><span class="text-muted font-size-sm">' + element['time'] + '</span><a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6"> You </a></div></div><div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">' + element['message'] + '</div></div>'
    //                     } else {
    //                         html += ' <div class="d-flex flex-column mb-5 align-items-start messageChat" id="' + element['id'] + '"><div class="d-flex align-items-center"><div><a href="../userDetails/?id=' + btoa(element['senderId']) + '" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6"> ' + (element['fullName']) + '</a><span class="text-muted font-size-sm">' + element['time'] + '</span></div></div><div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">' + element['message'] + element['senderType'] + '</div></div>'
    //                     }
    //                 });
    //             }
    //             $("#chatMassage").html(html)
    //             $("#lastId").val($(".messageChat:last").attr('id'))
    //         },

    //     })
    // }
    //     $("#chatMassage").scroll(function() {
    //   chat_module(id,$("#lastId").val());
    //     })


    var getChats = async (id, fullName) => {

        $("#chatMassage").html("")

        $("#UserName").text(fullName)
        $("#kt_chat_modal").toggle();
        $("#helpAndSupportId").val(id)
        get_chat_in_firebase(id, db).then(function() {
            lastId = $(".messageChat:last").attr('id')


            $("#chatMassage").animate({
                scrollTop: $("#chatMassage").height() * lastId
            }, 1000);


        });
        if ($("#kt_chat_modal").css("display") == "block") {
            var intervalId = setInterval(function() {
                // chat_module(id, $("#lastId").val());

                get_chat_in_firebase(id, db)
            }, 500);
        }
    }



    document.getElementById('textData').addEventListener('keyup', function(event) {
        if (event.code === 'Enter') {
            insertChat()
        }
    });

    function insertChat() {

        id = $("#helpAndSupportId").val();
        message = ($("#textData").val());

        chatlength = $(".messageChat:last").attr('id');

        if ((message.trim()) == null || (message.trim()) == undefined || (message.trim()) == "") {


        } else {
            $.ajax({
                type: 'POST',
                dataType: "json",

                data: {
                    ticketId: id,
                    message: message,
                    chatlength: chatlength

                },
                url: '../ajax/addsupportchat.php',
                success: function(data) {
                    // console.log(data);

                    if (data["status"] == 200) {
                        get_chat_in_firebase(id, db).then(function() {
                            lastId = $(".messageChat:last").attr('id')


                            $("#chatMassage").animate({
                                scrollTop: $("#chatMassage").height() * lastId
                            }, 1000);

                            ($("#textData").val(""))

                        });
                    }


                },
                error: function(err) {

                }
            })
        }
    }
</script>