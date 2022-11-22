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
                <span class="text-muted font-weight-bold mr-4"> All Users </span>

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
                            All Users
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->

                    <div class="mb-7">
                        <div class="row align-items-center">
                            <div class="col-lg-9 col-xl-8">
                                <div class="row align-items-center">


                                    <div class="col-md-4 my-2 my-md-0">
                                        <div class="d-flex align-items-center">
                                            <label class="mr-3 mb-0 d-none d-md-block">Type:</label>
                                            <select class="form-control" id="kt_datatable_search_status">
                                                <option value="">All</option>
                                                <option value="0">User</option>
                                                <option value="1">Driver</option>

                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- 
                    <div class="category-filter">
                        <select id="categoryFilter" class="form-control">
                            <option value="">Show All</option>
                            <option value="User">User</option>
                            <option value="Driver">Driver</option>

                        </select>
                    </div> -->
                    <table class="table table-separate table-head-custom table-checkable" id="metarial">
                        <thead>
                            <tr>
                                <th>#</th>

                                <th>Actions</th>
                                <th>profilePic</th>
                                <th>Fullname</th>
                                <th>email</th>
                                <th>Type</th>

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

function dataTable() {
            var type = ""
            var type = $("#kt_datatable_search_status").val();
            var table = $('#metarial');
            table.DataTable({
                "bDestroy": true,
                "ajax": "../serverresponse/users.php?type=" + type,
                columns: [{
                        data: 'count'
                    },
                    {
                        data: 'actions'
                    },
                    {
                        data: 'profile'
                    },
                    {
                        data: 'fullName'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'type'
                    },

                ],
            });
        }
    $(document).ready(function() {





        $("#kt_datatable_search_status").change(function(e) {

            dataTable()
        });

        dataTable()

    });



    function WatchDocument(Name) {
        Swal.fire({
            imageUrl: Name,
            imageHeight: 400,
            imageAlt: 'A tall image'
        })
    }

    function block(CustomerId) {



        $.ajax({
            url: '../ajax/Block_UnBlock_User.php',
            method: "POST",
            data: {
                'CustomerId': CustomerId
            },
            success: function(data) {


                result = JSON.parse(data);



                if (result["status"] == "400") {
                    toastr.warning(result["message"]);
                }


                if (result["status"] == 200) {



                    if (result["userStatus"] == 0) {
                        $('#metarial').DataTable().ajax.reload();

                        toastr.success("UnBlocked Successfully");
                    } else {
                        $('#metarial').DataTable().ajax.reload();
                        toastr.success("Blocked Successfully");
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
        if (confirm(" Are You Sure You Want To Delete This User")) {
            $.ajax({
                url: '../ajax/deleteUser.php',
                method: "POST",
                data: {
                    'CustomerId': CustomerId
                },
                success: function(data) {
                    result = JSON.parse(data);
                    if (result["status"] == "400") {
                        toastr.warning(result["message"]);
                    }else if (result["status"] == "200") {

                        dataTable()

                        toastr.success("User Deleted Successfully");
                    }

                    // if (result == 3) {
                    //     toastr.warning("Somthing Went Wrong");
                    // }
                    // if (result == 1) {

                    //     dataTable()

                    //     toastr.success("User Deleted Successfully");

                    // }
                },
                error: function(er) {
                    toastr.error("failed");
                }
            });
        }





    }

    function ApproveUsers(CustomerId) {

        alert({
            'CustomerId': CustomerId
        })

        data = {
            'CustomerId': CustomerId
        }
        jsonText = JSON.stringify(data);

        $.ajax({
            url: '../ajax/approveDrive.php',
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
                    url: "../ajax/rejectUsers.php",
                    method: "post",
                    data: {
                        value: text.value,
                        CustomerId: CustomerId
                    },

                    success: function(response) {
                        $('#metarial').DataTable().ajax.reload();
                        toastr.success("Rejected Successfully");

                    }
                })



            }
            // console.log(text)
        })

    }
</script>