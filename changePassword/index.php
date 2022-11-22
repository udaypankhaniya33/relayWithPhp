<?php include '../include/header1.php';


$error="";
$getdetails=mysqli_query($connection,"SELECT * FROM `admins_admin` WHERE `id`='".$_SESSION['id']."' ");
$result=mysqli_fetch_assoc($getdetails);
$password=$result['password'];   
if(isset($_POST['submit'])){ 

    $newPassword =md5($_POST['newPassword']);
    $currentPassword = md5($_POST['currentPassword']);


    if($currentPassword!=$password)
    {


        $error='<div class="form-group row error">
        <label class="col-form-label text-right col-lg-3 "></label>
        <label class="alert alert-danger col-form-label col-lg-3 col-sm-12 text-center ml-5"> Incorrect Password</label>
        </div>';
        $_SESSION["profileUpdateStatusFailed"]=1;  
        
    }
    else{
     $updateQuery = mysqli_query($connection,"UPDATE `admins_admin` SET `password`='".$newPassword."' where `id`='". $_SESSION['id']."'");
    //  print_r($updateQuery);
                if($updateQuery){
                    $_SESSION["profileUpdateStatus"]=1;               
                }
        
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
                <span class="text-muted font-weight-bold mr-4"> Change Password</span>
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
                            Change Password

                        </h3>

                    </div>

                </div>

                <div class="card-body">
     
                    <form class="form" id="kt_changepass_form" method="post"  enctype="multipart/form-data">
                         <?php echo $error?>
                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-3 col-sm-12">Current Password</label>
                            <div class="col-lg-6 col-md-9 col-sm-12">
                                <input type="password" name="currentPassword" class="form-control form-control-lg"
                                    placeholder="Current Password">
                               
                            </div>

                        </div>
                     
                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-3 col-sm-12">New Password</label>
                            <div class="col-lg-6 col-md-9 col-sm-12">
                                <input type="password" name="newPassword" id="newPassword"
                                    class="form-control form-control-lg" placeholder="New Password">
                            </div>

                        </div>



                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-3 col-sm-12">Confirm Password</label>
                            <div class="col-lg-6 col-md-9 col-sm-12">

                                <input type="password" name="confirmPassword" class="form-control form-control-lg"
                                    placeholder="Confirm Password">
                            </div>
                        </div>
                        <div class="card-footer" style="text-align:center;">
                            <button type="submit" name="submit" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModalScrollable" class="btn btn-primary mr-2">Submit</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>

    </div>

</div>

<?php include '../include/footer1.php' ?>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>



<script type="text/javascript">

var pattern = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/;

jQuery.validator.addMethod("numCharacters", function(value, element) {
    return this.optional(element) || pattern.test(value);
});


$("#kt_changepass_form").validate({
    rules: {
        currentPassword: {
            required: true,
            // numCharacters: true,
        },
        newPassword: {
            required: true,
           numCharacters: true,
        },
        confirmPassword: {
            required: true,
            equalTo: "#newPassword"
        }
    },
    messages: {
        currentPassword: {
            required: "Current Password Is Required",
            numCharacters: "Current Password  Must Contain 8 Character , One Number, One Uppercase & Lowercase latter And One Special Symbol"
        },
        newPassword: {
            required: "New Password Is Required",
            numCharacters: "New Password Must Contain Atleast 8 Character , One Number, One Uppercase & Lowercase latter And One Special Symbol"
        },
        confirmPassword: {
            required: "Confirm Password Is Required",
            equalTo: "Password Is Not Same!"
        }
    },

})
toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  };
  



</script>



<script>
    
    setTimeout(function() {
            $('.error').fadeOut(3000);
        }, 0);
<?php 




if(isset($_SESSION["profileUpdateStatus"])){
    unset($_SESSION["profileUpdateStatus"]);
?>
toastr.success("Password Updated Successfully");

<?php

} ?>
 

</script>



