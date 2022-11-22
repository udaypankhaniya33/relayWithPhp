<?php include '../include/header1.php';
if (!isset($_SESSION['id'])) {
    header("location:../");
    exit;
} else {


    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt_array($curl, array(
        CURLOPT_URL => base . "adminDetails",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{
            \"adminId\": \"" . ($_SESSION['id']) . "\"\r\n
        }",
        CURLOPT_HTTPHEADER => array(

            "Content-Type: application/json"
        ),
    ));

    $response = (curl_exec($curl));




    if (curl_errno($curl)) {
        $error_msg = curl_error($curl);
    }

    if (isset($error_msg)) {
        echo $error_msg;

        exit;
    } else {
        $data = json_decode($response, true);

        $result = $data[0];
    }

    curl_close($curl);


    if (isset($_POST["submit"])) {

        $url = base . "updateAdminProfile"; // e.g. http://localhost/myuploader/upload.php // request URL
        $filesize = $_FILES["profile"]['size'];

        $headers = array(""); // cURL headers for file uploading
        $cfile = new CURLFile(
            $_FILES["profile"]['tmp_name'],
            $_FILES["profile"]['type'],
            $_FILES["profile"]['name'],

        );


        if ($_FILES["profile"]['type'] != "" || $_FILES["profile"]['type'] != null) {
            $postfields = array("image" => $cfile, "adminId" => $_SESSION['id'], "firstName" => trim($_POST["firstName"]), "lastName" => trim($_POST["lastName"]), "email" => trim($_POST["email"]), "mobileNumber" => trim($_POST["mobileNumber"]));
        } else {
            $postfields = array("adminId" => $_SESSION['id'], "firstName" => trim($_POST["firstName"]), "lastName" => trim($_POST["lastName"]), "email" => trim($_POST["email"]), "mobileNumber" => trim($_POST["mobileNumber"]));
        }

       



        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_HEADER => true,
            CURLOPT_POST => 1,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_POSTFIELDS => $postfields,
            CURLOPT_INFILESIZE => $filesize,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_RETURNTRANSFER => true,
            

        ); // cURL options
        curl_setopt_array($ch, $options);
        $response = curl_exec($ch);
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);
        if (curl_exec($ch) === false) {
             'Curl error: ' . curl_error($ch);
        } else {
            $data=json_decode($body,true);

            if($data["status"]==200){

                $successNote="1";

            }else{
                echo $data["message"];
                exit;
            }
       
        }

        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
        }
    
        if (isset($error_msg)) {
            echo $error_msg;
    
            exit;
        
        }

        curl_close($ch);
    }
}
?>
<style>
    .form-control {

        width: 100% !important;
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
                    Profile</h5>
                <!--end::Page Title-->

                <!--begin::Actions-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200">

                </div>
                <span class="text-muted font-weight-bold mr-4"> Edit Profile</span>
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
                            Edit Profile

                        </h3>
                    </div>

                </div>

                <div class="card-body">
                    <form class="form" id="kt_login_singin_form" method="post" enctype="multipart/form-data">
                        <!-- <form class="form" id="kt_login_singin_form" > -->

                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-3 col-sm-12">Profile
                                Picture</label>

                            <div class="col-lg-6 col-md-9 col-sm-12">
                                <label class="" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar" style="cursor: pointer;">
                                    <div class="image-input image-input-outline" id="kt_image_1">

                                        <div class="image-input-wrapper" style="background-image: url( '<?php echo $result['profilePic'] ?>')    ; background-repeat: round;"></div>


                                        <input type="file" name="profile" style="display:none" />
                                        <input type="hidden" name="profile_avatar_remove" />

                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">


                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                        </span>

                                    </div>
                                </label>


                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-3 col-sm-12">Full
                                Name</label>
                            <div class="col-lg-3 col-md-9 col-sm-12">
                                <input type="text" name="firstName" class="form-control form-control-lg" placeholder="First Name" value="<?php echo $result['firstName'] ?>">
                            </div>
                            <div class="col-lg-3 col-md-9 col-sm-12">
                                <input type="text" name="lastName" class="form-control form-control-lg" placeholder="Last Name" value="<?php echo $result['lastName'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-3 col-sm-12">Email</label>
                            <div class="col-lg-6 col-md-9 col-sm-12">

                                <input type="text" name="email" class="form-control form-control-lg" placeholder="Ex. reinerbraun@marlian.com" value="<?php echo $result['email'] ?>">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-3 col-sm-12">Mobile Number</label>
                            <div class="col-lg-6 col-md-9 col-sm-12">

                                <input type="text" name="mobileNumber" class="form-control form-control-lg" placeholder="Ex. 0547475720" value="<?php echo $result['number'] ?>">
                            </div>
                        </div>
                        <div class="card-footer" style="text-align:center;">
                            <button type="submit" name="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable" class="btn btn-primary mr-2">Submit</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>

    </div>


</div>
<?php include '../include/footer1.php' ?>

<!--end::Global Config-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>


<script>
    var pattern = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    jQuery.validator.addMethod("numCharacters", function(value, element) {
        return this.optional(element) || pattern.test(value);
    }, "Enter Valid Email");



    var pattern2 = /^[0-9]{8,11}$/
    jQuery.validator.addMethod("mobile", function(value, element) {
        return this.optional(element) || pattern2.test(value);
    }, "MobileNumber Must Be Minimum 8 Maximum 11 Long And only Number Allowed");

    $("#kt_login_singin_form").validate({
        rules: {
            firstName: {
                required: true,

            },
            lastName: {
                required: true
            },
            email: {
                required: true,
                numCharacters: true
            },
            mobileNumber: {
                required: true,
                mobile: true
            }

        },
        messages: {
            firstName: {
                required: "FirstName Is Required",
            },
            lastName: {
                required: "Last Is Required"
            },
            email: {
                required: "Email Is Required",

            },
            mobileNumber: {
                required: "Mobile Number Is Required",
            }
        }
    })
</script>
<script type="text/javascript">
    <?php
    if (isset($Ses)) {
    ?>
        toastr.success("Profile Updated Successfully");

    <?php

    } ?>


    <?php
    if (isset($_SESSION["profileUpdateStatus"])) {
        unset($_SESSION["profileUpdateStatus"]);
    ?>
        toastr.success("Profile Updated Successfully");

    <?php
    } ?>


    <?php if (isset($_SESSION['profileUpdateStatus'])) { ?>

        toastr.success('<?php echo $_SESSION["profileUpdateStatus"] ?>');

    <?php unset($_SESSION['profileUpdateStatus']);
    } ?>

    // set success session

    <?php if (isset($successNote)) {
        $_SESSION['profileUpdateStatus'] = $successNote; ?>

        window.location.href = window.location.href;

    <?php } ?>

    <?php if (isset($_SESSION['successDoc'])) { ?>

        toastr.success('<?php echo $_SESSION["successDoc"] ?>');

    <?php unset($_SESSION['successDoc']);
    } ?>

    // set success session

    <?php if (isset($successDoc)) {
        $_SESSION['successDoc'] = $successDoc; ?>

        window.location.href = window.location.href;


    <?php } ?>


    var avatar1 = new KTImageInput('kt_image_1');
</script>