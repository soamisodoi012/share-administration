<?php

$holder_id = $_REQUEST['holder_id'];

include "conn1.php";
if ($holder_id !== "") {

	// Get corresponding  name 
	$query = mysqli_query($con, "SELECT id,name_e,subscribed_share, paid_share,blk_amount, blk_dividend ,cert_value, name_a FROM shareholder WHERE id='$holder_id' AND id != '99999999'");
	$sqlDA = mysqli_query($con, "SELECT CURRENT_DATE as date1;");

	$sqlNV = mysqli_query($con, "SELECT value as max_vote FROM elc_parameter WHERE shortname='NV'");

	$row = mysqli_fetch_array($query);
	$rowDATE = mysqli_fetch_array($sqlDA);
	$rowNV = mysqli_fetch_array($sqlNV);


	// Get the name
	$idd = $row["id"];
	$name_e_debit = $row["name_e"];
	$subscribed_shareDD = $row["subscribed_share"];
	$paid_shareDD = $row["paid_share"];
	$unPaid_shareD = $row["subscribed_share"] - $row["paid_share"];
	$blk_amountB = $row["blk_amount"];
	$blk_amountDD = $row["blk_dividend"];
	$name_aa = $row["name_a"];

	$paid_shareD = number_format($paid_shareDD / 1000);
	$subscribed_shareD = $subscribed_shareDD / 1000;
	$valueDate = $rowDATE['date1'];
	$cert_valueDD = $row["cert_value"];


	$sql_max = mysqli_query($con, "SELECT SUM(subscribed_share) as tot_sub FROM shareholder WHERE id != '99999999'");
	$query_max = mysqli_fetch_array($sql_max);
	$max_subscribed = $query_max['tot_sub'];

	$sql_param = mysqli_query($con, "SELECT value as max_per FROM parameter WHERE shortname = 'MS'");
	$query_param = mysqli_fetch_array($sql_param);
	$max_percent = $query_param['max_per'];

	$check_sub = ($subscribed_shareDD / $max_subscribed) * 100;

	$val_for_max_sub = ($max_percent * $max_subscribed) / 100000;


	if ($check_sub > $max_percent) {
		$subscribed_shareDD_t = $val_for_max_sub;
		$INF_Identifier = 'Y';
	} else {
		$subscribed_shareDD_t = $subscribed_shareDD / 1000;
		$INF_Identifier = 'N';
	}



	$max_votee = $rowNV['max_vote'];
}

// Store it in a array
$result = array("$name_e_debit", "$subscribed_shareD", "$paid_shareD", "$unPaid_shareD", "$blk_amountB", "$blk_amountDD", "$valueDate", "$cert_valueDD", "$idd", "$name_aa", "$subscribed_shareDD_t", "$max_votee","$INF_Identifier");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
