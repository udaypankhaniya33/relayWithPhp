<?php include "../include/dbconnection.php";
?>
<!DOCTYPE html>
<base href="../">
<html lang="en">
<!--begin::Head-->

<meta charset="utf-8" />
<title>Relay | Forgot Password</title>
<meta name="description" content="Forgot password page example" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

<!--begin::Fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
<!--end::Fonts-->


<!--begin::Page Custom Styles(used by this page)-->
<link href="static/assets/css/pages/login/login-4.css" rel="stylesheet" type="text/css" />
<!--end::Page Custom Styles-->

<!--begin::Global Theme Styles(used by all pages)-->
<link href="static/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
<link href="static/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
<link href="static/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
<!--end::Global Theme Styles-->

<!--begin::Layout Themes(used by all pages)-->

<link href="static/assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
<link href="static/assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
<link href="static/assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
<link href="static/assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />
<!--end::Layout Themes-->

<link rel="shortcut icon" href="static/images/favicon.ico" />

</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed subheader-mobile-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
        <div class="login login-4 wizard d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Content-->
            <div class="login-container order-2 order-lg-1 d-flex flex-center flex-row-fluid px-7 pt-lg-0 pb-lg-0 pt-4 pb-6 bg-white">
                <!--begin::Wrapper-->
                <div class="login-content d-flex flex-column pt-lg-0 pt-12">
                    <!--begin::Logo-->
                    <a href="#" class="login-logo pb-xl-20 pb-15">
                        <!-- <img src="media/OIP.jpg" class="max-h-70px" alt=""/> -->
                    </a>
                    <!--end::Logo-->



                    <!--begin::Signin-->
                    <div class="login-form">
                        <form class="form" method="post" id="form">

                            <div class="pb-5 pb-lg-15">
                                <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Reset Password</h3>
                                <p class="text-muted font-weight-bold font-size-h4">Enter your email to reset your password</p>
                            </div>
                            <!--end::Title-->

                            <!--begin::Form group-->
         

                            <div class="form-group">
                                <input class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6" type="text" placeholder="Enter OTP eg. 8456 " id="OTP" name="OTP" autocomplete="off" />
                            </div>


                            <div class="form-group">
                                <input class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6" type="Password" placeholder="New password" id="newPassword" name="newPassword" autocomplete="off" />
                            </div>


                            <div class="form-group">
                                <input class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6" type="Password" placeholder="Confirm Password" id="confirmPassword" name="confirmPassword" autocomplete="off" />
                            </div>
                            <!--end::Form group-->

                            <!--begin::Form group-->
                            <div class="form-group d-flex flex-wrap">
                                <button type="submit" id="kt_login_forgot_form_submit_button" class="btn btn-primary ">Submit</button>

                            </div>
                            <!--end::Form group-->
                        </form>
                    </div>
                    <!--end::Signin-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--begin::Content-->

            <!--begin::Aside-->
            <div class="login-aside order-1 order-lg-2 bgi-no-repeat bgi-position-x-right">
                <div class="login-conteiner bgi-no-repeat bgi-position-x-right bgi-position-y-bottom" style="background-image: url(static/assets/media/svg/illustrations/login-visual-4.svg);">
                    <!--begin::Aside title-->
                    <h3 class="pt-lg-40 pl-lg-20 pb-lg-0 pl-10 py-20 m-0 d-flex justify-content-lg-start font-weight-boldest display5 display1-lg text-white">
                        Relay <br />
                        Admin<br />

                    </h3>
                    <!--end::Aside title-->
                </div>
            </div>
            <!--end::Aside-->
        </div>
        <!--end::Login-->
    </div>
    <!--end::Main-->



    <!--end::Global Config-->

    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="static/assets/plugins/global/plugins.bundle.js"></script>
    <script src="static/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
    <script src="static/assets/js/scripts.bundle.js"></script>
    <!--end::Global Theme Bundle-->


    <!--begin::Page Scripts(used by this page)-->
    <script src="static/assets/js/pages/custom/login/login-4.js"></script>
    <!--end::Page Scripts-->
</body>
<!--end::Body-->

</html>


<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<!--end::Global Config-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>


<script>
    $("#form").validate({
        rules: {
            newPassword: {
                required: true,
            },
            confirmPassword: {
                required: true,
                equalTo: "#newPassword"
            },
            OTP: {
                required: true,
            }
        },
        submitHandler: function(form) {



            var newPassword = $('#newPassword').val()
            var otp = $('#OTP').val()

            $("#kt_login_forgot_form_submit_button").attr("disabled", true);
            $("#kt_login_forgot_form_submit_button").addClass(" spinner spinner-white spinner-right")


            $.ajax({
                url: 'ajax/resetPassword.php',
                method: "POST",
                data: {
                    'email': '<?php echo $_SESSION["forgetEmail"] ?>',
                    password:newPassword,
                    OTP:otp

                },
                success: function(result) {



                    if (result == 2) {
                        toastr.warning("User Not Found");
                    }
                    if (result == 3) {
                        toastr.error("Somthing Went wrong");
                    }
                    if (result == 1) {
                        window.location.href=""
                    }
                    $("#kt_login_forgot_form_submit_button").attr("disabled", false);
                    $("#kt_login_forgot_form_submit_button").removeClass(" spinner spinner-white spinner-right")
                },
                error: function(er) {
                    toastr.error("failed");
                }
            });
        }
        
        // submitHandler: function(e) {
        //     email = $('#email').val()
        //     OTP = $('#OTP').val()
        //     newPassword = $('#newPassword').val()
        //     $("#kt_login_forgot_form_submit_button").attr("disabled", true);
        //     $("#kt_login_forgot_form_submit_button").addClass(" spinner spinner-white spinner-right")
        //     $.ajax({
        //         url: 'ajax/resetPassword.php',
        //         method: "POST",
        //         data: {
        //             'email': email,
        //             "OTP":OTP,
        //             "password":newPassword
        //         },
        //        success: function(result) {
        //             if (result == 2) {
        //                 toastr.warning("User Not Found");
        //             }
        //             if (result == 3) {
        //                 toastr.error("Somthing Went wrong");

        //             }
        //             if (result == 1) {

        //             }
        //             $("#kt_login_forgot_form_submit_button").attr("disabled", false);
        //             $("#kt_login_forgot_form_submit_button").removeClass(" spinner spinner-white spinner-right")
        //         },
        //         error: function(er) {
        //             toastr.error("failed");
        //         }
        //     });
        // }




    })
</script>


<script>
    // $("#form").on("submit", function(e) {
    //     e.preventDefault();
    //     $("#kt_login_forgot_form_submit_button").attr("disabled", true);
    //     $("#kt_login_forgot_form_submit_button").addClass(" spinner spinner-white spinner-right")
    // })
</script>