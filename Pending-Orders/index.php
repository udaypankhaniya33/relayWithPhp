<?php include '../include/header1.php' ?>
<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
        <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">

                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                    Orders </h5>
                <!--end::Page Title-->

                <!--begin::Actions-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200">

                </div>
                <span class="text-muted font-weight-bold mr-4">Pending Orders</span>


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
                            View Pending Orders

                        </h3>
                    </div>

                </div>

                <div class="card-body">
                    <!--begin: Datatable-->


                    <table class="table table-separate table-head-custom table-checkable responsive" id="metarial">
                        <thead>



                            <tr>
                                <th>#</th>
                                <th>Customer</th>
                                <th>Transporter</th>
                                <th>From</th>
                                <th>To</th>
                  
                                <th>Order Details </th>
                                <th>Amount</th>
                                <th>Commission</th>
                                <th>Final Price</th>
                   
                                <th>Order Chats </th>
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

<?php include '../include/footer1.php' ?>

<script src="../static/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script src="../static/assets/js/pages/crud/datatables/basic/scrollable.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css" integrity="sha512-cyIcYOviYhF0bHIhzXWJQ/7xnaBuIIOecYoPZBgJHQKFPo+TOBA+BY1EnTpmM8yKDU4ZdI3UGccNGCEUdfbBqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js" integrity="sha512-IZ95TbsPTDl3eT5GwqTJH/14xZ2feLEGJRbII6bRKtE/HC6x3N4cHye7yyikadgAsuiddCY2+6gMntpVHL1gHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script language="javascript">
    var url = "../serverresponse/pendingOrders.php";



function dataTable() {

    var table = $('#metarial');


    
    table.DataTable({
        "bDestroy": true,
        "ajax": url,
        columns: [{
                data: 'count'
            },
            {
                data: 'user'
            },
            {
                data: 'driver'
            },
            {
                data: 'fromAddress'
            },
            {
                data: 'toAddress'
            },
            {
                data: 'orderDetails'
            },
     
            {
                data: 'amount'
            },
            {
                data: 'commission'
            },
            {
                data: 'finalPrice'
            },
    
            {
                data: 'orderChat'
            },

        ],
    });
}


dataTable()

    function WatchDocument(Name) {
        Swal.fire({
            imageUrl: 'media/' + Name,
            imageHeight: 400,
            imageAlt: 'A tall image'
        })
    }

    function block(CustomerId) {


        data = {
            'customersId': CustomerId
        }
        jsonText = JSON.stringify(data);

        $.ajax({
            url: '/Block_UnBlock_User/',
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

                    toastr.success("unblock"); {
                        window.location.reload()
                    }
                    if (result == 1) {

                        toastr.success("block");
                        window.location.reload()

                    }
                }
            },
            error: function(er) {
                toastr.error("failed");
            }
        });
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

                    toastr.success("unblock");
                    window.location.reload()
                }
                if (result == 1) {

                    toastr.success("block"); {
                        window.location.reload()

                    }
                }
            },
            error: function(er) {
                toastr.error("failed");
            }
        });



    }


    function ApproveDriver(CustomerId) {

        data = {
            'CustomerId': CustomerId
        }
        jsonText = JSON.stringify(data);

        $.ajax({
            url: '/Approve-Driver-Request/',
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

                    toastr.success("unblock");
                    window.location.reload()
                }
                if (result == 1) {

                    toastr.success("block");
                    window.location.reload()

                }
            },
            error: function(er) {
                toastr.error("failed");
            }
        });



    }


    function changeText(CustomerId) {



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

                data = {
                    value: text.value,
                    CustomerId: CustomerId
                }
                jsonText = JSON.stringify(data);
                $.ajax({
                    url: "/Reject-Request/",
                    method: "post",
                    data: {




                        'csrfmiddlewaretoken': '{{ csrf_token }}',
                        'data': jsonText

                    },

                    success: function(response) {
                        window.location.reload()

                    }
                })



            }
            // console.log(text)
        })

    }
</script>