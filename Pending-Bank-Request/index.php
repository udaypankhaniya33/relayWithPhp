<?php include '../include/header1.php'  ?>
<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
        <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">

                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                    User </h5>
                <!--end::Page Title-->

                <!--begin::Actions-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200">

                </div>
                <span class="text-muted font-weight-bold mr-4"> Pending BankDetail Requests</span>

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
                            Pending Request
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-checkable" id="metarial">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Actions</th>
                                <th>Profile Pic</th>
                                <th>Full Name</th>
                                <th>Bank Name</th>
                                <th>Account Name</th>
                                <th>Account Number</th>
                                <th>IFSC Code</th>
                      
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '../include/footer1.php'; ?>

<script src="../static/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script src="../static/assets/js/pages/crud/datatables/basic/scrollable.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css" integrity="sha512-cyIcYOviYhF0bHIhzXWJQ/7xnaBuIIOecYoPZBgJHQKFPo+TOBA+BY1EnTpmM8yKDU4ZdI3UGccNGCEUdfbBqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js" integrity="sha512-IZ95TbsPTDl3eT5GwqTJH/14xZ2feLEGJRbII6bRKtE/HC6x3N4cHye7yyikadgAsuiddCY2+6gMntpVHL1gHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script language="javascript">
    $(document).ready(function() {
        var table = $('#metarial');
        table.DataTable({
            "scrollX": true,
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "../serverresponse/pendingRequestsBank.php"
        });
    });

    function rework(CustomerId) {
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



                console.log({
                    value: text.value,
                    CustomerId: CustomerId
                });

                $.ajax({
                    url: "../ajax/reuploadReqBank.php",
                    method: "POST",
                    data: {
                        value: text.value,
                        CustomerId: CustomerId
                    },

                    success: function(response) {
                        $('#metarial').DataTable().ajax.reload();
                        toastr.success("Reupload Request Sent Successfully");

                    }
                })



            }
            // console.log(text)
        })

    }


    function ApproveDriver(CustomerId) {


        data = {
            'CustomerId': CustomerId
        }
        jsonText = JSON.stringify(data);

        $.ajax({
            url: '../ajax/approveBank.php',
            method: "POST",
            data: {
                'CustomerId': CustomerId
            },
            success: function(result) {

                if (result == 3) {
                    toastr.warning("Somthing Went Wrong");
                }

                if (result == 1) {

                    $('#metarial').DataTable().ajax.reload();

                    toastr.success("Approved Successfully");


                }
            },
            error: function(er) {
                toastr.error("failed");
            }
        });



    }
</script>