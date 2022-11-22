<?php include '../include/header1.php';


// $query2=mysqli_fetch_array(mysqli_query($connection,"SELECT * FROM `content` WHERE `key`='AdminServiceCharge' AND `delete`='0'" ));

// if (isset($_POST["submit"])) {
//     $title = trim($_POST["title"]);



//         $query = mysqli_query($connection, "UPDATE `content` SET `value`='" . $title . "' WHERE `key`='AdminServiceCharge' AND `delete`='0'");
//         if ($query) {
//             $successNote = "Commission Updated Successfull"; 
//             // header("location:../adminServiceCharge/");
//         }

// }




$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt_array($curl, array(
    CURLOPT_URL => base . "adminServiceChargeDetails",
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


    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt_array($curl, array(
        CURLOPT_URL => base . "updateServiceCharge",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{
        \"value\": \"" . ($_POST['title']) . "\"\r\n
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

        if ($data["status"] == 200) {
            $successNote = "Commission Updated Successfull";
            header("location:../adminServiceCharge/");
        } else {
            header("location:../adminServiceCharge/");
        }
    }

    curl_close($curl);
}




?>
<style>
    .error {
        color: red;
    }
</style>

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!-- begin::Subheader -->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Details-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Admin Commission</h5>
                <!--end::Title-->
                <!--begin::Separator-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                <!--end::Separator-->
                <!--begin::Search Form-->
                <div class="d-flex align-items-center" id="kt_subheader_search">
                    <span class="text-dark-50 font-weight-bold" id="kt_subheader_total"></span>
                </div>
                <!--end::Search Form-->
            </div>
            <!--end::Details-->

        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <h3 class="card-title">Admin Commission</h3>
                </div>
                <!--begin::Form-->
                <form class="form" method="post" id="myForm" enctype="multipart/form-data">

                    <div class="card-body">

                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-2 col-sm-12">Commission (<label style="color:red ;">%</label>)</label>
                            <div class="col-lg-6 col-md-9 col-sm-12">
                                <input type="text" name="title" min="1" max="100" class="form-control form-control-lg" value="<?php echo $result["value"] ?>">
                            </div>

                        </div>

                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-12" style="text-align: center;">

                                <button type="submit" id='kt_save_content' name="submit" class="btn btn-primary cebutton mr-2">Save</button>
                            </div>
                        </div>
                    </div>


                </form>
                <!--end::Form-->
            </div>
            <!--end::Card-->





        </div>
        <!--end::Container-->
    </div>



    <!--end::Entry-->
</div>
<?php include '../include/footer1.php' ?>








<?php if (isset($_SESSION["updated"])) { ?>
    <script>
        $(document).ready(function() {
            toastr.success("Content Updated Successfull");
        })
    </script>

<?php
    unset($_SESSION["updated"]);
} ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script src="../static/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script src="../static/assets/js/pages/crud/datatables/basic/scrollable.js"></script>


<script>
    $("#myForm").validate({
        rules: {

            title: {
                required: true,

            }
        },
        messages: {

            title: {
                required: "Commission Is Requried",
                min: "Please Enter A Value Greater Than Or Equal To 1.",
                max: "Please Enter A Value Less Than Or Equal To 100"
            },

        },



    });
</script>




<script>
    <?php if (isset($_SESSION['successNote'])) { ?>

        toastr.success('<?php echo $_SESSION["successNote"] ?>');

    <?php unset($_SESSION['successNote']);
    } ?>

    // set success session

    <?php if (isset($successNote)) {
        $_SESSION['successNote'] = $successNote; ?>

        window.location.href = '../adminServiceCharge/';

    <?php } ?>

    <?php if (isset($_SESSION['successDoc'])) { ?>

        toastr.success('<?php echo $_SESSION["successDoc"] ?>');

    <?php unset($_SESSION['successDoc']);
    } ?>

    // set success session

    <?php if (isset($successDoc)) {
        $_SESSION['successDoc'] = $successDoc; ?>

        window.location.href = '../adminServiceCharge/';

    <?php } ?>
</script>