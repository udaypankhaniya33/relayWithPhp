<?php
include("../include/dbconnection.php");
$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt_array($curl, array(
	CURLOPT_URL =>base. "driverPendingRequests",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 0,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_POSTFIELDS => "{
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
} else {
	$result = json_decode($response, true);

	$data = $result["data"];
}


curl_close($curl);

$count = 0;
foreach ($data as  $da) { ?>
	<tr>
		<td><?php echo ++$count ?></td>



		<?php if ($da['status'] == 0) {
		?>
			<td>
				<button onclick="ApproveDriver('<?php echo ($da['userId']) ?>')" style="width: 30px;height: 30px;" title="approve" data-toggle="tooltip" data-theme="dark" data-placement="right" class="btn btn-icon btn-success"><i class="fas fa-check"></i></button>
				<button onclick="rework('<?php echo base64_encode($da['userId']) ?>')" style="width: 30px;height: 30px;" title="Reupload Needed" data-toggle="tooltip" data-theme="dark" data-placement="right" class="btn btn-icon btn-warning"><i class="fas fa-edit"></i></button>

				<button onclick="changeText('<?php echo base64_encode($da['userId']) ?>')" style="width: 30px;height: 30px;" title="reject" data-toggle="tooltip" data-theme="dark" data-placement="right" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></button>

				<button onclick="delet('<?php echo base64_encode($da['userId']) ?>')" style="width: 30px;height: 30px;" title="delete" data-toggle="tooltip" data-theme="dark" data-placement="right" class="btn btn-icon btn-info"><i class="fas fa-trash"></i></button>



				<button onclick="block('<?php echo base64_encode($da['userId']) ?>')" style="width: 30px;height: 30px; margin-right:5px;" title="Block" data-toggle="tooltip" data-theme="dark" data-placement="right" class="btn btn-icon btn-warning"><i class="fa fa-lock"></i></button></button>
			</td>

		<?php } else { ?>
			<td>
				<button onclick="ApproveDriver('<?php echo base64_encode($da['userId']) ?>')" style="width: 30px;height: 30px;" title="approve" data-toggle="tooltip" data-theme="dark" data-placement="right" class="btn btn-icon btn-success"><i class="fas fa-check"></i></button>

				<button onclick="changeText('<?php echo base64_encode($da['userId']) ?>')" style="width: 30px;height: 30px;" title="reject" data-toggle="tooltip" data-theme="dark" data-placement="right" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></button>

				<button onclick="delet('<?php echo base64_encode($da['userId']) ?>')" style="width: 30px;height: 30px;" title="reject" data-toggle="tooltip" data-theme="dark" data-placement="right" class="btn btn-icon btn-info"><i class="fas fa-trash"></i></button>


				<button onclick="block('<?php echo base64_encode($da['userId']) ?>')" style="width: 30px;height: 30px; margin-right:5px;" title="Block" data-toggle="tooltip" data-theme="dark" data-placement="right" class="btn btn-icon btn-warning"><i class="fa fa-lock"></i></button></button>
				<button onclick="block('<?php echo base64_encode($da['userId']) ?>')" style="width: 30px;height: 30px; margin-right:5px;" title="Unblock" data-toggle="tooltip" data-theme="dark" data-placement="right" class="btn btn-icon btn-dark"><i class="fa fa-unlock"></i></button>
			</td>
		<?php } ?>

				<td>
			<a href="../userDetails/?id=<?php echo base64_encode($da['userId']) ?>" style="width: 30px;height: 30px;margin-right:5px;" data-toggle="tooltip" data-theme="dark" data-placement="right" class="symbol symbol-lg-35 symbol-25 symbol-light-success">
				<?php if ($da["profile"] == "" || $da["profile"] == null) { ?>
					<img src="../static/images/favicon.ico" style="width: 40px;border-radius: 10px;">
				<?php } else { ?>
					<img src="<?php echo $da["profile"] ?>" style="width: 40px;border-radius: 10px;">
				<?php } ?></a>

		</td>
		<td><?php echo $da["fullName"] ?></td>
		<td><?php echo $da["email"] ?></td>
		<td><?php
			$date = date_create($da["requestTime"]);
			echo date_format($date, "d/m/Y h:i A"); ?></td>

		<td>
			<ul>
				<?php foreach ($da["city"] as $city) { ?>

					<li><?php echo $city ?></li>
				<?php } ?>
			</ul>
		</td>


		<td>
			<a onclick='WatchDocument("<?php echo $da["document"] ?>")' target="_blank" style="width: 30px;height: 30px;margin-right:5px;" title="Watch user" data-toggle="tooltip" data-theme="dark" data-placement="right" class="btn btn-icon btn-success"><i class="fa fa-eye"></i></a>
		</td>




	</tr>
<?php }

?>