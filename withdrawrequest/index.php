<?php include "../include/header1.php"; ?>
<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
        <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">

                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                    Payment Withdraw Requests </h5>
                <!--end::Page Title-->

                <!--begin::Actions-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200">

                </div>
                <span class="text-muted font-weight-bold mr-4"> </span>

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


                        </h3>
                    </div>

                </div>

                <div class="card-body">

                    <a type="button" href="exelfile/" onclick="window.location.reload" class="btn btn-light-info font-weight-bolder  float-right">
                        <span class="svg-icon svg-icon-md">
                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path d="M16,17 L16,21 C16,21.5522847 15.5522847,22 15,22 L9,22 C8.44771525,22 8,21.5522847 8,21 L8,17 L5,17 C3.8954305,17 3,16.1045695 3,15 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,15 C21,16.1045695 20.1045695,17 19,17 L16,17 Z M17.5,11 C18.3284271,11 19,10.3284271 19,9.5 C19,8.67157288 18.3284271,8 17.5,8 C16.6715729,8 16,8.67157288 16,9.5 C16,10.3284271 16.6715729,11 17.5,11 Z M10,14 L10,20 L14,20 L14,14 L10,14 Z" fill="#000000"></path>
                                    <rect fill="#000000" opacity="0.3" x="8" y="2" width="8" height="2" rx="1"></rect>
                                </g>
                            </svg>
               
                        </span> Export CSV file
                    </a> 



                    <table class="table table-separate table-head-custom table-checkable" id="metarial">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Actions</th>
                                <th>RequestId</th>
                                <th>Profile</th>
                                <th>Amount</th>
                                <th>Request Time</th>

                            </tr>
                        </thead>


                        <tbody>


                        </tbody>

                    </table>
                    <!--end: Datatable-->
                </div>
            </div>

        </div>

    </div>

</div>

<?php include "../include/footer1.php" ?>
<script src="../static/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script src="../static/assets/js/pages/crud/datatables/basic/scrollable.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css" integrity="sha512-cyIcYOviYhF0bHIhzXWJQ/7xnaBuIIOecYoPZBgJHQKFPo+TOBA+BY1EnTpmM8yKDU4ZdI3UGccNGCEUdfbBqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js" integrity="sha512-IZ95TbsPTDl3eT5GwqTJH/14xZ2feLEGJRbII6bRKtE/HC6x3N4cHye7yyikadgAsuiddCY2+6gMntpVHL1gHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script language="javascript">
    $(document).ready(function() {
        var table = $('#metarial');
        table.DataTable({
            "scrollX": true,

            "bDestroy": true,
            "ajax": " ../serverresponse/pendingWidthdrawRequest.php",
            columns: [{
                    data: 'count'
                },
                {
                    data: 'actions'
                },
                {
                    data: 'requestId'
                },
                {
                    data: 'profile'
                },
                {
                    data: 'amount'
                },
                {
                    data: 'created'
                },


            ],
        });


    });

    function WatchDocument(Name) {
        Swal.fire({
            imageUrl: Name,
            imageHeight: 400,
            imageAlt: 'A tall image'
        })
    }

    function generatecsv() {




    }

    function delet(CustomerId) {

        data = {
            'customersId': CustomerId
        }
        jsonText = JSON.stringify(data);

        $.ajax({
            url: '/delete_User/',
            method: "POST",
            data: {
                'csrfmiddlewaretoken': '{{ csrf_token }}',
                'data': jsonText
            },
            success: function(result) {

                if (result == 3) {
                    toastr.warning("Somthing Went Wrong");
                }
                if (result == 2) {

                    window.location.reload()
                }
                if (result == 1) {

                    window.location.reload()

                }
            },
            error: function(er) {
                toastr.error("failed");
            }
        });



    }


    function ApproveDriver( userId,WidthdrawRequestId) {



        $.ajax({
            url: '../ajax/approveWithDrawRequest.php',
            method: "POST",
            data: {
                WidthdrawRequestId: WidthdrawRequestId,
                userId: userId
            },
            success: function(result) {







                if (result == 1) {
                    toastr.success("success");
                    $('#metarial').DataTable().ajax.reload();
                } else {
                    toastr.warning("Somthing Went Wrong");
                }
            },
            error: function(er) {
                toastr.error(er);
            }
        });



    }


    function changeText(WidthdrawRequestId,userId) {

        const {
            value: text
        } = Swal.fire({
            input: 'textarea',
            inputLabel: 'Message',
            inputPlaceholder: 'Type your message here...',

            inputAttributes: {
                'aria-label': 'Type your message here'
            },
            showCancelButton: true
        }).then((text) => {
            if (text.value) {

                $.ajax({
                    url: '../ajax/RejectWithDrawRequest.php',
                    method: "post",
                    data: {
                        remarks: text.value,
                        WidthdrawRequestId:WidthdrawRequestId,
                        userId:userId

                    },

                    success: function(response) {
                        if (response == 1) {
                            toastr.success("success");
                            $('#metarial').DataTable().ajax.reload();
                        } else {
                            toastr.warning("Somthing Went Wrong");
                        }

                    }
                })
            }
        }) // console.log(text)
    }
</script>