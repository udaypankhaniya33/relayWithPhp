<?php
include("../include/dbconnection.php");
// `city`.`cityName`,
$aColumns = array("rowNumber","action", "profilePic", "fullName", "bankName", "accountName", "accountNumber", "ifscCode", );
$businessRow = mysqli_fetch_array(mysqli_query($connection, "SELECT * FROM `user`"));
$sIndexColumn = "rowNumber";
$sTable = "
		(
			SELECT
				(SELECT @rownum := @rownum + 1 FROM ( SELECT @rownum := 0 ) AS `rowtable`) AS `rowNumber`,
				`user`.*
				FROM
				(
					SELECT
				
				`user`.`fullName`,
				`user`.`bankName`,
				`user`.`accountName`,
				`user`.`accountNumber`,
				`user`.`ifscCode`,
				CONCAT(' <a href=\"../userDetails/?id=',TO_BASE64(`user`.`userId`),'\"  style=\"width: 30px;height: 30px;margin-right:5px;\"  data-toggle=\"tooltip\" data-theme=\"dark\" data-placement=\"right\" class=\"symbol symbol-lg-35 symbol-25 symbol-light-success\">',
					(CASE
						WHEN `user`.`profile` IS NULL
						THEN CONCAT('<img src=\"../static/images/favicon.ico\" style=\"width: 40px;border-radius: 10px;\">')
						ELSE
						 CONCAT('<img src=\"',`user`.`profile`,'\" style=\"width: 40px;border-radius: 10px;\">')
						 END
						) ,'</a>') AS `profilePic`,


			
				(CASE
				WHEN `user`.`status` = 0 
				THEN
				CONCAT('
				<button onclick=\"ApproveDriver(\'',TO_BASE64(`user`.`userId`),'\')\" style=\"width: 30px;height: 30px;\" title=\"approve\" data-toggle=\"tooltip\" data-theme=\"dark\" data-placement=\"right\" class=\"btn btn-icon btn-success\"><i class=\"fas fa-check\"></i></button> 
				
				<button onclick=\"rework(\'',TO_BASE64(`user`.`userId`),'\')\" style=\"width: 30px;height: 30px;\" title=\"Reupload Needed\" data-toggle=\"tooltip\" data-theme=\"dark\" data-placement=\"right\" class=\"btn btn-icon btn-warning\"><i class=\"fas fa-edit\"></i></button>
				
			
				
				<button  onclick=\"block(\'',TO_BASE64(`user`.`userId`),'\')\" style=\"width: 30px;height: 30px; margin-right:5px;\" title=\"Block\" data-toggle=\"tooltip\" data-theme=\"dark\" data-placement=\"right\" class=\"btn btn-icon btn-info\"><i class=\"fa fa-lock\"></i></button></button>
		
				')



				ELSE 
				CONCAT('
				<button onclick=\"ApproveDriver(\'',TO_BASE64(`user`.`userId`),'\')\" style=\"width: 30px;height: 30px;\" title=\"approve\" data-toggle=\"tooltip\" data-theme=\"dark\" data-placement=\"right\" class=\"btn btn-icon btn-success\"><i class=\"fas fa-check\"></i></button> 
				
				<button onclick=\"rework(\'',TO_BASE64(`user`.`userId`),'\')\" style=\"width: 30px;height: 30px;\" title=\"Reupload Needed\" data-toggle=\"tooltip\" data-theme=\"dark\" data-placement=\"right\" class=\"btn btn-icon btn-info\"><i class=\"fas fa-edit\"></i></button>
				


				<button onclick=\"block(\'',TO_BASE64(`user`.`userId`),'\')\" style=\"width: 30px;height: 30px; margin-right:5px;\" title=\"Unblock\" data-toggle=\"tooltip\" data-theme=\"dark\" data-placement=\"right\" class=\"btn btn-icon btn-dark\"><i class=\"fa fa-unlock\"></i></button>
				
				')
				
				END ) AS `action`
						FROM `user`
					
					
						WHERE
						`user`.`delete`!='1' AND `user`.`is_driver`='1' AND `user`. `bankDetailVerification`='1'  ORDER BY `user`.`userId` DESC

				) AS `user`
		) AS `user`";


$sLimit = "";
if (isset($_GET['iDisplayStart']) && $_GET['iDisplayLength'] != '-1') {
	$sLimit = "LIMIT " . mysqli_real_escape_string($connection, $_GET['iDisplayStart']) . ", " . mysqli_real_escape_string($connection, $_GET['iDisplayLength']);
}

if (isset($_GET['iSortCol_0'])) {
	$sOrder = "ORDER BY  ";
	for ($i = 0; $i < intval($_GET['iSortingCols']); $i++) {
		if ($_GET['bSortable_' . intval($_GET['iSortCol_' . $i])] == "true") {
			$sOrder .= $aColumns[intval($_GET['iSortCol_' . $i])] . "
				 	" . mysqli_real_escape_string($connection, $_GET['sSortDir_' . $i]) . ", ";
		}
	}

	$sOrder = substr_replace($sOrder, "", -2);
	if ($sOrder == "ORDER BY") {
		$sOrder = "";
	}
}

$sWhere = "";
if ($_GET['sSearch'] != "") {
	$sWhere = "WHERE (";
	for ($i = 0; $i < count($aColumns); $i++) {
		$sWhere .= $aColumns[$i] . " LIKE '%" . mysqli_real_escape_string($connection, $_GET['sSearch']) . "%' OR ";
	}
	$sWhere = substr_replace($sWhere, "", -3);
	$sWhere .= ')';
}

for ($i = 0; $i < count($aColumns); $i++) {
	if ($_GET['bSearchable_' . $i] == "true" && $_GET['sSearch_' . $i] != '') {
		if ($sWhere == "") {
			$sWhere = "WHERE ";
		} else {
			$sWhere .= " AND ";
		}
		$sWhere .= $aColumns[$i] . " LIKE '%" . mysqli_real_escape_string($connection, $_GET['sSearch_' . $i]) . "%' ";
	}
}

$sQuery = "
		SELECT SQL_CALC_FOUND_ROWS " . str_replace(" , ", " ", implode(", ", $aColumns)) . "
		FROM   $sTable
		$sWhere
		$sOrder
		$sLimit
	";
$rResult = mysqli_query($connection, $sQuery) or die(mysqli_error($connection));

$sQuery = "
		SELECT FOUND_ROWS()
	";
$rResultFilterTotal = mysqli_query($connection, $sQuery) or die(mysqli_error($connection));
$aResultFilterTotal = mysqli_fetch_array($rResultFilterTotal);
$iFilteredTotal = $aResultFilterTotal[0];

$sQuery = "
		SELECT COUNT(" . $sIndexColumn . ")
		FROM   $sTable
	";
$rResultTotal = mysqli_query($connection, $sQuery) or die(mysqli_error($connection));
$aResultTotal = mysqli_fetch_array($rResultTotal);
$iTotal = $aResultTotal[0];

$output = array(
	"sEcho" => intval($_GET['sEcho']),
	"iTotalRecords" => $iTotal,
	"iTotalDisplayRecords" => $iFilteredTotal,
	"aaData" => array()
);

$sr = 1;
while ($aRow = mysqli_fetch_array($rResult)) {
	$row = array();
	for ($i = 0; $i < count($aColumns); $i++) {
		if ($aColumns[$i] != ' ') {
			$row[] = $aRow[$aColumns[$i]];
		}
	}
	$output['aaData'][] = $row;
}

echo json_encode($output);
