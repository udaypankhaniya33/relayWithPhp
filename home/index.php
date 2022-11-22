<?php include "../include/header1.php";
// $totalUsers = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM `user` WHERE `is_driver`='0'AND `delete`='0' AND `status`='0'"));
// $totalDriver = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM `user` WHERE `is_driver`='1'AND `delete`='0' AND `status`='0'"));
// $pendingRequest = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM `user` WHERE `is_driver`='0' AND `is_requested`='1'AND  `delete`='0' AND `status`='0'"));
// $allOrders = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM `order` WHERE   `delete`='0'"));
$totalUsers=0;
$totalDriver =0;
$pendingRequest=0;
$allOrders =0;
?>




<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                    Dashboard
                </h5>
                <!--end::Page Title-->

                <!--begin::Actions-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                <!-- <span class="text-muted font-weight-bold mr-4"> Dashboard</span> -->
            </div>
            <!--end::Info-->
        </div>
    </div>


    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="card card-custom gutter-b">
                <div class="card-header" style="border-bottom: 0px solid #ebedf3;"></div>

                <div class="card-body">
                    <!--begin::Stats-->
                    <div class="card-spacer mt-n25">
                        <!--begin::Row-->
                        <div class="row m-0">
                            <div class="col bg-light-primary px-6 py-8 rounded-xl mr-7 mb-7"  style="cursor: pointer;" onclick="window.location.href='../All-customers/'">
                                <span class="svg-icon svg-icon-3x svg-icon-info d-block my-2">
                                    <i class="flaticon2-user icon-2x text-primary"></i>
                                    <!--end::Svg Icon-->
                                </span>
                                <a href="../All-customers/" class="text-primary font-weight-bold font-size-h6">
                                    Users
                                </a>
                                <a href="../All-customers/" class="text-primary font-weight-bold font-size-h6">
                                    <h2>
                                        <?php echo $totalUsers ?>


                                    </h2>
                                </a>
                            </div>

                            <!-- <div class="col  px-6 py-8 rounded-xl mb-7"></div> -->
                            <div class="col bg-light-success px-6 py-8 rounded-xl mb-7" style="cursor: pointer;" onclick="window.location.href='../All-Drivers/'">
                                <span class="svg-icon svg-icon-3x svg-icon-success d-block my-2">
                                    <i class="flaticon2-delivery-truck icon-2x text-success"></i>
                                </span>
                                <a href="../All-Drivers/" class="text-success font-weight-bold font-size-h6 mt-2">
                                    Drivers
                                </a>
                                <a href="../All-Drivers/" class="text-success font-weight-bold font-size-h6 mt-2">
                                    <h2>
                                        <?php echo $totalDriver ?>
                                    </h2>
                                </a>
                            </div>
                        </div>

                        <div class="row m-0">
                            <div class="col bg-light-info px-6 py-8 rounded-xl mr-7 mb-7" style="cursor: pointer;" onclick="window.location.href='../Pending-Driver-Request/'">
                                <span class="svg-icon svg-icon-3x svg-icon-info d-block my-2">
                                    <i class="flaticon2-user icon-2x text-info"></i>
                                    <!--end::Svg Icon-->
                                </span>
                                <a href="../Pending-Driver-Request/" class="text-info font-weight-bold font-size-h6">
                                    Pending Requests
                                </a>
                                <a href="../Pending-Driver-Request/" class="text-info font-weight-bold font-size-h6">
                                    <h2>

                                        <?php echo $pendingRequest ?>

                                    </h2>
                                </a>
                            </div>

                            <div class="col bg-light-info px-6 py-8 rounded-xl mr-7 mb-7" style="cursor: pointer;" onclick="window.location.href='../All-Orders/'" >
                                <span class="svg-icon svg-icon-3x svg-icon-info d-block my-2">
                                    <i class="flaticon2-user icon-2x text-info"></i>
                                    <!--end::Svg Icon-->
                                </span>
                                <a href="../All-Orders/" class="text-info font-weight-bold font-size-h6">
                                    All Orders
                                </a>
                                <a href="../All-Orders/" class="text-info font-weight-bold font-size-h6">
                                    <h2>

                                        <?php echo $allOrders ?>
                                    </h2>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include "../include/footer1.php" ?>