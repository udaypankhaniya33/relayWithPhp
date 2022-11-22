<?php include '../include/header1.php';

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
							<a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_3">Approved Request </a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#kt_tab_pane_4">Rejected Request </a>
						</li>
					</ul>
					<div class="tab-content mt-5" id="myTabContent">


						<div class="tab-pane fade table-responsive show active" id="kt_tab_pane_3" role="tabpanel" aria-labelledby="kt_tab_pane_3">
							<table class="table table-separate table-head-custom dt-responsive nowrap  table-checkable" id="metarial">
								<thead>
									<tr>
										<th>#</th>

										<th>Action</th>
										<th>RequestId</th>
										<th>Profile</th>
										<th>Amount</th>
										<th>Request Time</th>
										<th>Approve Time</th>
									</tr>
								</thead>


								<tbody>

								</tbody>
							</table>
						</div>
						<div class="tab-pane fade table-responsive " id="kt_tab_pane_4" role="tabpanel" aria-labelledby="kt_tab_pane_3">
							<table class="table table-separate table-head-custom dt-responsive nowrap  table-checkable" id="metarial3">
								<thead>
									<tr>
										<th>#</th>
										<th>Action</th>
										<th>RequestId</th>
										<th>Profile</th>
										<th>Amount</th>
										<th>Request Time</th>
										<th>Reject Time</th>
										<th>Remarks</th>
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
	</div>
</div>

<?php include '../include/footer1.php' ?>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap4.min.js"></script>

<script src="../static/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script src="../static/assets/js/pages/crud/datatables/basic/scrollable.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css" integrity="sha512-cyIcYOviYhF0bHIhzXWJQ/7xnaBuIIOecYoPZBgJHQKFPo+TOBA+BY1EnTpmM8yKDU4ZdI3UGccNGCEUdfbBqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js" integrity="sha512-IZ95TbsPTDl3eT5GwqTJH/14xZ2feLEGJRbII6bRKtE/HC6x3N4cHye7yyikadgAsuiddCY2+6gMntpVHL1gHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
</link>

<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap4.min.css">
</link>

<script type="text/javascript">
	function WatchDocument(Name) {
		Swal.fire({
			imageUrl: Name,
			imageHeight: 400,
		})
	}

	$(document).ready(function() {
		$('#metarial').dataTable({

			scrollCollapse: true,
			"bDestroy": true,
			"ajax": " ../serverresponse/ApprovedWidthdrawRequest.php",
			columns: [{
					data: 'count'
				},
				{
					data: 'actions'
				},
				{
					data: 'requestId'
				},
				{
					data: 'profile'
				},
				{
					data: 'amount'
				},
				{
					data: 'created'
				},
				{
					data: 'approveTime'
				},


			],
		});


		$('#metarial3').dataTable({
			
			"bDestroy": true,
			scrollCollapse: true,
			"ajax": " ../serverresponse/RejectedWidthdrawRequest.php",
			columns: [{
					data: 'count'
				},
				{
					data: 'actions'
				},
				{
					data: 'requestId'
				},
				{
					data: 'profile'
				},
				{
					data: 'amount'
				},
				{
					data: 'created'
				},
				{
					data: 'approveTime'
				},
				{
					data: 'remarks'
				},

			],
		});

	});

	function ApproveDriver( userId,WidthdrawRequestId) {



$.ajax({
	url: '../ajax/approveWithDrawRequest.php',
	method: "POST",
	data: {
		WidthdrawRequestId: WidthdrawRequestId,
		userId: userId
	},
	success: function(result) {







		if (result == 1) {
			toastr.success("success");
			$('#metarial3').DataTable().ajax.reload();
		} else {
			toastr.warning("Somthing Went Wrong");
		}
	},
	error: function(er) {
		toastr.error(er);
	}
});



}


function changeText(WidthdrawRequestId,userId) {

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

		$.ajax({
			url: '../ajax/RejectWithDrawRequest.php',
			method: "post",
			data: {
				remarks: text.value,
				WidthdrawRequestId:WidthdrawRequestId,
				userId:userId

			},

			success: function(response) {
				if (response == 1) {
					toastr.success("success");
					$('#metarial').DataTable().ajax.reload();
				} else {
					toastr.warning("Somthing Went Wrong");
				}

			}
		})
	}
}) // console.log(text)
}
	var avatar1 = new KTImageInput('kt_image_1');
</script>