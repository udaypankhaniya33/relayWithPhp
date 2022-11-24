<?php include '../include/header1.php';
$termsandconditionId = isset($_GET["Id"]) ? base64_decode($_GET["Id"]) : "";
if (isset($_GET["Id"])) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt_array($curl, array(
        CURLOPT_URL => base . "getTermsAndCondition",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{
            \"termsandconditionId\": \"" . ($termsandconditionId) . "\"\n

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
            $TNC = $data["data"][0];
        }
    }

    curl_close($curl);
}

if (isset($_POST["submit"])) {


    $title = trim($_POST["title"]);
    $description =  trim($_POST["description"]);
    $type = trim($_POST["type"]);


    if (isset($_GET["Id"])) {

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt_array($curl, array(
            CURLOPT_URL => base . "editTermsAndConditions",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{
                \"title\": \"" . ($title) . "\",\n
                \"type\": \"" . ($type) . "\",\n
                \"value\": \"" . ($description) . "\",\n
                \"termsandconditionId\": \"" . ($termsandconditionId) . "\"\n
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
                $successNote = "Content Added  Successfull";
            }
        }

        curl_close($curl);
    } else {
        // $query = mysqli_query($connection, "INSERT INTO `termsandcondition` SET `title`='" . $title . "',`value`='" . $description . "',`type`='" . $type . "' ");

        // if ($query) {

        //     $successNote = "Content Added  Successfull";
        // }


        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt_array($curl, array(
            CURLOPT_URL => base . "addTermsAndConditions",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{
                \"title\": \"" . ($title) . "\",\n
                \"type\": \"" . ($type) . "\",\n
                \"value\": \"" . ($description) . "\"\n
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
                $successNote = "Content Added  Successfull";
            }
        }

        curl_close($curl);
    }
}




?>
<style>
    .error {
        color: red;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!-- begin::Subheader -->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Details-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Terms And Conditions</h5>
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
                    <h3 class="card-title">Terms And Conditions</h3>
                </div>
                <!--begin::Form-->
                <form class="form" method="post" id="myForm" enctype="multipart/form-data">

                    <div class="card-body">

                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-2 col-sm-12">Title</label>
                            <div class="col-lg-6 col-md-9 col-sm-12">
                                <input type="text" name="title" class="form-control form-control-lg" placeholder="Title" value="<?php if (isset($_GET["Id"])) {
                                                                                                                                    echo $TNC["title"];
                                                                                                                                } ?>">
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-2 col-sm-12">Description</label>
                            <div class="col-lg-6 col-md-9 col-sm-12">
                                <textarea name="description" class="form-control form-control-lg"><?php if (isset($_GET["Id"])) {
                                                                                                        echo $TNC["value"];
                                                                                                    } ?></textarea>
                            </div>

                        </div>


                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-2 col-sm-12">Description Type</label>
                            <div class="col-lg-6 col-md-9 col-sm-12">
                                <select class="form-control" name="type">

                                    <option disabled <?php if (!isset($_GET["Id"])) {
                                                            echo "selected";
                                                        } ?>> Select Type</option>

                                    <option value="User" <?php if (isset($_GET["Id"])) {
                                                                if ($TNC["type"] == 'User') {
                                                                    echo "selected";
                                                                }
                                                            } ?>>User</option>
                                    <option value="Driver" <?php if (isset($_GET["Id"])) {
                                                                if ($TNC["type"] == 'Driver') {
                                                                    echo "selected";
                                                                }
                                                            } ?>>Driver</option>

                                </select>
                            </div>
                        </div>
                    </div>




                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-12" style="text-align: center;">
                                <button type="button" class="btn btn-secondary" onclick="window.location.href = '../Terms-And-Conditions'">Cancel</button>
                                <button type="submit" id='kt_save_content' name="submit" class="btn btn-primary cebutton mr-2">save</button>
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

    <div class="d-flex flex-column-fluid pt-5 ">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <h3 class="card-title">Terms And Conditions</h3>
                </div>


                <div class="card-body">


                    <table class="table table-separate  table-head-custom table-checkable" id="metarial">
                        <thead>
                            <tr>

                                <th>#</th>
                                <th>Action</th>
                                <th>Type</th>
                                <th>Title</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>


                        </tbody>
                    </table>


                </div>

            </div>
        </div>
    </div>


    <!--end::Entry-->
</div>
<?php include '../include/footer1.php' ?>

<script>
    <?php if (isset($_SESSION['profileUpdateStatus'])) { ?>

        toastr.success('<?php echo $_SESSION["profileUpdateStatus"] ?>');

    <?php unset($_SESSION['profileUpdateStatus']);
    } ?>

    // set success session

    <?php if (isset($successNote)) {
        $_SESSION['profileUpdateStatus'] = $successNote; ?>
        window.location.href = "../Terms-And-Conditions/"

    <?php } ?>




    <?php if (isset($_SESSION['profileUpdateStatus'])) { ?>

        toastr.success('<?php echo $_SESSION["profileUpdateStatus"] ?>');

    <?php unset($_SESSION['profileUpdateStatus']);
    } ?>

    // set success session

    <?php if (isset($updateNote)) {
        $_SESSION['profileUpdateStatus'] = $updateNote; ?>

        window.location.href = "../Terms-And-Conditions/"

    <?php } ?>
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<!-- include summernote css/js -->

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script src="../static/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script src="../static/assets/js/pages/crud/datatables/basic/scrollable.js"></script>

<script type="text/javascript">
    $(document).ready(function() {


        var table = $('#metarial');
        table.DataTable({
            "scrollX": true,
            "bProcessing": true,
            "bServerSide": false,
            "ajax": "../serverresponse/termsAndConditions.php",
            columns: [{
                    data: 'count'
                },
                {
                    data: 'action'
                },
                {
                    data: 'type'
                },
                {
                    data: 'title'
                },
                {
                    data: 'value'
                },


            ],
        });
    });
</script>
<script>
    function deleteT(CustomerId) {


        $.ajax({
            url: '../ajax/deleteTerms.php',
            method: "POST",
            data: {
                'CustomerId': atob(CustomerId)
            },
            success: function(data) {
                var result = JSON.parse(data)


                if (result["status"] == 200) {

                    toastr.success("Deleted SuccessFully");
                    $('#metarial').DataTable().ajax.reload();


                } else {
                    toastr.warning("Somthing Went Wrong");
                }
            },
            error: function(er) {
                toastr.error("failed");
            }
        });



    }

    function addslashes(str) {
        return (str + '').replace(/[\\"']/g, '\\$&').replace(/\u0000/g, '\\0');
    }

    $("#myForm").validate({
        rules: {

            title: {
                required: true,
            },
            type: {
                required: true,

            },
            description: {
                required: true,
            }
        },
        messages: {

            title: {
                required: "Title Is Requried",
            },
            description: {
                required: "Description Is Requried",
            },
            type: {
                required: "Please Select Type ",
            }
        },



    });
</script>