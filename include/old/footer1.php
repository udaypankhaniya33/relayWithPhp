<!--begin::Footer-->





<div class="footer bg-white py-4 d-flex flex-lg-column " id="kt_footer">
    <!--begin::Container-->
    <div class=" container-fluid  d-flex flex-column flex-md-row align-items-center justify-content-between">
        <!--begin::Copyright-->
        <div class="text-dark order-2 order-md-1">
            <span class="text-muted fw-bold me-1"> <?php echo date("Y"); ?>&copy;
                Relay. All Rights Reserved. Design & Developed By <a href="https://xpertlab.com/" target="_blank" class="text-gray-800 text-hover-primary"><img class="h-40px mb-5" src="../static/images/XpertLab.png" alt=""></a></span>
        </div>
        <!--end::Copyright-->



        <!--begin::Nav-->
        <div class="nav nav-dark">

        </div>
        <!--end::Nav-->
    </div>
    <!--end::Container-->
</div>
<!--end::Footer-->
</div>
<!--end::Wrapper-->
</div>
<!--end::Page-->
</div>
</div>
</div>

<!-- begin::User Panel-->
<div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
    <!--begin::Header-->


    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
        <h3 class="font-weight-bold m-0">

            Hi, <?php echo      $resultData["firstName"] ?>

        </h3>
        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
            <i class="ki ki-close icon-xs text-muted"></i>
        </a>
    </div>
    <!--end::Header-->

    <!--begin::Content-->
    <div class="offcanvas-content pr-5 mr-n5">
        <!--begin::Header-->
        <div class="d-flex align-items-center mt-5">
            <div class="symbol symbol-100 mr-5">

                <div class="symbol-label" style="background-image:url('<?php
                                                                        echo $resultData["profilePic"]; ?>')"></div>


            </div>
            <div class="d-flex flex-column">
                <a href="../Edit-Profile/" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">

                </a>

                <div class="navi mt-2">
                    <a href="#" class="navi-item">
                        <span class="navi-link p-0 pb-2">
                            <span class="navi-icon mr-1">
                                <span class="svg-icon svg-icon-lg svg-icon-primary">
                                </span>
                            </span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <!--end::Header-->

        <!--begin::Separator-->
        <div class="separator separator-dashed mt-8 mb-5"></div>
        <!--end::Separator-->

        <!--begin::Nav-->
        <div class="navi navi-spacer-x-0 p-0">
            <!--begin::Item-->
            <a href="../Edit-Profile/" class="navi-item">
                <div class="navi-link">
                    <div class="symbol symbol-40 bg-light mr-3">
                        <div class="symbol-label">
                            <span class="svg-icon svg-icon-md svg-icon-success">
                                <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\User.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->

                            </span>
                        </div>
                    </div>
                    <div class="navi-text">
                        <div class="font-weight-bold">
                            My Profile
                        </div>
                    </div>
                </div>
            </a>
            <a href="../changePassword/" class="navi-item">
                <div class="navi-link">
                    <div class="symbol symbol-40 bg-light mr-3">
                        <div class="symbol-label">
                            <span class="svg-icon svg-icon-info svg-icon-2x">
                                <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Home\Key.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <polygon fill="#000000" opacity="0.3" transform="translate(8.885842, 16.114158) rotate(-315.000000) translate(-8.885842, -16.114158) " points="6.89784488 10.6187476 6.76452164 19.4882481 8.88584198 21.6095684 11.0071623 19.4882481 9.59294876 18.0740345 10.9659914 16.7009919 9.55177787 15.2867783 11.0071623 13.8313939 10.8837471 10.6187476" />
                                        <path d="M15.9852814,14.9852814 C12.6715729,14.9852814 9.98528137,12.2989899 9.98528137,8.98528137 C9.98528137,5.67157288 12.6715729,2.98528137 15.9852814,2.98528137 C19.2989899,2.98528137 21.9852814,5.67157288 21.9852814,8.98528137 C21.9852814,12.2989899 19.2989899,14.9852814 15.9852814,14.9852814 Z M16.1776695,9.07106781 C17.0060967,9.07106781 17.6776695,8.39949494 17.6776695,7.57106781 C17.6776695,6.74264069 17.0060967,6.07106781 16.1776695,6.07106781 C15.3492424,6.07106781 14.6776695,6.74264069 14.6776695,7.57106781 C14.6776695,8.39949494 15.3492424,9.07106781 16.1776695,9.07106781 Z" fill="#000000" transform="translate(15.985281, 8.985281) rotate(-315.000000) translate(-15.985281, -8.985281) " />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </div>
                    </div>
                    <div class="navi-text">
                        <div class="font-weight-bold">
                            Change Password
                        </div>
                    </div>
                </div>
            </a>

            <a class="navi-item" href="../ajax/signout.php">
                <div class="navi-link">
                    <div class="symbol symbol-40 bg-light mr-3">
                        <div class="symbol-label">
                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Navigation\Sign-out.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path d="M14.0069431,7.00607258 C13.4546584,7.00607258 13.0069431,6.55855153 13.0069431,6.00650634 C13.0069431,5.45446114 13.4546584,5.00694009 14.0069431,5.00694009 L15.0069431,5.00694009 C17.2160821,5.00694009 19.0069431,6.7970243 19.0069431,9.00520507 L19.0069431,15.001735 C19.0069431,17.2099158 17.2160821,19 15.0069431,19 L3.00694311,19 C0.797804106,19 -0.993056895,17.2099158 -0.993056895,15.001735 L-0.993056895,8.99826498 C-0.993056895,6.7900842 0.797804106,5 3.00694311,5 L4.00694793,5 C4.55923268,5 5.00694793,5.44752105 5.00694793,5.99956624 C5.00694793,6.55161144 4.55923268,6.99913249 4.00694793,6.99913249 L3.00694311,6.99913249 C1.90237361,6.99913249 1.00694311,7.89417459 1.00694311,8.99826498 L1.00694311,15.001735 C1.00694311,16.1058254 1.90237361,17.0008675 3.00694311,17.0008675 L15.0069431,17.0008675 C16.1115126,17.0008675 17.0069431,16.1058254 17.0069431,15.001735 L17.0069431,9.00520507 C17.0069431,7.90111468 16.1115126,7.00607258 15.0069431,7.00607258 L14.0069431,7.00607258 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.006943, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-9.006943, -12.000000) " />
                                        <rect fill="#000000" opacity="0.3" transform="translate(14.000000, 12.000000) rotate(-270.000000) translate(-14.000000, -12.000000) " x="13" y="6" width="2" height="12" rx="1" />
                                        <path d="M21.7928932,9.79289322 C22.1834175,9.40236893 22.8165825,9.40236893 23.2071068,9.79289322 C23.5976311,10.1834175 23.5976311,10.8165825 23.2071068,11.2071068 L20.2071068,14.2071068 C19.8165825,14.5976311 19.1834175,14.5976311 18.7928932,14.2071068 L15.7928932,11.2071068 C15.4023689,10.8165825 15.4023689,10.1834175 15.7928932,9.79289322 C16.1834175,9.40236893 16.8165825,9.40236893 17.2071068,9.79289322 L19.5,12.0857864 L21.7928932,9.79289322 Z" fill="#000000" fill-rule="nonzero" transform="translate(19.500000, 12.000000) rotate(-90.000000) translate(-19.500000, -12.000000) " />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </div>
                    </div>
                    <div class="navi-text">
                        <div class="font-weight-bold">
                            Sign out
                        </div>
                    </div>
                </div>
            </a>

            <!--end:Item-->


        </div>
        <!--end::Nav-->

        <!--begin::Separator-->
        <div class="separator separator-dashed my-7"></div>
        <!--end::Separator-->


    </div>
    <!--end::Content-->

</div>
<!-- end::User Panel-->



<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<!--begin::Global Config(global config for global JS scripts)-->
<script>
    var KTAppSettings = {
        breakpoints: {
            sm: 576,
            md: 768,
            lg: 992,
            xl: 1200,
            xxl: 1400,
        },
        colors: {
            theme: {
                base: {
                    white: "#ffffff",
                    primary: "#3699FF",
                    secondary: "#E5EAEE",
                    success: "#1BC5BD",
                    info: "#8950FC",
                    warning: "#FFA800",
                    danger: "#F64E60",
                    light: "#E4E6EF",
                    dark: "#181C32",
                },
                light: {
                    white: "#ffffff",
                    primary: "#E1F0FF",
                    secondary: "#EBEDF3",
                    success: "#C9F7F5",
                    info: "#EEE5FF",
                    warning: "#FFF4DE",
                    danger: "#FFE2E5",
                    light: "#F3F6F9",
                    dark: "#D6D6E0",
                },
                inverse: {
                    white: "#ffffff",
                    primary: "#ffffff",
                    secondary: "#3F4254",
                    success: "#ffffff",
                    info: "#ffffff",
                    warning: "#ffffff",
                    danger: "#ffffff",
                    light: "#464E5F",
                    dark: "#ffffff",
                },
            },
            gray: {
                "gray-100": "#F3F6F9",
                "gray-200": "#EBEDF3",
                "gray-300": "#E4E6EF",
                "gray-400": "#D1D3E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#7E8299",
                "gray-700": "#5E6278",
                "gray-800": "#3F4254",
                "gray-900": "#181C32",
            },
        },
        "font-family": "Poppins",
    };
</script>



<!--begin::Global Theme Bundle(used by all pages)-->
<script src="../static/assets/plugins/global/plugins.bundle.js"></script>
<script src="../static/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
<script src="../static/assets/js/scripts.bundle.js"></script>
<!--end::Global Theme Bundle-->

<!--begin::Page Vendors(used by this page)-->
<script src="../static/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
<!--end::Page Vendors-->

<!--begin::Page Scripts(used by this page)-->
<script src="../static/assets/js/pages/widgets.js"></script>
<!--end::Page Scripts-->

<?php
// show toaster message on success
function success($connection)
{
    //echo $_SESSION['success'];
    $status = false;
    $success = isset($_REQUEST["success"]) ? $_REQUEST["success"] : "";
    if (!empty($success)) {

        unset($_SESSION["success"]);
        $status = true;
    }
    echo json_encode(array($status, $success));
}

// show toaster message on failure
function danger($connection)
{
    $status = false;
    $danger = isset($_REQUEST["danger"]) ? $_REQUEST["danger"] : "";
    if (!empty($danger)) {
        unset($_SESSION["danger"]);
        $status = true;
    }
    echo json_encode(array($status, $danger));
}


?>
<script>
    // function WatchDocument(Name) {
    //     Swal.fire({
    //         imageUrl: Name,
    //         imageHeight: 400,
    //         imageAlt: 'A tall image'
    //     })
    // }

    // function block(CustomerId) {

    //     $.ajax({
    //         url: '../ajax/Block_UnBlock_User/',
    //         method: "POST",
    //         data: {
    //             'CustomerId': CustomerId
    //         },
    //         success: function(result) {

    //             if (result == 3) {
    //                 toastr.warning("Somthing Went Wrong");
    //             }
    //             if (result == 2) {

    //                 window.location.reload()
    //             }
    //             if (result == 1) {

    //                 window.location.reload()

    //             }
    //         },
    //         error: function(er) {
    //             toastr.error("failed");
    //         }
    //     });
    // }

    // function delet(CustomerId) {

    //     data = {
    //         'customersId': CustomerId
    //     }
    //     jsonText = JSON.stringify(data);

    //     $.ajax({
    //         url: '../ajax/deleteUser/',
    //         method: "POST",
    //         data: {
    //             'customersId': CustomerId
    //         },
    //         success: function(result) {

    //             if (result == 3) {
    //                 toastr.warning("Somthing Went Wrong");
    //             } else {
    //                 $('#metarial').DataTable().ajax.reload();

    //                 toastr.success("Approved Successfully");
    //             }


    //         },
    //         error: function(er) {
    //             toastr.error("failed");
    //         }
    //     });



    // }


    // function ApproveDriver(CustomerId) {

    //     alert({
    //         'CustomerId': CustomerId
    //     })

    //     data = {
    //         'CustomerId': CustomerId
    //     }
    //     jsonText = JSON.stringify(data);

    //     $.ajax({
    //         url: '../ajax/approveDrive.php',
    //         method: "POST",
    //         data: {
    //             'CustomerId': CustomerId
    //         },
    //         success: function(result) {

    //             if (result == 3) {
    //                 toastr.warning("Somthing Went Wrong");
    //             }

    //             if (result == 1) {

    //                 $('#metarial').DataTable().ajax.reload();

    //                 toastr.success("Approved Successfully");


    //             }
    //         },
    //         error: function(er) {
    //             toastr.error("failed");
    //         }
    //     });



    // }


    // function changeText(CustomerId) {



    //     const {value: text} = Swal.fire({
    //         input: 'textarea',
    //         inputLabel: 'Message',
    //         inputPlaceholder: 'Type your message here...',

    //         inputAttributes: {
    //             'aria-label': 'Type your message here'
    //         },
    //         showCancelButton: true
    //     }).then((text) => {
    //         if (text.value) {

    //             data = {
    //                 value: text.value,
    //                 CustomerId: CustomerId
    //             }
    //             jsonText = JSON.stringify(data);
    //             $.ajax({
    //                 url: "../ajax/rejectDriver.php",
    //                 method: "post",
    //                 data: {
    //                     value: text.value,
    //                     CustomerId: CustomerId
    //                 },

    //                 success: function(response) {
    //                     $('#metarial').DataTable().ajax.reload();
    //                     toastr.success("Rejected Successfully");

    //                 }
    //             })



    //         }
    //         // console.log(text)
    //          });

    // }
</script>
</body>
<!--end::Body-->

</html>