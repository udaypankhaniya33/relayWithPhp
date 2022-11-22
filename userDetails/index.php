<?php include '../include/header1.php';
// $userDetails = mysqli_fetch_array(mysqli_query($connection, "SELECT * FROM `user` WHERE `userId`='" . base64_decode($_GET["id"] ). "' AND `delete`='0'"))
$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt_array($curl, array(
	CURLOPT_URL =>base. "userDetails",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 0,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => "{
		\"userId\": \"".base64_decode($_GET["id"] )."\"\r\n
        }",
	CURLOPT_HTTPHEADER => array(

		"Content-Type: application/json"
	),
));


// echo base."login";exit;

$response = (curl_exec($curl));


if (curl_errno($curl)) {
	$error_msg = curl_error($curl);
}

if (isset($error_msg)) {
	echo $error_msg;
} else {

	$result = json_decode($response, true);

	$userDetails = $result["data"][0];
}




curl_close($curl);


?>
<style>
	.form-control {

		width: 100% !important;
	}


	.maps123 {
		max-height: 300px;
		max-width: 700px;
		min-width: 100px;
		min-height: 300px;
		margin: 0px;
		padding: 0px;

		margin-left: 5%;
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
					Users</h5>
				<!--end::Page Title-->

				<!--begin::Actions-->
				<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200">

				</div>
				<span class="text-muted font-weight-bold mr-4"> User Profile</span>
			</div>
			<!--end::Info-->
		</div>
	</div>
	<!--end::Subheader-->

	<!--begin::Entry-->
	<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class=" container-fluid ">

			<div class="card card-custom gutter-b">
				<div class="card-header flex-wrap border-0 pt-6 pb-0">
					<div class="card-title">
						<h3 class="card-label">
							User Profile

						</h3>
					</div>

				</div>

				<div class="card-body">
					<ul class="nav nav-tabs nav-tabs-line">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1">Profile</a>
						</li>


						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2">Placed Orders </a>
						</li>


						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#kt_tab_pane_3">Received Orders </a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#kt_tab_pane_4">Withdraw History </a>
						</li>
					</ul>
					<div class="tab-content mt-5" id="myTabContent">
						<div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel" aria-labelledby="kt_tab_pane_2">


							<div class="form" id="form" enctype="multipart/form-data">



								<div class="container">


									<div class="form-group row">
										<label class="col-form-label text-right col-lg-3 col-sm-12">Profile
											Picture</label>

										<div class="col-lg-6 col-md-9 col-sm-12">
											<div class="image-input image-input-outline" id="kt_image_1">
												<div class="image-input-wrapper" style="background-image: url( '<?php

																												if ($userDetails["profile"] == "") {
																													echo "../static/images/favicon.ico";
																												} else {
																													echo $userDetails["profile"];
																												}


																												?>')  ;   background-position: center;">
												</div>


												<input type="hidden" name="profile_avatar_remove" />
												</label>
												<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
													<i class="ki ki-bold-close icon-xs text-muted"></i>
												</span>
											</div>
										</div>
									</div>



									<div class="form-group row">
										<label class="col-form-label text-right col-lg-3 col-sm-12">Full
											Name</label>
										<div class="col-lg-3 col-md-9 col-sm-12">
											<input type="text" name="firstName" class="form-control form-control-lg" placeholder="First Name" value="<?php echo $userDetails["fullName"] ?>" readonly>
										</div>

									</div>
									<div class="form-group row">
										<label class="col-form-label text-right col-lg-3 col-sm-12">Email</label>
										<div class="col-lg-6 col-md-9 col-sm-12">

											<input type="text" name="email" class="form-control form-control-lg" placeholder="Email" value="<?php echo $userDetails["email"] ?>" readonly>

										</div>
									</div>




									<?php if ($userDetails["document"] != "" || $userDetails["document"] != null) { ?>
										<div class="form-group row">
											<label class="col-form-label text-right col-lg-3 col-sm-12">Uploader Id</label>
											<div class="col-lg-6 col-md-9 col-sm-12">
												<img src="<?php echo $userDetails["document"]  ?>" style="width: 40%">
											</div>
										</div>
									<?php } ?>


									<?php if ($userDetails["is_driver"] != 0) {
									?>

										<?php if ($userDetails["level"] != "" || $userDetails["level"] != null) { ?>

											<div class="form-group row">
												<label class="col-form-label text-right col-lg-3 col-sm-12">LEVEL</label>
												<div class="col-lg-6 col-md-9 col-sm-12 pt-3">



													<?php if ($userDetails["level"] == "1") {
													?>
														<svg xmlns="http://www.w3.org/2000/svg" width="17" height="20.005" viewBox="0 0 17 20.005">
															<g id="Group_518" data-name="Group 518" transform="translate(-142.826 -131.906)">
																<path id="_1Asset_1" data-name="1Asset 1" d="M17,4a1.81,1.81,0,0,0-1.25-1.69L9.07.1A1.85,1.85,0,0,0,7.84.1L1.23,2.41A1.82,1.82,0,0,0,0,4.12v6.64a8.12,8.12,0,0,0,4.59,7.29l3.6,1.86a.74.74,0,0,0,.36.09.73.73,0,0,0,.35-.09L12.51,18a8.58,8.58,0,0,0,2.43-1.84A8.28,8.28,0,0,0,17,10.66Z" transform="translate(142.826 131.912)" fill="#8d8d8d" />
																<text id="_1" data-name="1" transform="translate(148 146)" fill="#fff" font-size="11" font-family="Roboto-Bold, Roboto" font-weight="700">
																	<tspan x="0" y="0">1</tspan>
																</text>
															</g>
														</svg>
													<?php }
													if ($userDetails["level"] == "2") { ?>




														<svg xmlns="http://www.w3.org/2000/svg" width="17" height="20.005" viewBox="0 0 17 20.005">
															<g id="Group_519" data-name="Group 519" transform="translate(-142.826 -131.906)">
																<path id="_1Asset_1" data-name="1Asset 1" d="M17,4a1.81,1.81,0,0,0-1.25-1.69L9.07.1A1.85,1.85,0,0,0,7.84.1L1.23,2.41A1.82,1.82,0,0,0,0,4.12v6.64a8.12,8.12,0,0,0,4.59,7.29l3.6,1.86a.74.74,0,0,0,.36.09.73.73,0,0,0,.35-.09L12.51,18a8.58,8.58,0,0,0,2.43-1.84A8.28,8.28,0,0,0,17,10.66Z" transform="translate(142.826 131.912)" />
																<text id="_2" data-name="2" transform="translate(148 146)" fill="#fff" font-size="11" font-family="Roboto-Bold, Roboto" font-weight="700">
																	<tspan x="0" y="0">2</tspan>
																</text>
															</g>
														</svg>
													<?php }
													if ($userDetails["level"] == "3") { ?>



														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="17" height="20.005" viewBox="0 0 17 20.005">
															<defs>
																<linearGradient id="linear-gradient" x1="1" x2="0" y2="1" gradientUnits="objectBoundingBox">
																	<stop offset="0" stop-color="#fc0" />
																	<stop offset="0.263" stop-color="#ffee58" />
																	<stop offset="0.535" stop-color="#fb0" />
																	<stop offset="0.799" stop-color="#ffee97" />
																	<stop offset="1" stop-color="#fc0" />
																</linearGradient>
															</defs>
															<g id="Group_520" data-name="Group 520" transform="translate(-142.826 -131.906)">
																<path id="_1Asset_1" data-name="1Asset 1" d="M17,4a1.81,1.81,0,0,0-1.25-1.69L9.07.1A1.85,1.85,0,0,0,7.84.1L1.23,2.41A1.82,1.82,0,0,0,0,4.12v6.64a8.12,8.12,0,0,0,4.59,7.29l3.6,1.86a.74.74,0,0,0,.36.09.73.73,0,0,0,.35-.09L12.51,18a8.58,8.58,0,0,0,2.43-1.84A8.28,8.28,0,0,0,17,10.66Z" transform="translate(142.826 131.912)" fill="url(#linear-gradient)" />
																<text id="_3" data-name="3" transform="translate(148 146)" font-size="11" font-family="Roboto-Bold, Roboto" font-weight="700">
																	<tspan x="0" y="0">3</tspan>
																</text>
															</g>
														</svg>

													<?php } ?>



												</div>



											</div>
									<?php
										}
									} ?>

									<div class="form-group row">
										<label class="col-form-label text-right col-lg-3 col-sm-12">Document
											Actions</label>
										<a href="<?php echo $userDetails["document"] ?>" style="width: 30px;height: 30px; margin-right:5px;" class="btn btn-icon
											btn-success" download title="Download Document" data-toggle="tooltip" data-theme="dark" data-placement="right"><i class="fa fa-download" aria-hidden="true"></i>
										</a>

										<button onclick="WatchDocument('<?php echo $userDetails['document'] ?>')" style="width: 30px;height:
												30px;" title="Watch Document" data-toggle="tooltip" data-theme="dark" type="button" data-placement="right" class="btn btn-icon btn-info">
											<i class="fas
													fa-eye"></i></button>

									</div>

									<div class="form-group row">
										<label class="col-form-label text-right col-lg-3 col-sm-12">Location</label>
										<div class="col-lg-6 col-md-9 col-sm-12">


											<ul>
												<?php

												$array = json_decode($userDetails['city']) == "" ? [] : json_decode($userDetails['city']);
												if (count($array) != 0) {



													foreach (json_decode($userDetails['city']) as $key => $data) { ?>
														<?php if ($data != "") {

														?>

															<li> <?php echo $data ?></li>
												<?php }
													}
												} else {

													echo "<h3>User Has Not Selected Any City Yet </h3>";
												} ?>
											</ul>



										</div>
									</div>


									<hr>

									<label class="col-form-label text-right col-lg-3 col-sm-12">
										<h3>Bank Details:</h3>
									</label>
									<div class="form-group row">
										<label class="col-form-label text-right col-lg-3 col-sm-12">Bank Name</label>
										<div class="col-lg-6 col-md-9 col-sm-12">

											<input type="text" name="mobileNumber" class="form-control form-control-lg" placeholder="Bank Name" value="<?php echo $userDetails["bankName"] ?>" readonly>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-form-label text-right col-lg-3 col-sm-12">Account Name</label>
										<div class="col-lg-6 col-md-9 col-sm-12">

											<input type="text" name="mobileNumber" class="form-control form-control-lg" placeholder="Account Name" value="<?php echo $userDetails["accountName"] ?>" readonly>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label text-right col-lg-3 col-sm-12">Account Number</label>
										<div class="col-lg-6 col-md-9 col-sm-12">

											<input type="text" name="mobileNumber" class="form-control form-control-lg" placeholder="Account Number" value="<?php echo $userDetails["accountNumber"] ?>" readonly>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label text-right col-lg-3 col-sm-12">IFSC Code</label>
										<div class="col-lg-6 col-md-9 col-sm-12">

											<input type="text" name="mobileNumber" class="form-control form-control-lg" placeholder="IFSC Code" value="<?php echo $userDetails["ifscCode"] ?>" readonly>
										</div>
									</div>





									<div class="card-footer" style="text-align:center;">
										<a href="../Users/" class="btn btn-primary" class="btn btn-primary mr-2">Back To
											All Users </a>
									</div>

								</div>
							</div>
						</div>


						<div class="tab-pane fade table-responsive" id="kt_tab_pane_2" role="tabpanel" aria-labelledby="kt_tab_pane_2">
						
							<table class="table table-separate table-head-custom table-checkable " id="metarial">
									<thead>



										<tr>
											<th>#</th>
											<th>Customer</th>
											<th>From</th>
											<th>To</th>
											<th>Transporter</th>
											<th>Order Details </th>
											<th>Amount</th>
											<th>Commission</th>
											<th>Final Price</th>
											<th>Order Status From User</th>
											<th>Order Status </th>
											<th>Order Chats </th>
										</tr>
									</thead>


									<tbody>


										<?php

										// $getorders = mysqli_query($connection, "SELECT *,
										// (SELECT `fullName` FROM `user` WHERE `user`.`userId` = `order`.`userId`) as `userName`,
										// (SELECT `profile` FROM `user` WHERE `user`.`userId` = `order`.`userId`) as `userPic`,
										// (CASE WHEN `order`.`driverId`=0 THEN CONCAT('The Driver is not Assigned Yet')
										//  ELSE (SELECT `fullName` FROM `user` WHERE `user`.`userId` = `order`.`driverId`) END 
										//  )  as `DriverName`,
										//  (CASE WHEN `order`.`driverId`=0 THEN CONCAT('')ELSE(SELECT `profile` FROM `user` WHERE `user`.`userId` = `order`.`driverId`) END )
										//    as `DriverPic` FROM `order` WHERE `order`.`userId`='" . base64_decode($_GET["id"]). "' AND  `order`.`delete`='0' ");

										$curl = curl_init();
										curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
										curl_setopt_array($curl, array(
											CURLOPT_URL =>base. "userPlacedOrders",
											CURLOPT_RETURNTRANSFER => true,
											CURLOPT_ENCODING => "",
											CURLOPT_MAXREDIRS => 10,
											CURLOPT_TIMEOUT => 0,
											CURLOPT_FOLLOWLOCATION => true,
											CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
											CURLOPT_CUSTOMREQUEST => "POST",
											CURLOPT_POSTFIELDS => "{
												\"userId\": \"".base64_decode($_GET["id"] )."\"\r\n
												}",
											CURLOPT_HTTPHEADER => array(
										
												"Content-Type: application/json"
											),
										));
										
										
										// echo base."login";exit;
										
										$response = (curl_exec($curl));
										
										
										if (curl_errno($curl)) {
											$error_msg = curl_error($curl);
										}
										
										if (isset($error_msg)) {
											echo $error_msg;
										} else {


										
											$result = json_decode($response, true);
										


											if(count($result["data"]) != 0){
												$orderDetails = $result["data"][0];
											}else{
												$orderDetails = $result["data"];
											}
							
										}
										
										
								
										curl_close($curl);
										$count = 0;
										// while ($row = mysqli_fetch_array($getorders)) {


											foreach ($orderDetails as $row) {
									



										?>
											<tr>
												<th><span style="margin-left: -40%;"> <?php
																						$count++;
																						echo $count; ?></span></th>
												<th>

													<a href="../userDetails/?<?php echo base64_encode($row["userId"]) ?>" class="symbol symbol-lg-35 symbol-25 symbol-light-success">
														<img src="<?php
																	if ($row["userPic"] == "") {
																		echo "../static/images/favicon.ico";
																	} else {
																		echo $row["userPic"];
																	}


																	?>" style="width: 40px;border-radius: 10px;">

													</a>

													<br>
													<span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
														<?php echo $row["userName"] ?>
													</span>

												</th>
												<th> <?php echo $row["fromAddress"] ?></th>
												<th> <?php echo $row["toAddress"] ?></th>


												<th>


													<?php if ($row["driverId"] != '0') { ?>
														<a href="../userDetails/?id=<?php echo $row["driverId"] ?>" class="symbol symbol-lg-35 symbol-25 symbol-light-success">


															<img src="<?php



																		if ($row["DriverPic"] == "") {
																			echo "../static/images/favicon.ico";
																		} else {
																			echo $row["DriverPic"];
																		}
																		?>" style="width: 40px;border-radius: 10px;">

														</a>





														<br>
														<span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
															<?php echo $row["DriverName"] ?>
														</span>
													<?php } else { ?>
														<span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
															<?php echo $row["DriverName"] ?>
														</span>
													<?php } ?>



												</th>

												<th>
													<a href="../orderDetails/?id=<?php echo $row["orderId"] ?>" style="width: 30px; height: 30px; margin-right: 5px;" title="View details" data-toggle="tooltip" data-theme="dark" data-placement="right" class="btn btn-icon btn-success">
														<i class="fa fa-eye"></i>
													</a>

												</th>


												<th>
													<span class="label label-lg font-weight-bold label-light-primary label-inline">
														<?php echo $row["amount"] ?> ILS</span>

												</th>

												<th>
													<span class="label label-lg font-weight-bold label-light-primary label-inline">
														 <?php echo $row["commission"] ?> ILS</span>

												</th>
												<th>
													<span class="label label-lg font-weight-bold label-light-primary label-inline">
														<?php echo $row["finalPrice"] ?> ILS</span>

												</th>


												<?php if ($row["userStatus"] == 0) { ?>
													<th>
														<span class="label label-lg font-weight-bold label-light-primary label-inline">Pending</span>
													</th>
												<?php } else if ($row["userStatus"] == 1) { ?>





													<th>
														<span class="label label-lg font-weight-bold label-light-success label-inline">Accepted</span>
													</th>


												<?php } else if ($row["userStatus"] == 2) { ?>



													<th>
												                           <span   style="height: 46px;" class="label label-lg font-weight-bold label-light-Warning label-inline">Deleted By User</span>
													</th>

												<?php } else if ($row["userStatus"] == 3) { ?>


													<th>
														<span style="height: 46px;" class="label label-lg font-weight-bold label-light-info label-inline">Payment
															Pending</span>
													</th>

												<?php } else if ($row["userStatus"] == 4) { ?>



													<th>
														<span class="label label-lg font-weight-bold label-light-warning  label-inline">Rejceted
														</span>
													</th>
												<?php } ?>










												<?php if ($row["orderStatus"] == 0) { ?>
													<th>
														<span class="label label-lg font-weight-bold label-light-primary label-inline">Pending</span>
													</th>

												<?php } else if ($row["orderStatus"] == 3) { ?>



													<th>
														<span class="label label-lg font-weight-bold label-light-warning label-inline">Rejected</span>
													</th>
												<?php } else if ($row["orderStatus"] == 1) { ?>



													<th>
														<span class="label label-lg font-weight-bold label-light-info label-inline">Running</span>
													</th>

												<?php } else if ($row["orderStatus"] == 2) { ?>

													<th>
														<span class="label label-lg font-weight-bold label-light-success label-inline">delivared</span>
													</th>
												<?php } else if ($row["orderStatus"] == 3) { ?>




													<th>
														<span class="label label-lg font-weight-bold label-light-warning label-inline">Rejected</span>
													</th>
												<?php } else if ($row["orderStatus"] == 4) { ?>





													<th>
														<span class="label label-lg font-weight-bold label-light-success label-inline">completed
														</span>
													</th>
												<?php } ?>


												<th>
													<a href="../orderChat/?id=<?php echo $row["orderId"] ?>" style="width: 30px; height: 30px; margin-right: 5px;" title="View details" data-toggle="tooltip" data-theme="dark" data-placement="right" class="btn btn-icon btn-info">
														<i class="fa fa-comment"></i>
													</a>

												</th>




											</tr>
										<?php } ?>
									</tbody>
								</table>
					
						</div>



						<div class="tab-pane fade table-responsive" id="kt_tab_pane_3" role="tabpanel" aria-labelledby="kt_tab_pane_3">
								<table  class="table table-separate table-head-custom table-checkable responsive"  id="metarial2">
									<thead>



										<tr>
											<th>#</th>
											<th>Customer</th>
											<th>From</th>
											<th>To</th>
											<th>Transporter</th>
											<th>Order Details </th>
											<th>Amount</th>
											<th>Commission</th>
											<th>Final Price</th>
											<th>Order Status From User</th>
											<th>Order Status </th>
											<th>Order Chats </th>
										</tr>
									</thead>


									<tbody>


										<?php
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt_array($curl, array(
			CURLOPT_URL =>base. "driverorders",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "{
				\"driverId\": \"".base64_decode($_GET["id"] )."\"\r\n
				}",
			CURLOPT_HTTPHEADER => array(
		
				"Content-Type: application/json"
			),
		));
		
		
		// echo base."login";exit;
		
		$response = (curl_exec($curl));
		
		
		if (curl_errno($curl)) {
			$error_msg = curl_error($curl);
		}
		
		if (isset($error_msg)) {
			echo $error_msg;
		} else {
			$result = json_decode($response, true);
			if(($result["status"]) != 400){
				$orderDetails = $result["data"][0];
			}else{
				$orderDetails = [];
			}

		}
		
		

		curl_close($curl);
		$count = 0;
		// while ($row = mysqli_fetch_array($getorders)) {


			foreach ($orderDetails as $row) {?>
											<tr>
												<th><span style="margin-left: -40%;"> <?php
																						$count++;
																						echo $count; ?></span></th>
												<th>

													<a href="../userDetails/?id=<?php echo base64_encode($row["userId"]) ?>" class="symbol symbol-lg-35 symbol-25 symbol-light-success">
														<img src="<?php
																	if ($row["userPic"] == "") {
																		echo "../static/images/favicon.ico";
																	} else {
																		echo $row["userPic"];
																	}


																	?>" style="width: 40px;border-radius: 10px;">

													</a>

													<br>
													<span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
														<?php echo $row["userName"] ?>
													</span>

												</th>
												<th> <?php echo $row["fromAddress"] ?></th>
												<th> <?php echo $row["toAddress"] ?></th>


												<th>


													<?php if ($row["driverId"] != '0') { ?>
														<a href="../userDetails/?id<?php echo $row["driverId"] ?>" class="symbol symbol-lg-35 symbol-25 symbol-light-success">


															<img src="<?php



																		if ($row["DriverPic"] == "") {
																			echo "../static/images/favicon.ico";
																		} else {
																			echo $row["DriverPic"];
																		}
																		?>" style="width: 40px;border-radius: 10px;">

														</a>





														<br>
														<span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
															<?php echo $row["DriverName"] ?>
														</span>
													<?php } else { ?>
														<span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
															<?php echo $row["DriverName"] ?>
														</span>
													<?php } ?>



												</th>

												<th>
													<a href="../orderDetails/?id=<?php echo $row["orderId"] ?>" style="width: 30px; height: 30px; margin-right: 5px;" title="View details" data-toggle="tooltip" data-theme="dark" data-placement="right" class="btn btn-icon btn-success">
														<i class="fa fa-eye"></i>
													</a>

												</th>


												<th>
													<span class="label label-lg font-weight-bold label-light-primary label-inline">
														<?php echo $row["amount"] ?> ILS</span>

												</th>

												<th>
													<span class="label label-lg font-weight-bold label-light-primary label-inline">
														 <?php echo $row["commission"] ?> ILS</span>

												</th>
												<th>
													<span class="label label-lg font-weight-bold label-light-primary label-inline">
														<?php echo $row["finalPrice"] ?> ILS</span>

												</th>


												<?php if ($row["userStatus"] == 0) { ?>
													<th>
														<span class="label label-lg font-weight-bold label-light-primary label-inline">Pending</span>
													</th>
												<?php } else if ($row["userStatus"] == 1) { ?>





													<th>
														<span class="label label-lg font-weight-bold label-light-success label-inline">Accepted</span>
													</th>


												<?php } else if ($row["userStatus"] == 2) { ?>



													<th>
												                           <span   style="height: 46px;" class="label label-lg font-weight-bold label-light-Warning label-inline">Deleted By User</span>
													</th>

												<?php } else if ($row["userStatus"] == 3) { ?>


													<th>
														<span style="height: 46px;" class="label label-lg font-weight-bold label-light-info label-inline">Payment
															Pending</span>
													</th>

												<?php } else if ($row["userStatus"] == 4) { ?>



													<th>
														<span class="label label-lg font-weight-bold label-light-warning  label-inline">Rejceted
														</span>
													</th>
												<?php } ?>










												<?php if ($row["orderStatus"] == 0) { ?>
													<th>
														<span class="label label-lg font-weight-bold label-light-primary label-inline">Pending</span>
													</th>

												<?php } else if ($row["orderStatus"] == 3) { ?>



													<th>
														<span class="label label-lg font-weight-bold label-light-warning label-inline">Rejected</span>
													</th>
												<?php } else if ($row["orderStatus"] == 1) { ?>



													<th>
														<span class="label label-lg font-weight-bold label-light-info label-inline">Running</span>
													</th>

												<?php } else if ($row["orderStatus"] == 2) { ?>

													<th>
														<span class="label label-lg font-weight-bold label-light-success label-inline">delivared</span>
													</th>
												<?php } else if ($row["orderStatus"] == 3) { ?>




													<th>
														<span class="label label-lg font-weight-bold label-light-warning label-inline">Rejected</span>
													</th>
												<?php } else if ($row["orderStatus"] == 4) { ?>





													<th>
														<span class="label label-lg font-weight-bold label-light-success label-inline">completed
														</span>
													</th>
												<?php } ?>


												<th>
													<a href="../orderChat/?id=<?php echo $row["orderId"] ?>" style="width: 30px; height: 30px; margin-right: 5px;" title="View details" data-toggle="tooltip" data-theme="dark" data-placement="right" class="btn btn-icon btn-info">
														<i class="fa fa-comment"></i>
													</a>

												</th>




											</tr>
										<?php } ?>
									</tbody>
								</table>
						</div>

						<div class="tab-pane fade table-responsive" id="kt_tab_pane_4" role="tabpanel" aria-labelledby="kt_tab_pane_3">
								<table  class="table table-separate table-head-custom table-checkable responsive"  id="metarial3">
									<thead>



										<tr>
											<th>#</th>
											<th>requestId</th>
											<th>amount</th>
											<th>Time</th>
											<th>Status</th>
											
										</tr>
									</thead>


									<tbody>



										<!-- // $getRequest = mysqli_query($connection, "SELECT `requestId`,`amount`,`created` ,`isRequestd` FROM `widthdrawrequest` WHERE `driverId`='" . base64_decode($_GET["id"]) . "' AND `delete`='0' AND `amount`!=0");


										// $count = 0;
										// while ($row = mysqli_fetch_array($getRequest)) { -->
											<?php
											$curl = curl_init();
											curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
											curl_setopt_array($curl, array(
												CURLOPT_URL => "https://7ndgewffd0.execute-api.eu-west-1.amazonaws.com/v1/withdrawlhistory",
												CURLOPT_RETURNTRANSFER => true,
												CURLOPT_ENCODING => "",
												CURLOPT_MAXREDIRS => 10,
												CURLOPT_TIMEOUT => 0,
												CURLOPT_FOLLOWLOCATION => true,
												CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
												CURLOPT_CUSTOMREQUEST => "POST",
												CURLOPT_POSTFIELDS => "{
													\"driverId\": \"".base64_decode($_GET["id"] )."\"\r\n
													}",
												CURLOPT_HTTPHEADER => array(
											
													"Content-Type: application/json"
												),
											));
											
											
											// echo base."login";exit;
											
											$response = (curl_exec($curl));
											
											
											if (curl_errno($curl)) {
												$error_msg = curl_error($curl);
											}
											
											if (isset($error_msg)) {
												echo $error_msg;
											} else {
												$result = json_decode($response, true);
												if(($result["status"]) != 400){
													$orderDetails = $result["data"][0];
												}else{
													$orderDetails = [];
												}
									
											}
											
											
									
											curl_close($curl);
											$count = 0;
											// while ($row = mysqli_fetch_array($getorders)) {
									
									
												foreach ($orderDetails as $row) {?>


										?>
											<tr>
												<th><span style="margin-left: -40%;"> <?php
																						$count++;
																						echo $count; ?></span></th>
												<th>

			

												</th>
												<th> <?php echo $row["requestId"] ?></th>
												<th> <?php echo $row["amount"] ?></th>
												<th>  <?php echo $row["date"] ?></th>




												<?php if ($row["isRequestd"] == "Pending") { ?>
													<th>
														<span class="label label-lg font-weight-bold label-light-info label-inline">Pending</span>
													</th>
												<?php } else if ($row["isRequestd"] == "Accepted") { ?>





													<th>
														<span class="label label-lg font-weight-bold label-light-primary label-inline">Accepted</span>
													</th>


												<?php } else if ($row["isRequestd"] == "Rejected") { ?>



									

													<th>
														<span class="label label-lg font-weight-bold label-light-warning  label-inline">Rejceted
														</span>
													</th>

												<?php }  else if ($row["isRequestd"] == "Completed") { ?>



									

													<th>
													<span class="label label-lg font-weight-bold label-light-success label-inline">Completed
														</span>
													</th>

												<?php } ?>

											</tr>
										<?php } ?>
									</tbody>
								</table>
						</div>


					</div>
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



<script type="text/javascript">
	function WatchDocument(Name) {
		Swal.fire({
			imageUrl: Name,
			imageHeight: 400,
		})
	}

	$(document).ready(function() {
		$('#metarial').dataTable({});
		$('#metarial2').dataTable({});
		$('#metarial3').dataTable({});
		
	});
	var avatar1 = new KTImageInput('kt_image_1');
</script>